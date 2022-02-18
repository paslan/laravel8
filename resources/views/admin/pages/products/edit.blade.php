@extends('admin.layouts.app')

@section('title') Editando Produto @endsection

@section('content')
    <h1>Editando Produto - {{$id}} </h1>

    <form action="{{ route('products.update', $id) }}" method="post">

        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="description" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
@endsection
