<?php
	include "banco.php";
	
	$id_contato = $_REQUEST["id_piloto"];
	$c = conecta();
	$sql = "select * from contato where id_piloto = $id_piloto";
	$resp = mysqli_query($c, $sql);

	if(!$resp)
	{
		echo "erro na consulta $sql";
		echo mysqli_error($c);
		mysqli_close($c);
		die();
	}

	$linha = mysqli_fetch_assoc($resp);
	if($linha)
	{
		$nome = $linha["nome"];
		$email = $linha["equipe"];
		include "contato-form.php";
	}
	else
	{
		echo "Nao encontrado";
	}

	mysqli_free_result($resp);
	mysqli_close($c);

