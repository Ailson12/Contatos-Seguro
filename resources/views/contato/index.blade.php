@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de Contatos
                    <a class="btn btn-primary float-right" href="{{ route ('contatos.create') }}">Novo Contato</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @forelse($contatos as $contato)
                        <h4>Nome: {{ $contato->nome }}</h4>
                        <h5>Telefone: {{ $contato->telefone }}</h5>
                        <a href="{{route('contatos.edit', $contato->id)}}">Ver</a>
                        <hr>
                    @empty
                        <h3>Você nao possui Contatos Cadastrado</h3>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
