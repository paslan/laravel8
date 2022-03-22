<?php echo csrf_field(); ?>
<div class="form-group">
    <input type="text" name="name" placeholder="Nome" value="<?php echo e($product->name ?? old('name')); ?>">
</div>
<div class="form-group">
    <input type="text" name="description" placeholder="Descrição" value="<?php echo e($product->description ?? old('description')); ?>">
</div>
<div class="form-group">
    <input type="text" name="price" placeholder="Preço" value="<?php echo e($product->price ?? old('price')); ?>">
</div>
<div class="form-group">
    <input type="file" name="image">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-success">Enviar</button>
    <a href="<?php echo e(route('products.index')); ?>"class="btn btn-outline-primary" >Voltar</a>
</div>
<?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/partials/form.blade.php ENDPATH**/ ?>