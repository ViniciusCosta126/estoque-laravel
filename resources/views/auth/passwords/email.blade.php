<x-layout-form>
    <div class="bg-gray rounded w-96 h-56 p-3 flex flex-col justify-center items-center shadow-2xl">
        <div>
            <h1 class="font-bold text-4xl mb-2">{{ __('Redefina sua senha') }}</h1>
        </div>
        @if (session('status'))
            <div class="bg-green-light p-2 rounded text-white font-semibold" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="w-full" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row mb-3">
                <label for="email" class="text-xl font-semibold">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="px-2 w-full rounded py-1 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="mb-2 bg-green py-1 px-2 rounded text-white font-semibold w-full">
                        {{ __('Enviar redefinição de senha') }}
                    </button>
                </div>
            </div>
        </form>
    </div>


</x-layout-form>
