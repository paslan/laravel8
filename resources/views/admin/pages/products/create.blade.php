@extends('admin.layouts.app')

@section('title') Cadastro de Produtos @endsection

@section('content')
    <h1>Cadastro de Produtos</h1>

    <form action="{{ route('products.store') }}" method="POST">
        
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
@endsection