<?php
	include "banco.php";

	$id_piloto = $_REQUEST["id_piloto"];
	$nome = $_REQUEST["nome"];
	$equipe = $_REQUEST["equipe"];

	if(empty($id_contato))
	{
		// Inclusão
		$sql = "insert into contato(nome,equipe) values ('$nome','$equipe')";
	}
	else
	{
		// Alteração
		$sql = "update contato set nome = '$nome', equipe = '$equipe' where id_equipe= $id_equipe";
	}

	$c = conecta();

	$resp = mysqli_query($c, $sql);

	if(!$resp)
	{
		echo "erro na consulta $sql";
		echo mysqli_error($c);
		mysqli_close($c);
		die();
	}
	else
	{
		// Redirect
		header("location: contato-lista.php");
	}


