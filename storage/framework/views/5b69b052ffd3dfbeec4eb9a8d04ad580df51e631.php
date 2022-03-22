<?php $__env->startSection('title', 'Gestão de Produtos'); ?>

<?php $__env->startSection('content'); ?>


        <div class="container">

            <h1 class="text-center font-weight-bold">Exibindo os Produtos - Bling  -  Página <?php echo e($page); ?> </h1>

            <div class="container col-sm-6">
                <table class="table table-bordered">
                    <thead>
                        <tr class = "text-center font-weight-bold">
                            <td colspan="2">Legenda</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-warning">Igual Estoque Mínimo</td>
                            <td class="text-danger">Abaixo Estoque Mínimo</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        <?php if($page == 1): ?> 
            <button type="button" class="btn btn-info" disabled>Anterior</button>
        <?php else: ?>
            <a href="<?php echo e(route('bling.show', ($page-1))); ?>"><button type="button" class="btn btn-info">Anterior</button></a>
        <?php endif; ?>


        <?php if($erro > 0): ?>
            <button type="button" class="btn btn-info" disabled>Próximo</button>
        <?php else: ?>
            <a href="<?php echo e(route('bling.show', ($page+1))); ?>"><button type="button" class="btn btn-info">Próximo</button></a>
        <?php endif; ?>

        <div class="container">
            <table class="table table-striped">

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
                    <?php if($erro == 0): ?> 
                        <?php $__currentLoopData = $produtos['retorno']['produtos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e($produto['produto']['id']); ?> </td>
                                <td class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <?php echo e($produto['produto']['descricao']); ?> </td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e(number_format($produto['produto']['preco'], 2, '.', ',')); ?> </td>
                                <?php if(($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) > 0): ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e($produto['produto']['estoqueAtual']); ?> </td>
                                <?php endif; ?>
                                <?php if(($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) == 0): ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-warning"> <?php echo e($produto['produto']['estoqueAtual']); ?> </td>
                                <?php endif; ?>
                                <?php if(($produto['produto']['estoqueAtual'] - $produto['produto']['estoqueMinimo']) < 0): ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-danger"> <?php echo e($produto['produto']['estoqueAtual']); ?> </td>
                                <?php endif; ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e($produto['produto']['estoqueAtual']); ?> </td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <?php echo e(number_format($produto['produto']['estoqueMinimo'], 0, '','')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td span=2>Não existem mais registros a serem visualizados.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/bling.blade.php ENDPATH**/ ?>