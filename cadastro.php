<?php

    $email = $_POST['email'];
    $nick =  $_POST['nick'];

    setcookie("email", "$email", (time() + (3 * 24 * 3600)));
    setcookie("nick", "$nick", (time() + (3 * 24 * 3600)));

    if($_COOKIE != null){
        echo "cookie recebido<br>";   
    }else{
       echo"";
    }

?>

<?php
    $file = fopen("formulario.txt", "a+");
    $line = sprintf("Email= %s\nNickname= %s\n \r", $_POST['email'], $_POST['nick']);
    fwrite($file, $line);

    fclose($file);

?>




  <link rel = "stylesheet" href="style.css">
        <body>
            <div id = "corpo-form">

            <h1>Cadastro</h1>
                <form action="cad_user.php" method="post">
                    <input type="text" name="name" placeholder="Nome" required/>
                    <input type="text" name="end" placeholder="Endereço" required/></p>
                    <input type="number" name="fone" placeholder="Telefone" required/></p>
                    <input type="submit" class="cadastro" value = "Cadastrar"/></p>
                </form>
            </div>
        </body>
