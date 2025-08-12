<x-guest-layout>
    <div class="container-add-diferenciado mx-auto py-8 max-w-lg">
        <h1 class="titulo-add text-2xl font-bold mb-6 text-center">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block font-semibold">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Lembre-me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="senha text-sm" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif

                <button type="submit" class="btn-save text-white font-semibold py-2 px-4 shadow">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
