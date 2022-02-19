@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')

    <div class="container">

        <h1>Exibindo os Produtos</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
@endsection
