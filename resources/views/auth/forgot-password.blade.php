<x-layout-guest page-title="Esqueci a senha">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">

                <!-- logo -->
                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="200px">
                </div>

                <!-- forgot password -->
                <div class="card p-5">

                    @if(!session('status'))


                    <p>Para recuperar a sua senha, por favor indique o seu email. Irá receber um email com um link para recuperar a senha.</p>

                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}">Já sei a minha senha?</a>
                            <button type="submit" class="btn btn-primary px-4">Enviar email</button>
                        </div>

                    </form>
                    @else

                    <div class="text-center mb-5">
                        <p>Se está registrado neste plataforma, irá receber um email com link para recuperação</p>
                        <p class="mb-5">Por favor verifique a sua caixa de correio.</p>
                        <a class="btn btn-primary px-4" href="{{ route('login')}}">Voltar ao login</a>
                    </div>

                    @endif
                </div>

            </div>
        </div>
    </div>

</x-layout-guest>
