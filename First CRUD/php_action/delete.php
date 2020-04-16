<?php
	session_start();
	require_once 'db_connect.php';
	if(isset($_GET['id'])):
		$id = mysqli_escape_string($connect,$_GET['id']);
		
		$sql = "DELETE FROM cliente WHERE id='$id'"; 
		
		if(mysqli_query($connect,$sql)):
			$_SESSION['mensagem'] = "Deletado com sucesso!";
			header('Location: ../index.php');
		else:
			$_SESSION['mensagem'] = "Erro ao deletar!";
			header('Location: ../index.php');
		endif;
	endif;
?>