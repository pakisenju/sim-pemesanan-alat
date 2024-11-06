@extends('admin.layouts.app')
@section('title', 'Pengguna')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 10px;
            font-size: 0.75rem;
        }

        .dataTables_wrapper .dataTables_info {
            margin-bottom: 10px;
            font-size: 0.75rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.55rem 0.75rem;
            font-size: 0.75rem;
            margin: 0 2px;
            border-radius: 5px;
            color: var(--bs-btn-color, #fff);
            background-color: var(--bs-btn-bg, #5D87FF);
            border: 1px solid var(--bs-btn-border-color, #5D87FF);
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: var(--bs-btn-hover-bg, #4f73d9);
            color: var(--bs-btn-hover-color, #fff) !important;
            border-color: var(--bs-btn-hover-border-color, #4a6ccc);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: var(--bs-btn-active-bg, #4a6ccc) !important;
            color: var(--bs-btn-active-color, #fff) !important;
            border-color: var(--bs-btn-active-border-color, #4665bf);
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 5px;
            padding: 5px;
            border: 1px solid #ddd;
            margin-left: 5px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 5px;
            padding: 5px;
            border: 1px solid #ddd;
            margin-right: 5px;
        }

        #userTable {
            font-size: 0.75rem;
        }

        #userTable th {
            text-align: center;
            vertical-align: middle;
        }

        #userTable td {
            text-align: center;
            vertical-align: middle !important;
        }

        #userTable .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        #userTable tbody tr:hover {
            background-color: #f1f5f9;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100 p-5">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                        <h5 class="card-title fw-semibold m-0">List Pengguna</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="ti ti-plus me-1"></i> Tambah
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover" id="userTable">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->getRoleNames() as $role)
                                                <span class="badge bg-secondary fs-2 fw-bold">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-outline-info" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $user->id }}" title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $user->id }}" title="Delete">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.update', $user->id) }}" method="POST"
                                                    onsubmit="return validateEditForm(event)">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        @include('admin.pages.pengguna._form_edit', [
                                                            'user' => $user,
                                                        ])
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pengguna</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user.store') }}" method="POST" onsubmit="return validateAddForm(event)">
                        @csrf
                        <div class="modal-body">
                            @include('admin.pages.pengguna._form_add')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center"f>t<"d-flex justify-content-between align-items-center"ip>',
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                },
            });
        });

        function validateAddForm(event) {
            let isValid = true;

            const errorMessages = document.querySelectorAll('.text-danger');
            errorMessages.forEach(error => {
                error.classList.add('d-none');
            });

            const name = document.getElementById('addName').value.trim();
            const username = document.getElementById('addUsername').value.trim();
            const email = document.getElementById('addEmail').value.trim();
            const password = document.getElementById('addPassword').value.trim();
            const role = document.getElementById('addRoles').value;

            if (!name) {
                isValid = false;
                document.getElementById('addNameError').classList.remove('d-none');
                document.getElementById('addNameError').textContent = "Nama tidak boleh kosong.";
            }

            if (!username) {
                isValid = false;
                document.getElementById('addUsernameError').classList.remove('d-none');
                document.getElementById('addUsernameError').textContent = "Username tidak boleh kosong.";
            }

            if (!email) {
                isValid = false;
                document.getElementById('addEmailError').classList.remove('d-none');
                document.getElementById('addEmailError').textContent = "Email tidak boleh kosong.";
            }

            if (!password) {
                isValid = false;
                document.getElementById('addPasswordError').classList.remove('d-none');
                document.getElementById('addPasswordError').textContent = "Password tidak boleh kosong.";
            }

            if (!role) {
                isValid = false;
                document.getElementById('addRoleError').classList.remove('d-none');
                document.getElementById('addRoleError').textContent = "Peran harus dipilih.";
            }

            if (!isValid) {
                event.preventDefault();
            }

            return isValid;
        }

        function validateEditForm(event) {
            let isValid = true;

            const errorMessages = document.querySelectorAll('.text-danger');
            errorMessages.forEach(error => {
                error.classList.add('d-none');
            });

            const name = document.getElementById('editName').value.trim();
            const username = document.getElementById('editUsername').value.trim();
            const email = document.getElementById('editEmail').value.trim();
            const password = document.getElementById('editPassword').value.trim();
            const role = document.getElementById('editRoles').value;

            if (!name) {
                isValid = false;
                document.getElementById('editNameError').classList.remove('d-none');
                document.getElementById('editNameError').textContent = "Nama tidak boleh kosong.";
            }

            if (!username) {
                isValid = false;
                document.getElementById('editUsernameError').classList.remove('d-none');
                document.getElementById('editUsernameError').textContent = "Username tidak boleh kosong.";
            }

            if (!email) {
                isValid = false;
                document.getElementById('editEmailError').classList.remove('d-none');
                document.getElementById('editEmailError').textContent = "Email tidak boleh kosong.";
            }

            if (password !== "" && password.length < 8) {
                isValid = false;
                document.getElementById('editPasswordError').classList.remove('d-none');
                document.getElementById('editPasswordError').textContent = "Password harus minimal 8 karakter.";
            }

            if (!role) {
                isValid = false;
                document.getElementById('editRoleError').classList.remove('d-none');
                document.getElementById('editRoleError').textContent = "Peran harus dipilih.";
            }

            if (!isValid) {
                event.preventDefault();
            }

            return isValid;
        }
    </script>
@endsection
