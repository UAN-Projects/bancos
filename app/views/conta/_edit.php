 <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar <?= $class ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open("$class/update/$item->id"); ?>
          <?= validation_errors('<code>', '</code>'); ?>
              <div class="modal-body">
                <div class="form-group">
                    <label for="fullname">Administrador</label>
                    <?= form_dropdown('admin', array_column( $this->ion_auth->users()->result(), 'username', 'id'), $item->admin, array('class' => 'form-control select2')); ?>
                </div>
                  <div class="form-group">
                      <label for="fullname">Sigla</label>
                      <?= form_input( array('name' => 'sigla', 'type' => 'text', 'id' => 'nome', 'placeholder' => "Sigla", 'required' => '', 'class' => 'form-control', ), set_value('sigla', $item->sigla));?>
                  </div>
                  <div class="form-group">
                      <label for="fullname">Nome</label>
                      <?= form_input( array('name' => 'nome', 'type' => 'text', 'id' => 'nome', 'placeholder' => "Nome", 'required' => '', 'class' => 'form-control', ), set_value('nome', $item->nome));?>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="text-right">
                      <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                      <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                  </div>
              </div>
          <?= form_close(); ?>
      </div>
    </div>
  </div>
