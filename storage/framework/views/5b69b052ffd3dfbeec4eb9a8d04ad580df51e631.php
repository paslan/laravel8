<?php $__env->startSection('title', 'Gestão de Produtos'); ?>

<?php $__env->startSection('content'); ?>

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
                <?php $__currentLoopData = $produtos['retorno']['produtos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e($produto['produto']['id']); ?> </td>
                        <td class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <?php echo e($produto['produto']['descricao']); ?> </td>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e(number_format($produto['produto']['preco'], 2, '.', ',')); ?> </td>
                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e($produto['produto']['estoqueAtual']); ?> </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/bling.blade.php ENDPATH**/ ?>