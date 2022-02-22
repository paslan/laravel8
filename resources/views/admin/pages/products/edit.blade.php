@extends('admin.layouts.app')

@section('title') Editando Produto @endsection

@section('content')

<div class="container">
    <h1>Editando Produto - {{$product->id}} </h1>

    <form action="{{ route('products.update', $product->id) }}" class="form" method="post">

        @method('PUT')
        @include('admin.pages.products.partials.form')
    </form>
    <div class="form-group">
    </div>

</div>
@endsection
