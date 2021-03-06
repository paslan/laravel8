@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')

    <h1>Exibindo os Produtos</h1>



    <a href="{{ route('products.create') }}">Cadastrar</a>

    <hr>


    @component('admin.components.cards')
    @slot('title')
        <h1>Título Card</h1>
    @endslot
        Um card de exemplo
        
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])
    

    @if(@isset($products))

        @foreach ($products as $product)
            
            <p class="@if($loop->last) last @endif">{{$product}}</p>

        @endforeach
    @endif

    <hr>

@forelse ($products as $product)
    
    <p class="@if($loop->first) last @endif">{{$product}}</p>

@empty
    <p>Não existem produtos cadastrados</p>
@endforelse

<hr>


    {{ $teste}}    

    @if ($teste === '123')

    É igual

    @elseif($teste == 123)

    É igual a 123

    @else

    É diferente
        
    @endif


    @unless ($teste == '123')
        Dentro do unless     

    @else
        Dentro do else do unless
    @endunless

    @isset($teste2)

        <p>{{$teste2}}</p>
        
    @endisset

    @empty($teste3)
        <p>Teste3 está empty</p>

    @endempty

    @auth
        <p>Autenticado</p>
    @else
        <p>Não autenticado</p>
    @endauth


    @guest
        <p>Não autenticado guest...</p>    
    @endguest

    @switch($teste4)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @default
            Diferente de 1 e 2 
    @endswitch


    @endsection


    <style>
        .last {background: rgb(243, 5, 5)}
    </style>