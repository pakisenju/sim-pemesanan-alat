@extends('admin.layouts.app-auth')
@section('title', 'Login')
@section('style')
    <style>
        .password {
            position: relative;
        }

        .password input[type="password"] {
            padding-right: 2.5rem;
        }

        .password button {
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
        <p class="text-dark fw-bold fs-6">Login</p>
        <form id="loginForm" action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">
                    Username
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="username" name="username">
                <div class="mt-1 text-danger d-none" id="usernameError"></div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">
                    Password
                    <span class="text-danger">*</span>
                </label>
                <div class="password">
                    <input type="password" class="form-control" id="password" name="password">
                    <button type="button" onclick="togglePasswordVisibility()">
                        <i class="ti ti-eye"></i>
                    </button>
                </div>
                <div class="mt-1 text-danger d-none" id="passwordError"></div>
            </div>
            <button type="button" onclick="validateForm()" class="btn btn-warning w-100 py-8 fs-4 mb-2 rounded-2">
                Masuk
            </button>
            <a href="{{ route('home.index') }}" class="btn btn-outline-dark w-100 py-8 fs-4 mb-4 rounded-2">
                Kembali
            </a>
            <div class="d-flex align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Belum punya akun?</p>
                <a class="text-primary fw-bold ms-2" href="{{ route('register.index') }}">Buat akun baru</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.password button i');
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
                    id: 'username',
                    errorId: 'usernameError',
                    name: 'Username'
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
                document.getElementById('loginForm').submit();
            }
        }

        document.getElementById('loginForm').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); 
                validateForm();
            }
        });
    </script>
@endsection
