<?php $__env->startSection('title'); ?> Cadastro de Produtos <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1>Cadastro de Produtos</h1>

    <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <div class="container">

        <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data" class="form">
            
            <?php echo $__env->make('admin.pages.products.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/create.blade.php ENDPATH**/ ?>