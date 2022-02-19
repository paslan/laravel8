@extends('admin.layouts.app')

@section('title', 'Detalhe do Produto')

@section('content')

    <div class="container">
        <h1>Produto  {{$product->id }} - {{ $product->name}}</h1>

        <ul>
            <li><strong>Nome</strong> {{ $product->name }}</li>
            <li><strong>Preço</strong> {{ $product->price }}</li>
            <li><strong>Descrição</strong> {{ $product->description }}</li>
        </ul>
    <a href="{{ route('products.index') }}"class="btn btn-primary" >Voltar</a>
    </div>


@endsection