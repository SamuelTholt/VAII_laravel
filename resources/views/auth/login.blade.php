<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputEmail" name="email" placeholder="name@example.com" required>
            <label for="floatingInputEmail">Email</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword">Heslo</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-blue-950 border-gray-300 dark:border-gray-700 text-black shadow-sm focus:ring-indigo-500 dark:focus:ring-black dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-black dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
                <div class="d-grid mb-2">
                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase text-black bg-blue-400" type="submit">Log in</button>
                </div>
        </div>
    </form>
</x-guest-layout>
