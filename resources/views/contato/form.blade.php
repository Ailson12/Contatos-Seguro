@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulario de Contato</div>

                <div class="card-body">
                    @if(isset($contato))
                        <form action="{{route('contatos.update', $contato->id)}}" method="post">
                            @method('PUT')
                    @else
                    <form action="{{route('contatos.store')}}" method="post">
                    @endif
                        @csrf
                        <input type="text" name="nome" value="{{ $contato->nome ?? old('nome') }}">    
                        <input type="text" name="telefone" value="{{ $contato->telefone ?? old('telefone') }}"> 
                        <input type="submit" value="Salvar">               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
