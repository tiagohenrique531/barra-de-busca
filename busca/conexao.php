<?php 

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'busca');

  
        $mysqli = new MySQLi(HOST,USER,PASS,BASE);

        if($mysqli->connect_errno) {
            die("Falha na conexão com o banco de dados");
        }

        //echo "Conexão estabelicida";
        

    


?>