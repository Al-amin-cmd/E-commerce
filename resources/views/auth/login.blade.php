<x-admin.login-master>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" id="email" class="form-control form-control-lg" placeholder="Username" name="email"
                :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <input id="password" class="form-control form-control-lg" type="password" placeholder="Password"
                name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-3">
            {{-- <a class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN
                IN</a> --}}
            <button style="background-color:#7fad39;" type="submit" class="btn text-white btn-block btn-lg font-weight-medium auth-form-btn">SIGN
                IN</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                </label>
            </div>
            <a href="#" class="auth-link text-black">Forgot password?</a>
        </div>
        <div class="mb-2">
            <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                <i class="mdi mdi-facebook mr-2"></i> Connect using facebook
            </button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
        </div>
    </form>
</x-admin.login-master>
