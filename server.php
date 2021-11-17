<?php
    require('app/libraries/nusoap/nusoap.php');
    
    function conexao() {
        return new PDO('mysql:host=127.0.0.1:3307;dbname=bancos', "edvaldo", "vander");
    }

    function movimentar($token, $origem, $destino, $valor) {
        $conn = conexao();
        $return = 0;
        $return = 555;
        $access = $conn->prepare("SELECT code_access.token FROM code_access WHERE code_access.token = :token")->execute(array('token' => $token))->fetch();
        if(!$access) {
            // $return = $access->code;
            $return = 777;
            // $conta_origem = $conn->prepare("SELECT * FROM contas WHERE contas.conta = :origem")->execute(array('origem' => $origem))->fetch();
            // $valor_actual = $conta_origem['valor'] - $valor;

            // if($valor_actual >= 0) {
            //     $debito = $conn->prepare("UPDATE contas SET contas.valor = :valor WHERE contas.conta = :origem")->execute(array('valor' => $valor_actual, 'origem' => $origem));
            //     if($debito) {
            //         $deposito = $conn->prepare("UPDATE contas SET contas.valor = :valor WHERE contas.conta = :destino")->execute(array('valor' => $valor, 'destino' => $destino));
            //         if($deposito) {
            //             $conta_origem = $conn->prepare("INSERT INTO movimentos (conta_origem, conta_destino, valor) VALUES (':conta_origem', ':conta_destino', ':valor')")
            //             ->execute(array('conta_origem' => $origem, 'conta_destino' => $destino, 'valor' => $valor));
            //             return $conn->lastInsertId();
            //         }
            //     }
            // } 
        }
        
        return $return;
    }
    
    function getToken($code) {
        $conn = conexao();
        $stmt = $conn->prepare(
          "SELECT code_access.token FROM code_access WHERE code_access.code = :code");
        $stmt->execute(array('code' => $code));

        $token = $stmt->fetch();
        return ($token) ? $token['token'] : '';
    }

    $server = new soap_server();
    $ns = "http://{$_SERVER['HTTP_HOST']}/server.php";
    $server->configureWSDL('Bancos', $ns,'','document');

    $server->register("movimentar",
        array(
            "token" => "xsd:string", 
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
    
    $server->register("getToken",
        array("code" => "xsd:string"),
        array("return" => "xsd:string"),
        $ns,
        "",
        "",
        "",
        "get token from User"
    );

    $server->service(file_get_contents("php://input"));
?>
