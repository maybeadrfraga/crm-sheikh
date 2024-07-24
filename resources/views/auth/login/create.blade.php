<x-guest-layout>
    <main class="main-content  mt-0">
        <div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
        style="background-image: url('{{ asset('assets/img/bg-login.jpg') }}');">
        <div class="container">
                <div class="row justify-content-center">
                    <div class="mx-auto text-center col-lg-5">                        
                        <img 
                        class="mt-5"
                        src="{{ asset('assets/img/logo-white.png') }}" alt="" style="width: 40%">
                        <!-- <p class="text-white text-lead">Use these awesome forms to login or create new account in your
                            project for free.</p> -->
                    </div>
                </div>
                <!-- <div class="p-3 text-center text-white">
                    <p class="mb-0 text-m">You can login with 3 different user types:</p><br />
                    <p class="mb-0 text-m">Email: <b>admin@corporateui.com</b> & Password: <b>secret</b></p>
                    <p class="mb-0 text-m">Email: <b>creator@corporateui.com</b> & Password: <b>secret</b></p>
                    <p class="mb-0 text-m">Email: <b>member@corporateui.com</b> & Password: <b>secret</b></p>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="mx-auto col-xl-4 col-lg-6 col-md-7">
                    <div class=" card z-index-0">                        
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        @error('message')
                            <div class="alert alert-danger text-sm" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="px-4 card-body">
                            <form role="form" class="text-start" method="POST" action="login">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Enter your email address" aria-label="Email"
                                        value="{{ old('email') ? old('email') : 'admin@corporateui.com' }}" required
                                        autofocus>
                                </div>
                                <div class="mb-3">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Enter your password" aria-label="Password"
                                        value="{{ old('email') ? '' : 'secret' }}" required>
                                </div>
                                <div class="form-check form-switch d-flex">
                                    <input class="form-check-input" type="checkbox" id="rememberMe"
                                        name="rememberMe">
                                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="my-4 mb-2 btn btn-dark w-100">Sign in</button>
                                </div>
                                <div class="mb-2 text-center position-relative">
                                    <p
                                        class="px-3 mb-2 text-sm bg-white font-weight-bold text-secondary text-border d-inline z-index-2">
                                        Don't have an account?
                                    </p>
                                </div>
                                <div class="text-center">
                                    <a href=" {{ route('register') }}">
                                        <button type="button" class="mt-2 mb-4 btn btn-white w-100">Sign up</button>
                                    </a>
                                </div>
                                <p class="mt-3 mb-0 mb-2 text-sm text-center">Forgot your password? <a
                                        href="forgot-password" class="text-dark font-weight-bolder">Recover here!</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
