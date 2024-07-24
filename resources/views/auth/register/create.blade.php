<x-guest-layout>
    <main class="main-content  mt-0">
        <div class="pt-5 m-3 page-header align-items-start min-vh-50 pb-11 border-radius-lg"
            style="background-image: url('../../../assets/img/bg-login.jpg'); background-position-y: 20%;">
            <div class="container">
            <div class="row justify-content-center">
                    <div class="mx-auto text-center col-lg-5">                        
                        <img 
                        class="mt-5"
                        src="{{ asset('assets/img/logo-white.png') }}" alt="" style="width: 40%">                       
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="mx-auto col-xl-4 col-lg-5 col-md-7">
                    <div class="border-0 card z-index-0">                                               
                        <div class="card-body">
                            <form role="form" method="POST" action="/register">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name "
                                        name="name" value="{{ old('name') }}" autofocus required>
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" name="password" required>
                                    @error('password')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Password Confirmation"
                                        aria-label="Password Confirmation" name="password_confirmation" required>
                                    @error('role_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <select class="form-control" name="role_id" id="role_id" placeholder="Role">
                                    <option value="1" selected="">Admin</option>
                                    <option value="2">Creator</option>
                                    <option value="3">Member</option>
                                </select>
                                <div class="form-check form-check-info text-start mt-3">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                        required>
                                    <label class="form-check-label" for="terms">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                                            and Conditions</a>
                                    </label>
                                    @error('terms')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="my-4 mb-2 btn btn-dark w-100">Sign up</button>
                                </div>
                                <p class="mt-3 mb-0 mb-2 text-sm text-center">Already have an account? <a
                                        href="login" class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script>
            if (document.getElementById('role_id')) {
                var element = document.getElementById('role_id');
                const example = new Choices(element, {});
            }
        </script>
    </main>
</x-guest-layout>
