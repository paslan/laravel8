@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')

    <div class="container">

        <h1>Exibindo os Produtos</h1>

        <a href="{{ route('products.create') }}" class="btn btn-outline-info">Cadastrar</a>

        <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="filtrar" class="form_control" value="{{ $filters['filter'] ?? ''}}">
            <button type="submit" class="btn btn-outline-info">Pesquisar</button>
        </form>

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
                <form action="{{ route('products.destroy', $product->id) }}" id="formdelete" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-outline-info" href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">Detalhe</a>
                        <a class="btn btn-outline-success" href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Editar</a>
                        <button form="formdelete" type="submit" class="btn btn-outline-danger">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        @if (isset($filters))
            {{ $products->appends($filters)->links() }}    
        @else
            {{ $products->links() }}            
        @endif
        
    </div>
@endsection

