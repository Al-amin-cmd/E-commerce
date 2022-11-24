<x-admin.login-master>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" id="name" type="text" name="name" :value="old('name')" required autofocus /
                class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')" required placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="form-group">
            <x-forms.select class="form-control form-control-lg" name="district_id" class="block mt-1 w-full" required
                :options="$districts" />
        </div>
        <div class="form-group">
            <input type="password" id="password" class="form-control form-control-lg" placeholder="Password"
                name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group">
            <input type="password" id="password_confirmation" class="form-control form-control-lg" type="password"
                name="password_confirmation" required placeholder="Confirm Password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mb-4">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    I agree to all Terms & Conditions
                </label>
            </div>
        </div>
        <div class="mt-3">

            <x-primary-button style="background-color:#7fad39;" class="btn btn-block text-white btn-lg font-weight-medium auth-form-btn">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="text-center mt-4 font-weight-light">
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-admin.login-master>
