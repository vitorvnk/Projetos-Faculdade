@extends('layouts.home')
@section('title', 'Verificação')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique o E-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Um novo código foi encaminhado com suceso para você!
                        </div>
                    @endif

                    <p>Para que possamos prosseguir, gentileza verifique o seu e-mail porque encaminhamos um link de autenticação para você.</p>
                    
                    Caso não tenha recebido,  
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clique aqui</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
