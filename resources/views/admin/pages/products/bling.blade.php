@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')


        <div class="container">

            <h1 class="text-center font-weight-bold">Exibindo os Produtos - Bling  -  Página {{ $page}} </h1>

            <div class="container col-sm-6">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr class = "text-center font-weight-bold">
                            <td colspan="2">Legenda</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-warning font-weight-bold">Igual Estoque Mínimo</td>
                            <td class="text-danger font-weight-bold">Abaixo Estoque Mínimo</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        <div class="container">

            @if ($page == 1) 
                <button type="button" class="btn btn-info" disabled>Anterior</button>
            @else
                <a href="{{ route('bling.show', ($page-1)) }}"><button type="button" class="btn btn-info">Anterior</button></a>
            @endif


            @if ($erro > 0)
                <button type="button" class="btn btn-info" disabled>Próximo</button>
            @else
                <a href="{{ route('bling.show', ($page+1)) }}"><button type="button" class="btn btn-info">Próximo</button></a>
            @endif

            <table class="table table-striped table-responsive">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descricao</th>
                        <th>Preço</th>
                        <th>Estoque Atual</th>
                        <th>Estoque Mínimo</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($erro == 0) 
                        @foreach ($produtos['retorno']['produtos'] as $produto)
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ $produto['produto']['id'] }} </td>
                                <td class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> {{ $produto['produto']['descricao'] }} </td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ number_format($produto['produto']['preco'], 2, '.', ',') }} </td>
                                @if (($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) > 0)
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ $produto['produto']['estoqueAtual'] }} </td>
                                @endif
                                @if (($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) == 0)
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-warning font-weight-bold"> {{ $produto['produto']['estoqueAtual'] }} </td>
                                @endif
                                @if (($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) < 0)
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-danger font-weight-bold"> {{ $produto['produto']['estoqueAtual'] }} </td>
                                @endif
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> {{ number_format($produto['produto']['estoqueMinimo'], 0, '','') }} </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td span=2>Não existem mais registros a serem visualizados.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection

