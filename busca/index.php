<?php 
    include_once('conexao.php');

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sistema de Busca</title>
</head>

<body>


    <div class="wrap">
        <h1>Blink Seeker</h1>
        <span>Qual carro deseja: </span>

        <div class="search">
            <form action="">
                <input type="text" name="busca" class="searchTerm" placeholder="Buscar Possanate" autocomplete="off">
                <button type="submit" class="searchButton">
                    <img src="https://cdn-icons-png.flaticon.com/512/219/219793.png" class="img"></img>
            
                </button>
            </form>
        </div>
        <table width="600px" border="1">
            <tr>
                
                <th>Marca</th>
                <th>Ano</th>
                <th>Nome</th>
            </tr>
            <?php if(!isset($_GET['busca'])) {

                 ?>
            <tr>
                <td colspan="3">Digite algo para pesquisar...</td>
            </tr>
            <?php 
            } else {

                $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                $sql_code = "SELECT * FROM veiculos WHERE nome LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%' OR ano LIKE '%$pesquisa%'";
    
                $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);

                if($sql_query->num_rows == 0) {
                    ?>
                <tr>
                    <td colspan="3">Nenhum resultado encontrado...</td>
                </tr> 
                <?php

                } else {
                    while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td> <?php echo $dados['marca']; ?></td>
                        <td> <?php echo $dados['ano']; ?></td>
                        <td> <?php echo $dados['nome']; ?></td>
                    </tr>
                    <?php
                } 

            }
            
            ?>
            <?php }?>
        </table>
        <?php
        
            
             

        



        /*if($qtd > 0 ) {
        print "<table border='1' cellpadding='18pt' cellspacing='2pt' >";
        print "<tr> <br><br>";
        print "<th>#</th>";
        print "<th>Marca</th>";
        print "<th>Ano</th>";
        print "<th>Nome</th>";
        print "</tr>";
        while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>".$row->idveiculos."</td>";
        print "<td>".$row->marca."</td>";
        print "<td>".$row->ano."</td>";
        print "<td>".$row->nome."</td>";
        print "</tr>";
        }
        print "</table>";
        } else {
        print "<p> Não encontrou resultados </p>";
        }*/

        ?>
    </div>
</body>

</html>