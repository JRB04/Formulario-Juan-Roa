

 

<?php $__env->startSection('title', 'Lista de Contactos'); ?>

<?php $__env->startSection('content'); ?>

    <h2 class="mb-4">Contactos Recibidos</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>
    
    <?php if($contactos->isEmpty()): ?>
        <div class="alert alert-info" role="alert">
            No hay contactos guardados todavía. Envía uno desde el formulario.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover shadow-sm">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Número</th>
                        <th>Asunto</th>
                        <th>Fecha de Envío</th>
                        <th>Acciones</th> </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($contacto->id); ?></td>
                            <td><?php echo e($contacto->nombre); ?></td>
                            <td><?php echo e($contacto->correo); ?></td>
                            <td><?php echo e($contacto->numero); ?></td>
                            <td><?php echo e($contacto->asunto); ?></td>
                            <td><?php echo e($contacto->created_at->format('d/m/Y H:i')); ?></td>
                            
                            <td>
                                <form action="<?php echo e(route('contacto.eliminar', $contacto->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?> <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHPproeycto\resources\views/contactos_lista.blade.php ENDPATH**/ ?>