<?php
    function conecta() {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "agenda";
        $c = mysqli_connect($host,$usuario,$senha);

        if(!$c)
        {
            echo "erro na conexão";
            echo mysqli_error($c);
            die();
        }

        if(!mysqli_select_db($c,$banco))
        {
            echo "erro no select_db";
            echo mysqli_error($c);
            mysqli_close($c);
            die();
        }

        return $c;
    }

