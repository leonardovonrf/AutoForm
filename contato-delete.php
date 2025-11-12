<?php
	include "banco.php";
	$id_piloto = $_REQUEST["id_piloto"];

	if(!empty($id_piloto))
	{
		$sql = "delete from contato where id_piloto = $id_piloto";
		$c = conecta();
		$resp = mysqli_query($c,$sql);
		if(!$resp)
		{
			echo "erro na consulta $sql";
			echo mysqli_error($c);
			mysqli_close($c);
			die();
		}
		else
		{
			// Redirect: Volta para a página contato-lista.php
			header("location: contato-lista.php");
		}
	}	
	else
	{
		echo "ID não informado";		
	}
