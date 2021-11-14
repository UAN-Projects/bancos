<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Logo & title -->
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between m-0 p-0">
                    <div >
                        <p> <h4> <?= $class ?></h4> </p>
                    </div><!-- end col -->
                    <div class="btn-group">
                        <button 
                            class="btn btn-primary btn-sm dropdown-toggle" 
                            type="button" 
                            data-toggle="dropdown" 
                            aria-haspopup="true" 
                            aria-expanded="false"
                        > Acções
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url("$class"); ?>">Listagem</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateModal" data-whatever="@mdo">Editar</a>
                            <a class="dropdown-item text-danger" href="<?= base_url("$class/delete/$item->id"); ?>">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row m-0 p-1">
                    <div class="col-sm-6">
                        <strong>Nome : </strong> <?= $item->first_name ?>
                    </div> <!-- end col -->

                    <div class="col-sm-6">
                        <!-- <strong>Nome : </strong> <?# $item->nome ?> -->
                    </div> <!-- end col -->
                </div> 
                <!-- end row -->
            </div>
            
            <div class="card-footer">
                <div class="d-flex align-items-center justify-content-between m-0 p-0">
                    <div>
                        <strong>Criado em : </strong> <?= $item->created_at ?>
                    </div>
                    <div>
                    <?php if($item->updated_at) { ?>
                        <strong>Criado em : </strong> <?= $item->updated_at ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div> <!-- end card-box -->
    </div> <!-- end col -->
</div>


<?php require('_edit.php'); ?>