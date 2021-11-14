<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?= $class?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        
        <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>" />
		<link rel="stylesheet" href="<?= base_url("assets/css/icons.min.css")?>" />
		<link rel="stylesheet" href="<?= base_url("assets/css/app.min.css")?>" />
    </head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
					<?php $this->load->view("$class/$method"); ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2016 - 2019 &copy; Minton theme by <a href="#" class="text-muted">Coderthemes</a> 
        </footer>

		<script src="<?= base_url("assets/js/app.min.js")?>"></script>
		<script src="<?= base_url("assets/js/script.js")?>"></script>
        
    </body>

<!-- pages-login.html37:42-->
</html>