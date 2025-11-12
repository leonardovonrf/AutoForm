<?php

	include "banco.php";

	$c = conecta();

	$sql = "select * from contato";
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
		while($linha)
		{
			echo "<div style=\"padding:10px;margin:5px;border:2px blue dashed;\">";
			echo "Id piloto: <b>{$linha["id_piloto"]}</b><br>";
			echo "Nome: <b>{$linha["nome"]}</b><br>";
			echo "Equipe: <b>{$linha["equipe"]}</b><br>";
			echo "<a href=\"contato-atualiza.php?id_contato={$linha["id_piloto"]}\">Edita</a>";
			echo " | ";
			echo "<a href=\"contato-delete.php?id_contato={$linha["id_piloto"]}\">Deleta</a>";
			echo "</div>";
			$linha = mysqli_fetch_assoc($resp);
		}
	}
	else
	{
		echo "tabela vazia";
	}
	echo "<a href=\"contato-inclui.php\">Inclui</a>";
	mysqli_free_result($resp);
	mysqli_close($c);

	
