<x-layout-form>
    <div class="bg-gray rounded w-96 h-96 p-3 flex flex-col justify-center items-center shadow-2xl">
        <div>
            <h1 class="font-bold text-4xl mb-2">{{ __('Login') }}</h1>
        </div>
        <form class="" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row mb-3">
                <label for="email" class="text-xl font-semibold">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="px-2 w-full rounded py-1 @error('email') email invalido @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="text-xl font-semibold">{{ __('Senha') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="w-full px-2 rounded py-1 @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="p" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="font-semibold text-xl" for="remember">
                            {{ __('Lembrar me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class=" mb-2 bg-green py-1 px-2 rounded text-white font-semibold w-full">
                        {{ __('Login') }}
                    </button>

                    <a href="{{ route('register') }}" class="mb-2 font-semibold">Não tem conta? Registre-se!!</a>

                    @if (Route::has('password.request'))
                        <a class="block w-full" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

</x-layout-form>
