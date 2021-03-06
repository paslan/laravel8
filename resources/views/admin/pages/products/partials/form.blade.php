@csrf
<div class="form-group">
    <input type="text" name="name" placeholder="Nome" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" name="description" placeholder="Descrição" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="text" name="price" placeholder="Preço" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="file" name="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-success">Enviar</button>
    <a href="{{ route('products.index') }}"class="btn btn-outline-primary" >Voltar</a>
</div>
