@extends('admin.layouts.app')

@section('title') Cadastro de Produtos @endsection

@section('content')
    <h1>Cadastro de Produtos</h1>

    @include('admin.includes.alerts');

    <div class="container">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form">
            
            @include('admin.pages.products.partials.form')

        </form>

    </div>

@endsection