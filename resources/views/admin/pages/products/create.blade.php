@extends('admin.layouts.app')

@section('title') Cadastro de Produtos @endsection

@section('content')
    <h1>Cadastro de Produtos</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        
        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
        <input type="text" name="description" placeholder="Descrição" value="{{ old('description') }}">
        <input type="file" name="photo">
        <button type="submit">Enviar</button>
    </form>
@endsection