<?php
      if($_COOKIE != null){
        echo "Todos os cookies foram recebidos!<br>";
        print_r($_COOKIE);  
    }else{
       echo"";
    }
?>

    <link rel = "stylesheet" href="style.css">
    <body>
        <div id = "corpo-form">
            <h1>Dados gravados com sucesso!</h1>
        </div>
    </body>

<?php

    $cpf = $_POST['cpf'];
    $rg =  $_POST['rg'];
    $escolaridade = $_POST['escolaridade'];

    setcookie("cpf", "$cpf", (time() + (3 * 24 * 3600)));
    setcookie("rg", "$rg", (time() + (3 * 24 * 3600)));
    setcookie("escolaridade", "$escolaridade", (time() + (3 * 24 * 3600)));

  


?>

   

<?php

    $cpf = ($_POST['cpf']);
    $rg = ($_POST['rg']);

    $file = fopen("formulario.txt", "a+");

    if(validaCPF($_POST['cpf']) == true && validaRG($_POST['rg'])==true){
    $line = sprintf("CPF= %d\nRG= %d\nEscolaridade= %s\n \r", $_POST['cpf'], $_POST['rg'], $escolaridade = $_POST['escolaridade']);
    fwrite($file,$line);
    fclose($file);

    }else{

        header('location: /cad_user.php');

    }

    function validaCPF(){

        $cpf = ($_POST['cpf']);
        $cpf = preg_replace('/[^0-9]/','',$cpf);    //Pegar apenas os numeros de 0 a 9
        $digitoA = 0;
        $digitoB = 0;

        //Calcular o primeiro digito
        for($i = 0, $peso = 10;$i <= 8;$i++,$peso--){
            $digitoA += $cpf[$i] * $peso;
        }

        //Calcular o segundo digito
        for($i = 0, $peso = 11;$i <= 9;$i++,$peso--){

            if(str_repeat($i, 11) == $cpf){
                return false;
            }

            $digitoB += $cpf[$i] * $peso;
        }

        //Descobrir primeiro digito
        $somaA = (($digitoA%11) < 2) ? 0 : 11 - ($digitoA%11);

        //Descobrir segundo digito
        $somaB = (($digitoB%11) < 2) ? 0 : 11 - ($digitoB%11);

        if ($somaA != $cpf[9] || $somaB != $cpf[10]){
            return false;
        }else{
            return true;
        }
    }

    if(validaCPF()){
        return true;
    }else{
        return false;
    }

    $rg = ($_POST['rg']);

    function validaRG($rg){
    
    $digito = 0;
    $digitoX = false;

    if(strlen($rg) != 9){
        return false;
    }

    $separador = str_split($rg, 1);
    
    if($separador[8] == 'x' || $separador[8] == 'X'){

        $rg[8] = 1;
        $digitoX = true;
    }

    for($i = 0, $peso = 2;$i <= 8;$i++, $peso++){

        if($digitoX == false && $i == 8){
            $peso = 100;

        }else if($digitoX == true && $i == 8){
            $peso = 1000;
        }

        $digito += $separador[$i] * $peso;
    }

        if($digito%11 != 0){
            return false;
        }

        return true;
    }


?>
