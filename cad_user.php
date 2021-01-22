<?php

    $nome = $_POST['name'];
    $endereco =  $_POST['end'];
    $telefone = $_POST['fone'];

    setcookie("nome", "$nome", (time() + (3 * 24 * 3600)));
    setcookie("endereco", "$endereco", (time() + (3 * 24 * 3600)));
    setcookie("telefone", "$telefone", (time() + (3 * 24 * 3600)));

    if($_COOKIE != null){
        echo "cookie recebido<br>";   
    }else{
       echo"";
    }

?>

<?php
    $file = fopen("formulario.txt", "a+");
    $line = sprintf("Nome= %s\nEndereço= %s\nTelefone= %d\n \r", $_POST['name'], $_POST['end'], (int)$_POST['fone']);
    fwrite($file, $line);

    fclose($file);
?>


    <link rel = "stylesheet" href="style.css">
    <body>
        <div id = "corpo-form">
        <h1>Cadastro</h1>
            <form action="validacao.php" method="post">
                <input type="number" name="cpf" placeholder = "CPF" required/></p>
                <input type="number" name="rg" placeholder = "RG" required/></p>
                <select class="escolaridade" name="escolaridade">
                    <option value="" disable selected> Escolaridade</option>
                    <option value="Ensino Medio Completo">Ensino Medio Completo</option>
                    <option value="Ensino Medio Incompleto">Ensino Medio Incompleto</option>
                    <option value="Superior Completo">Superior Completo</option>
                    <option value="Superior Incompleto">Superior Incompleto</option>
                    <option value="Mestrado">Mestrado</option>
                    <option value="Doutorado">Doutorado</option>
                    <option value="Tecnico">Tecnico</option>
                </select>
                <input type="submit" class="cadastro" value = "Cadastrar"/></p>
        </form>
        </div>
    </body>

