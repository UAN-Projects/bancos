<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card">

        <div class="card-body p-4">
            
            <div class="text-center w-75 m-auto">
                <a href="index.html">
                    <span> <h2> <?= $AppName?> </h2> </span>
                </a>
                <p class="text-muted mb-4 mt-3">Don't have an account? Create your own account, it takes less than a minute</p>
            </div>

            <?= form_open("auth/register"); ?>
                <?php if( $this->session->flashdata('form_error')) { ?>
                    <?= $this->session->flashdata('form_error'); ?>
                <?php } ?>
            
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

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                </div>

            <?= form_close(); ?>

        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">Já tem uma conta?  <a href="<?= base_url("auth")?>" class="text-primary font-weight-medium ml-1">Sign In</a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- end col -->


