@extends('admin.layouts.app-auth')
@section('title', 'Register')
@section('style')
    <style>
        .passwordInput {
            position: relative;
        }

        .passwordInput input[type="password"] {
            padding-right: 2.5rem;
        }

        .passwordInput button {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="card-body">
        <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('admin-assets/images/logos/logo.png') }}" width="50" alt="">
        </a>
        <p class="text-center fw-bold fs-4">PT Amanah Inti Pratama</p>
        <p class="text-dark fw-bold fs-6">Daftar</p>
        <form id="registerForm" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">
                    Nama Lengkap
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="name" name="name">
                <div class="mt-1 text-danger d-none" id="nameError"></div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">
                    Username
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="username" name="username">
                <div class="mt-1 text-danger d-none" id="usernameError"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="mt-1 text-danger d-none" id="emailError"></div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">
                    Password
                    <span class="text-danger">*</span>
                </label>
                <div class="passwordInput">
                    <input type="password" class="form-control" id="password" name="password">
                    <button type="button" onclick="togglePasswordVisibility()">
                        <i class="ti ti-eye"></i>
                    </button>
                </div>
                <div class="mt-1 text-danger d-none" id="passwordError"></div>
            </div>
            <button type="button" onclick="validateForm()" class="btn btn-warning w-100 py-8 fs-4 mb-4 rounded-2">
                Submit
            </button>
            <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                <a class="text-primary fw-bold ms-2" href="{{ route('login.index') }}">Masuk ke sistem</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.passwordInput button i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('ti-eye', 'ti-eye-off');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('ti-eye-off', 'ti-eye');
            }
        }

        function validateForm() {
            let isValid = true;

            const fields = [{
                    id: 'name',
                    errorId: 'nameError',
                    name: 'Nama Lengkap'
                },
                {
                    id: 'username',
                    errorId: 'usernameError',
                    name: 'Username'
                },
                {
                    id: 'email',
                    errorId: 'emailError',
                    name: 'Email'
                },
                {
                    id: 'password',
                    errorId: 'passwordError',
                    name: 'Password'
                }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const errorDiv = document.getElementById(field.errorId);

                if (input.value.trim() === "") {
                    errorDiv.classList.remove('d-none');
                    errorDiv.textContent = `${field.name} tidak boleh kosong.`;
                    isValid = false;
                } else {
                    errorDiv.classList.add('d-none');
                }
            });

            if (isValid) {
                document.getElementById('registerForm').submit();
            }
        }
    </script>
@endsection
