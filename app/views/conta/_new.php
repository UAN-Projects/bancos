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
                    <label for="fullname">Utilizador</label>
                    <?= form_dropdown('user_id', $users, NULL, array('class' => 'form-control select2')); ?>
                </div>
                <div class="form-group">
                    <label for="fullname">Banco</label>
                    <?= form_dropdown('banco_id', $bancos, NULL, array('class' => 'form-control select2')); ?>
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