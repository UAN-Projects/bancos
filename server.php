<?php
    require('app/libraries/nusoap/nusoap.php');
    
    function conexao() {
        return new PDO('mysql:host=127.0.0.1:3307;dbname=bancos', "edvaldo", "vander");
        var_dump('certo');
    }

    function movimentar($origem, $destino, $valor) {
        $conn = conexao();
        $return = 0;

        $stmt = $conn->prepare("SELECT * FROM contas WHERE conta=?");
        $stmt->execute([$origem]); 
        $conta_origem = $stmt->fetch();

        $stmt = $conn->prepare("SELECT * FROM contas WHERE conta=?");
        $stmt->execute([$destino]); 
        $conta_destino = $stmt->fetch();

        if($conta_origem && $conta_destino) {
            $valor_actual = $conta_origem['valor'] - $valor;
            $valor_ganho = $conta_destino['valor'] + $valor;
            if($valor_actual >= 0) {
                $debito = $conn->prepare("UPDATE contas SET contas.valor = :valor WHERE contas.conta = :origem")->execute(array('valor' => $valor_actual, 'origem' => $origem));
                if($debito) {
                    $deposito = $conn->prepare("UPDATE contas SET contas.valor = :valor WHERE contas.conta = :destino")->execute(array('valor' => $valor_ganho, 'destino' => $destino));
                    if($deposito) {
                        $stmt = $conn->prepare("INSERT INTO movimentos (conta_origem, conta_destino, valor) VALUES (?, ?, ?)");
                        $movimento = $stmt->execute([$origem, $destino, $valor]); 
                        return $conn->lastInsertId();
                    }
                }
            } 
        }
        return $return;
    }

    $server = new soap_server();
    $ns = "http://{$_SERVER['HTTP_HOST']}/server.php";
    $server->configureWSDL('Bancos', $ns,'','document');

    $server->register("movimentar",
        array(
            "origem" => "xsd:int", 
            "destino" => "xsd:int", 
            "valor" => "xsd:double", 
        ),
        array("return" => "xsd:int"),
        $ns,
        "",
        "",
        "",
        "get reference from transation"
    );

    $server->service(file_get_contents("php://input"));
?>
