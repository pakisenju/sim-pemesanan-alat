<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Http\Requests\StorePenyewaanRequest;
use App\Http\Requests\UpdatePenyewaanRequest;
use App\Models\AlatBerat;
use App\Models\Pelanggan;
use DateTime;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alatBerats = AlatBerat::all();
        $pelanggans = Pelanggan::all();

        $data = compact('alatBerats', 'pelanggans');

        return view('admin.pages.penyewaan.index', $data);
    }

    public function indexList()
    {
        if (auth()->user()->roles->pluck('name')->contains('Customer')) {
            $pelanggan = Pelanggan::where('user_id', auth()->id())->first();

            if (!$pelanggan) {
                return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
            }

            $penyewaans = Penyewaan::with('alat', 'pelanggan')
                ->where('pelanggan_id', $pelanggan->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $penyewaans = Penyewaan::with('alat', 'pelanggan')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $alatBerats = AlatBerat::all();
        $pelanggans = Pelanggan::all();

        $data = compact('alatBerats', 'penyewaans', 'pelanggans');

        return view('admin.pages.penyewaan.list-penyewaan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'alat_id' => 'required|exists:alat_berats,id',
            'tgl_sewa' => 'required|date_format:Y-m-d\TH:i',
            'tgl_kembali' => 'required|date_format:Y-m-d\TH:i|after:tgl_sewa',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'lokasi_penyewaan' => 'required|string',
        ]);

        $pelanggan = auth()->user()->pelanggan;

        if (!$pelanggan) {
            return redirect()->back()->withErrors(['error' => 'Anda belum terdaftar sebagai pelanggan.']);
        }

        $alatBerat = AlatBerat::findOrFail($validated['alat_id']);

        $start = new DateTime($validated['tgl_sewa']);
        $end = new DateTime($validated['tgl_kembali']);
        $hours = $start->diff($end)->h + ($start->diff($end)->days * 24);

        $totalHarga = $hours * $alatBerat->harga_sewa;

        $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayarans', 'public');

        Penyewaan::create([
            'alat_id' => $validated['alat_id'],
            'pelanggan_id' => $pelanggan->id,
            'tgl_sewa' => $validated['tgl_sewa'],
            'tgl_kembali' => $validated['tgl_kembali'],
            'total_harga' => $totalHarga,
            'bukti_pembayaran' => $filePath,
            'status_penyewaan' => 'Sedang Diproses',
            'lokasi_penyewaan' => $validated['lokasi_penyewaan'],
        ]);

        return redirect()->route('penyewaan.index')->with('OK', 'Penyewaan berhasil ditambahkan.');
    }

    public function accept(Request $request, Penyewaan $penyewaan)
    {
        $alat = $penyewaan->alat;
        $alat->update(['status_ketersediaan' => 'Disewakan']);
        $penyewaan->update(['status_penyewaan' => 'Sedang Berjalan']);

        $this->sendFonnteNotification(
            $penyewaan->pelanggan->nomor_telepon,
            "Halo {$penyewaan->pelanggan->nama},\n\nPenyewaan alat berat *{$alat->nama_alat}* telah disetujui. Penyewaan Anda sekarang berstatus *Sedang Berjalan*. Terima kasih telah menggunakan produk kami!"
        );

        return redirect()->route('penyewaan.indexList')->with('OK', 'Penyewaan berhasil disetujui.');
    }

    public function reject(Request $request, Penyewaan $penyewaan)
    {
        $validated = $request->validate([
            'alasan_penolakan' => 'required|string|max:255',
            'bukti_refund' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('bukti_refund')) {
            $filePath = $request->file('bukti_refund')->store('bukti_refunds', 'public');
        }

        $penyewaan->update([
            'status_penyewaan' => 'Ditolak',
            'alasan_penolakan' => $validated['alasan_penolakan'],
            'bukti_refund' => $filePath,
        ]);

        $this->sendFonnteNotification(
            $penyewaan->pelanggan->nomor_telepon,
            "Halo {$penyewaan->pelanggan->nama},\n\nPenyewaan alat berat *{$penyewaan->alat->nama_alat}* telah ditolak.\n\nAlasan Penolakan: {$validated['alasan_penolakan']}\n\nSilakan hubungi kami untuk informasi lebih lanjut."
        );

        return redirect()->route('penyewaan.indexList')->with('OK', 'Penyewaan berhasil ditolak.');
    }

    public function sendReminder($id, Request $request)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        $phoneNumber = $penyewaan->pelanggan->nomor_telepon; 

        $message = $request->input('message');

        $response = $this->sendFonnteNotification($phoneNumber, $message);

        if ($response) {
            return redirect()->back()->with('OK', 'Pengingat berhasil dikirim.');
        } else {
            return redirect()->back()->with('ERR', 'Terjadi kesalahan saat mengirim pengingat.');
        }
    }

    public function finish(Request $request, Penyewaan $penyewaan)
    {
        $penyewaan->update(['status_penyewaan' => 'Selesai']);

        $penyewaan->alat->update(['status_ketersediaan' => 'Tersedia']);

        $this->sendFonnteNotification(
            $penyewaan->pelanggan->nomor_telepon,
            "Halo {$penyewaan->pelanggan->nama},\n\nTerima kasih telah menyewa alat berat *{$penyewaan->alat->nama_alat}* dari kami.\n\nKami sangat menghargai kepercayaan Anda. Jika ada pertanyaan atau kebutuhan lain, jangan ragu untuk menghubungi kami.\n\nKami berharap dapat melayani Anda kembali di masa depan!"
        );

        return redirect()->route('penyewaan.indexList')->with('OK', 'Penyewaan berhasil diselesaikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyewaanRequest $request, Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyewaan $penyewaan)
    {
        //
    }

    private function sendFonnteNotification($phoneNumber, $message)
    {
        $token = 'kPaKPfosZDPBBSVy2igt';
        $url = 'https://api.fonnte.com/send';

        $data = [
            'target' => $phoneNumber,
            'message' => $message,
            'countryCode' => '62',
        ];

        $headers = [
            'Authorization: ' . $token,
            'Content-Type: application/x-www-form-urlencoded',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
