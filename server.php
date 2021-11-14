<?php
    require('app/libraries/nusoap/nusoap.php');
    
    function conexao() {
        return new PDO('mysql:host=127.0.0.1:3307;dbname=larga_caixa', "edvaldo", "vander");
    }

    function files($token) {
        $conn = conexao();
        $stmt = $conn->prepare(
          "SELECT ficheiros.descricao, ficheiros.preco, ficheiros.ficheiro, ficheiros.created_at
          from ficheiros join users on ficheiros.user_id = users.id
            WHERE users.token = :token");
        $stmt->execute(array('token' => $token));
        $ficheiros = $stmt->fetchAll();
        $return = array();
        
        foreach ($ficheiros as $ficheiro) {
            $return = array_merge($return, 
                array(
                    array( 
                        'descricao' => $ficheiro['descricao'], 
                        'preco' => $ficheiro['preco'],
                        'ficheiro' => "http://{$_SERVER['HTTP_HOST']}/uploads/ficheiros/".$ficheiro['ficheiro'],
                        'data' => $ficheiro['created_at'],
                    ),
                )
            );
        }
        return $return;
    }
    
    function getToken($username) {
        $conn = conexao();
        $stmt = $conn->prepare(
          "SELECT users.token FROM users WHERE users.username = :username ");
        $stmt->execute(array('username' => $username));

        $user = $stmt->fetch();
        if($user) {
            // echo $user['token'];
            return $user['token'];
        } else {
            // echo "Error ao tentar pegar o token!";
            return "Error ao tentar pegar o token!";
        }
    }

    function hello() {
        return "Welcome back, Boss";
    }

    $server = new soap_server();
    $ns = "http://{$_SERVER['HTTP_HOST']}/server.php";
    $server->configureWSDL('Larga Caixa', $ns,'','document');

    
    $server->wsdl->addComplexType(
        'file',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'descricao' => array('name' => 'descricao', 'type' => 'xsd:string'),
            'preco' => array('name' => 'preco', 'type' => 'xsd:string'),
            'ficheiro' => array('name' => 'file', 'type' => 'xsd:string'),
            'data' => array('name' => 'data', 'type' => 'xsd:string')
        )
    );

    $server->wsdl->addComplexType(
        'books',
        'complexType',
        'array',
        '',
        'SOAP-ENC:Array',
        array(),
        array(
            array(
                'ref' => 'SOAP-ENC:arrayType',
                'wsdl:arrayType' => 'tns:file[]'
            )
        ),
        'tns:file'
    );

    $server->register("files",
        array("token" => "xsd:string"),
        array("return" => "tns:books"),
        $ns,
        "",
        "",
        "",
        "get list of files"
    );
    
    $server->register("getToken",
        array("username" => "xsd:string"),
        array("return" => "xsd:string"),
        $ns,
        "",
        "",
        "",
        "get token from User"
    );

    $server->register("hello",
        array(),
        array("return" => "xsd:string"),
        $ns,
        "",
        "",
        "",
        "say hi to the caller"
    );

    $server->service(file_get_contents("php://input"));

    // $result = getToken('edvaldo');
    // print_r($result);
?>
