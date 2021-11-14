<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card">

        <div class="card-body p-4">
            
            <div class="text-center w-75 m-auto">
                <a href="index.html">
                    <span><img src="<?= base_url("assets/images/logo-light.png")?>" alt="" height="22"></span>
                </a>
                <p class="text-muted mb-4 mt-3">Por favor entre com seu login/email e senha abaixo.</p>
                <p>
                <?php if( $this->session->flashdata('form_error')) { ?>
                    <?= $this->session->flashdata('form_error'); ?>
                <?php } ?>
                </p>
            </div>

            <!-- <form action="#"> -->
            <?= form_open("auth/login"); ?>
                <?= validation_errors('<code>', '</code>'); ?>

                <div class="form-group mb-3">
                    <label for="emailaddress">Username</label>
                    <?= form_input( array('name' => 'identity', 'type' => 'text', 'id' => 'identity', 'required' => '', 'class' => 'form-control', 'placeholder'=>"Enter your email"), set_value('identity'));?>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <?= form_password(array('name' => 'password', 'required' => '', 'id' => 'password', 'class' => 'form-control', 'placeholder'=>"Senha"));?>
                </div>

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> Entrar </button>
                </div>
            <?= form_close(); ?>

        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p class="text-muted">Não possui ainda uma conta? <a href="<?= base_url("auth/register")?>" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>
