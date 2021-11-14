<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo <?= __CLASS__ ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open("$class/$method"); ?>
        <?= validation_errors('<code>', '</code>'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fullname">Administrador</label>
                    <?= form_dropdown('admin', $users, NULL, array('class' => 'form-control select2')); ?>
                </div>
                <div class="form-group">
                    <label for="fullname">Sigla</label>
                    <?= form_input( array('name' => 'sigla', 'type' => 'text', 'id' => 'username', 'placeholder' => "Sigla", 'required' => '', 'class' => 'form-control', ), set_value('sigla'));?>
                </div>
                <div class="form-group">
                    <label for="fullname">Nome</label>
                    <?= form_input( array('name' => 'nome', 'type' => 'text', 'id' => 'nome', 'placeholder' => "Nome", 'required' => '', 'class' => 'form-control', ), set_value('nome'));?>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Salvar</button>
                </div>
            </div>

        <?= form_close(); ?>
    </div>
  </div>
</div>