@extends('admin.layouts.app')

@section('title', 'Zoom da imagem do Produto')

@section('content')

    <div class="container">
        <h1>Produto  {{$product->id }} - {{ $product->name}}</h1>

        <ul>
            <li><strong>Nome</strong> {{ $product->name }}</li>
            <li><strong>Preço</strong> {{ $product->price }}</li>
            <li><strong>Descrição</strong> {{ $product->description }}</li>
            <li><strong>Imagem</strong> {{ $product->image }}</li>
        </ul>
        <a href="{{ route('products.index') }}"class="btn btn-outline-primary" >Voltar</a>
    </div>


    <!-- Modal Zoom-->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
                </div>
                <div class="modal-body">
                    <img src="{{ url("storage/{$product->image}") }}" class="img-fluid" alt="{{ $product->name }}" width="100%">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function()
    {
        $('#imageModal').modal('show');
    });
</script>


@endsection