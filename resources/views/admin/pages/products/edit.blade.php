@extends('admin.layouts.app')

@section('title') Editar Produto - {{$id}} @endsection

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('products.edit') }}" method="POST">
        
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
@endsection