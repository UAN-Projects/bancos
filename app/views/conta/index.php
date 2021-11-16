<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="d-flex align-items-center justify-content-between mb-2">
					<button type="button" class="btn btn-primary" id="createModalId" data-toggle="modal" data-target="#createModal" data-whatever="@mdo"><i class="mdi mdi-plus-circle mr-1"></i> Adcionar</button>
					<h4 class="header-title"><?= $class ?></h4>
				</div>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Banco</th>
                            <th>Conta</th>
                            <th>Criado em</th>
                            <th>Actualizado em</th>
                            <th class="text-right">Acção</th>
                        </tr>
                    </thead>
                
                
                    <tbody>
					<?php foreach ($items as $item): ?>
                        <tr>
                            <td> <?= $item->first_name?> </td>
                            <td> <?= $item->nome?> </td>
                            <td> <?= $item->conta?> </td>
                            <td> <?= $item->created_at?> </td>
                            <td> <?= $item->updated_at?> </td>
                            <td class="text-right">
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
										<a class="dropdown-item" href="<?= base_url("$class/show/$item->id"); ?>">Visualizar</a>
										<a class="dropdown-item text-danger" href="<?= base_url("$class/delete/$item->id"); ?>">Eliminar</a>
									</div>
								</div>
							</td>
                        </tr>
					<?php endforeach;  ?>
                    </tbody>
                </table>
                
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->



<?php require('_new.php'); ?>

