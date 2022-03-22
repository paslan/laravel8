<?php $__env->startSection('title', 'Gestão de Produtos'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <h1>Exibindo os Produtos</h1>

        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-outline-info">Cadastrar</a>

        <form action="<?php echo e(route('products.search')); ?>" method="POST" class="form form-inline">
            <?php echo csrf_field(); ?>
            <input type="text" name="filter" placeholder="filtrar" class="form_control" value="<?php echo e($filters['filter'] ?? ''); ?>">
            <button type="submit" class="btn btn-outline-info">Pesquisar</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" id="formdelete" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                </form>
                <tr>
                    <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <?php if($product->image): ?>
                            <a href="<?php echo e(route('products.zoom', $product->id)); ?>">
                                <img src="<?php echo e(url("storage/{$product->image}")); ?>" class="img-fluid" alt="<?php echo e($product->name); ?>" width="15%">
                            </a>
                        <?php else: ?>
                            <img src="<?php echo e(url("storage/images/no-image-icon.png")); ?>" class="img-fluid" alt="" width="15%">                            
                        <?php endif; ?>
                    </td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo e($product->name); ?></td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo e($product->price); ?></td>
                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <a class="btn btn-outline-info" href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-secondary">Detalhe</a>
                        <a class="btn btn-outline-success" href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-success">Editar</a>
                        <button form="formdelete" type="submit" class="btn btn-outline-danger">Excluir</button>
                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


        <?php if(isset($filters)): ?>
            <?php echo e($products->appends($filters)->links()); ?>    
        <?php else: ?>
            <?php echo e($products->links()); ?>            
        <?php endif; ?>
        
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel8/resources/views/admin/pages/products/index.blade.php ENDPATH**/ ?>