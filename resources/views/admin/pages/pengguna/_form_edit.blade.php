<div class="mb-3">
    <label for="editName" class="form-label">Nama</label>
    <input type="text" class="form-control" id="editName" name="name" value="{{ $user->name }}">
    <div class="mt-1 text-danger d-none" id="editNameError"></div>
</div>
<div class="mb-3">
    <label for="editUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="editUsername" name="username" value="{{ $user->username }}">
    <div class="mt-1 text-danger d-none" id="editUsernameError"></div>
</div>
<div class="mb-3">
    <label for="editEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="editEmail" name="email" value="{{ $user->email }}">
    <div class="mt-1 text-danger d-none" id="editEmailError"></div>
</div>
<div class="mb-3">
    <label for="editPassword" class="form-label">Password <small class="text-danger">(Kosongkan untuk tetap menggunakan
            password yang sama)</small></label>
    <div class="input-group">
        <input type="password" class="form-control" id="editPassword" name="password">
        <span class="input-group-text" id="editTogglePassword" style="cursor: pointer;">
            <i class="ti ti-eye" id="edit-eye-icon"></i>
        </span>
    </div>
    <div class="mt-1 text-danger d-none" id="editPasswordError"></div>
</div>
<div class="mb-3">
    <label for="editRoles" class="form-label">Peran</label>
    <select class="form-select" id="editRoles" name="role[]">
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                {{ $role->name }}</option>
        @endforeach
    </select>
    <div class="mt-1 text-danger d-none" id="editRoleError"></div>
</div>
<div class="mb-3 d-none" id="editAdditionalUserInfoPhone">
    <label for="editNomor_telepon" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" id="editNomor_telepon" name="nomor_telepon"
        value="{{ $user->pelanggan ? $user->pelanggan->nomor_telepon : '' }}">
</div>
<div class="mb-3 d-none" id="editAdditionalUserInfoAddress">
    <label for="editAlamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="editAlamat" name="alamat"
        value="{{ $user->pelanggan ? $user->pelanggan->alamat : '' }}">
</div>
<div class="mb-3 d-none" id="editAdditionalUserInfoInstansi">
    <label for="editInstansi" class="form-label">Instansi</label>
    <input type="text" class="form-control" id="editInstansi" name="instansi"
        value="{{ $user->pelanggan ? $user->pelanggan->instansi : '' }}">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rolesSelect = document.getElementById('editRoles');
        const phone = document.getElementById('editAdditionalUserInfoPhone');
        const address = document.getElementById('editAdditionalUserInfoAddress');
        const instansi = document.getElementById('editAdditionalUserInfoInstansi');

        function checkRoles() {
            const selectedRoles = Array.from(rolesSelect.selectedOptions).map(option => option.value);
            if (selectedRoles.includes('Customer')) {
                phone.classList.remove('d-none');
                address.classList.remove('d-none');
                instansi.classList.remove('d-none');
            } else {
                phone.classList.add('d-none');
                address.classList.add('d-none');
                instansi.classList.add('d-none');
            }
        }

        checkRoles();

        rolesSelect.addEventListener('change', checkRoles);
    });

    const editTogglePassword = document.getElementById('editTogglePassword');
    const editPasswordField = document.getElementById('editPassword');

    editTogglePassword.addEventListener('click', function() {
        const type = editPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        editPasswordField.setAttribute('type', type);
        this.querySelector('i').classList.toggle('ti-eye');
        this.querySelector('i').classList.toggle('ti-eye-off');
    });
</script>
