<?php $__env->startSection('title', 'Detalhe do Produto'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1>Produto  <?php echo e($product->id); ?> - <?php echo e($product->name); ?></h1>

        <ul>
            <li><strong>Nome</strong> <?php echo e($product->name); ?></li>
            <li><strong>Preço</strong> <?php echo e($product->price); ?></li>
            <li><strong>Descrição</strong> <?php echo e($product->description); ?></li>
            <li><strong>Imagem</strong> <?php echo e($product->image); ?></li>
        </ul>
        <a href="<?php echo e(route('products.index')); ?>"class="btn btn-outline-primary" >Voltar</a>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/show.blade.php ENDPATH**/ ?>