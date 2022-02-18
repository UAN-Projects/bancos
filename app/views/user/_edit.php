 <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Utilizador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open("$class/update/$item->id"); ?>
          <?= validation_errors('<code>', '</code>'); ?>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="fullname">Nome</label>
                      <?= form_input( array('name' => 'first_name', 'type' => 'text', 'id' => 'first_name', 'placeholder' => "Nome", 'required' => '', 'class' => 'form-control', ), set_value('first_name', $item->first_name));?>
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
