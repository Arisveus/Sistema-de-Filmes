<x-guest-layout>
    <div class="container-add-diferenciado mx-auto py-8 max-w-lg">
        <h1 class="titulo-add text-2xl font-bold mb-6 text-center">Registrar</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block font-semibold">Nome</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block font-semibold">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block font-semibold">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="input-color w-full border rounded px-3 py-2" />
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="senha text-sm " href="{{ route('login') }}">
                    Já possui cadastro?
                </a>
                <button type="submit" class="btn-save text-white font-semibold py-2 px-4 shadow">
                    Registrar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
