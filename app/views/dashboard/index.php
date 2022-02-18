<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            <div class="float-left" dir="ltr">
                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#1abc9c"
                    value="108" data-skin="tron" data-angleOffset="0" data-thickness=".99"/>
            </div>
            <div class="text-right">
                <h3 class="mb-1"> <?= count($utilizadores); ?> </h3>
                <p class="text-muted mb-1">Utilizadores</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            <div class="float-left" dir="ltr">
                <input 
                    data-plugin="knob" data-width="70" data-height="70" data-fgColor="#3bafda"
                    value="100" data-skin="tron"  data-angleOffset="10" data-thickness=".99"
                />
            </div>
            <div class="text-right">
                <h3 class="mb-1"> <?= count($bancos); ?> </h3>
                <p class="text-muted mb-1">Bancos</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            <div class="float-left" dir="ltr">
                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f672a7"
                    value="100" data-skin="tron" data-angleOffset="0" data-thickness=".99"/>
            </div>
            <div class="text-right">
                <h3 class="mb-1"> <?= count($contas); ?> </h3>
                <p class="text-muted mb-1">Contas</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            <div class="float-left" dir="ltr">
                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#dddddd"
                    value="100" data-skin="tron" data-angleOffset="0" data-thickness=".99"/>
            </div>
            <div class="text-right">
                <h3 class="mb-1"> <?= count($movimentos); ?> </h3>
                <p class="text-muted mb-1">Movimentos</p>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->