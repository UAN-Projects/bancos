<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo <?= $class ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open("$class/$method"); ?>
        <?= validation_errors('<code>', '</code>'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fullname">Nome</label>
                    <?= form_input( array('name' => 'first_name', 'type' => 'text', 'id' => 'first_name', 'placeholder' => "Nome", 'required' => '', 'class' => 'form-control', ), set_value('first_name'));?>
                </div>
                <div class="form-group">
                    <label for="fullname">Username</label>
                    <?= form_input( array('name' => 'username', 'type' => 'text', 'id' => 'username', 'placeholder' => "Username", 'required' => '', 'class' => 'form-control', ), set_value('username'));?>
                </div>
                <div class="form-group">
                    <label for="emailaddress">Email</label>
                    <?= form_input( array('name' => 'email', 'type' => 'email', 'id' => 'email', 'placeholder' => "example@company.com", 'required' => '', 'class' => 'form-control', ), set_value('email'));?>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <?= form_password(array('name' => 'password', 'required' => '', 'id' => 'password', 'class' => 'form-control', 'placeholder'=>"Senha"));?>
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Senha</label>
                    <?= form_password(array('name' => 'confirm_password', 'required' => '', 'id' => 'confirm_password', 'class' => 'form-control', 'placeholder'=>"Confirmar Senha"));?>
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