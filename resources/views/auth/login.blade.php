{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login & Register Buttons -->
        <div class="flex items-center justify-end mt-4 space-x-3">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Register Button -->
            <a href="{{ url('register') }}" class="px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                Register
            </a>

            <!-- Login Button -->
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | Your Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme." name="description" />
    <meta content="Your Name" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('assets/images/auth-img.jpg') }}" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="{{ url('/') }}" class="logo-light">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="22">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Sign In</h4>
                                        <p class="text-muted mb-3">Enter your email and password to access your account.</p>

                                        <!-- Laravel Auth Form -->
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-3">
                                                <a href="{{ route('password.request') }}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" id="password" name="password" required placeholder="Enter your password">
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit">
                                                    <i class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log In</span>
                                                </button>
                                            </div>
                                        </form>
                                        <!-- End Laravel Auth Form -->

                                        <div class="text-center mt-4">
                                            <p class="text-muted fs-16">Sign in with</p>
                                            <div class="d-flex gap-2 justify-content-center mt-3">
                                                <a href="#" class="btn btn-soft-primary"><i class="ri-facebook-circle-fill"></i></a>
                                                <a href="#" class="btn btn-soft-danger"><i class="ri-google-fill"></i></a>
                                                <a href="#" class="btn btn-soft-info"><i class="ri-twitter-fill"></i></a>
                                                <a href="#" class="btn btn-soft-dark"><i class="ri-github-fill"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Don't have an account?
                        <a href="{{ route('register') }}" class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>document.write(new Date().getFullYear())</script> © Your Company
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>
</html>
