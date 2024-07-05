<x-layout-form>
    <div class="bg-gray rounded w-98 h-98 px-10  flex flex-col justify-center items-center shadow-2xl">
        <div class="">
            <h1 class="font-bold text-4xl p-4">{{ __('Crie um login!!') }}</h1>
        </div>
        <form class="w-full" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="text-xl font-semibold">{{ __('Nome') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"
                        class="px-2 w-full rounded py-1 @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="text-xl font-semibold">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="px-2 w-full rounded py-1 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

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
                        class="px-2 w-full rounded py-1 @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="text-xl font-semibold">{{ __('Confirme a senha') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="px-2 w-full rounded py-1"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="mb-1">
                <div class="">
                    <button type="submit" class="bg-green w-full rounded p-1 text-white font-semibold">
                        {{ __('Registre-se') }}
                    </button>
                </div>
            </div>
        </form>
    </div>




</x-layout-form>
