@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')

    <div class="container">

        <h1>Exibindo os Produtos - Bling</h1>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descricao</th>
                    <th>Preço</th>
                    <th>Estoque Atual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos['retorno']['produtos'] as $produto)
                    {{-- @dd($produto); --}}
                    <tr>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ $produto['produto']['id'] }} </td>
                        <td class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> {{ $produto['produto']['descricao'] }} </td>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ number_format($produto['produto']['preco'], 2, '.', ',') }} </td>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ $produto['produto']['estoqueAtual'] }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
