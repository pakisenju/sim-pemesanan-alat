<div class="mb-3">
    <label for="addName" class="form-label">Nama</label>
    <input type="text" class="form-control" id="addName" name="name">
    <div class="mt-1 text-danger d-none" id="addNameError"></div>
</div>
<div class="mb-3">
    <label for="addUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="addUsername" name="username">
    <div class="mt-1 text-danger d-none" id="addUsernameError"></div>
</div>
<div class="mb-3">
    <label for="addEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="addEmail" name="email">
    <div class="mt-1 text-danger d-none" id="addEmailError"></div>
</div>
<div class="mb-3">
    <label for="addPassword" class="form-label">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="addPassword" name="password">
        <span class="input-group-text" id="addTogglePassword" style="cursor: pointer;">
            <i class="ti ti-eye" id="add-eye-icon"></i>
        </span>
    </div>
    <div class="mt-1 text-danger d-none" id="addPasswordError"></div>
</div>
<div class="mb-3">
    <label for="addRoles" class="form-label">Peran</label>
    <select class="form-select" id="addRoles" name="role[]">
        <option value="" disabled selected>Pilih Peran</option>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <div class="mt-1 text-danger d-none" id="addRoleError"></div>
</div>
<div class="mb-3 d-none" id="addAdditionalUserInfoPhone">
    <label for="addNomor_telepon" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" id="addNomor_telepon" name="nomor_telepon">
</div>
<div class="mb-3 d-none" id="addAdditionalUserInfoAddress">
    <label for="addAlamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="addAlamat" name="alamat">
</div>
<div class="mb-3 d-none" id="addAdditionalUserInfoInstansi">
    <label for="addInstansi" class="form-label">Instansi</label>
    <input type="text" class="form-control" id="addInstansi" name="instansi">
</div>

<script>
    document.getElementById('addRoles').addEventListener('change', function() {
        const phone = document.getElementById('addAdditionalUserInfoPhone');
        const address = document.getElementById('addAdditionalUserInfoAddress');
        const instansi = document.getElementById('addAdditionalUserInfoInstansi');
        const selectedRoles = Array.from(this.selectedOptions).map(option => option.value);
        if (selectedRoles.includes('Customer')) {
            phone.classList.remove('d-none');
            address.classList.remove('d-none');
            instansi.classList.remove('d-none');
        } else {
            phone.classList.add('d-none');
            address.classList.add('d-none');
            instansi.classList.add('d-none');
        }
    });

    const addTogglePassword = document.getElementById('addTogglePassword');
    const addPasswordField = document.getElementById('addPassword');

    addTogglePassword.addEventListener('click', function() {
        const type = addPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        addPasswordField.setAttribute('type', type);
        this.querySelector('i').classList.toggle('ti-eye');
        this.querySelector('i').classList.toggle('ti-eye-off');
    });
</script>
