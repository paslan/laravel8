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
                    <th>Imagem</th>
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
                    <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" class="img-fluid" alt="{{ $product->name }}" width="15%">
                        @else
                            <img src="{{ url("storage/images/no-image-icon.png") }}" class="img-fluid" alt="" width="15%">                            
                        @endif
                    </td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $product->name }}</td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">{{ $product->price }}</td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
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

