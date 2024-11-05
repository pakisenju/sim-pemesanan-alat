@extends('admin.layouts.app')
@section('title', 'Alat Berat')
@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">List Alat Berat</h5>
                            </div>
                            <div>
                                <button class="btn btn-primary">
                                    <i class="ti ti-plus me-1"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Dump Truck</td>
                                        <td class="text-center">Komatsu</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning rounded-3 fw-semibold">Disewakan</span>
                                        </td>
                                        <td class="d-flex justify-content-center text-center gap-2">
                                            <button class="btn btn-outline-info">
                                                <i class="ti ti-edit fs-6"></i>
                                            </button>
                                            <button class="btn btn-outline-danger">
                                                <i class="ti ti-trash fs-6"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
