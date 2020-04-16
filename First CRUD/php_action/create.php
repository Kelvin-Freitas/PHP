<?php
	session_start();
	require_once 'db_connect.php';
	function clear($input){
		global $connect;
		$var = mysqli_escape_string($connect,$input);
		$var = htmlspecialchars($var);
		return $var;
	}
	if(isset($_POST['btn-cadastrar'])):
		$nome = clear($_POST['nome']);
		$sobrenome = clear($_POST['sobrenome']);
		$email = clear($_POST['email']);
		$idade = clear($_POST['idade']);
		$email = filter_var($email,FILTER_SANITIZE_EMAIL);
		
		$sql = "INSERT INTO cliente(nome,sobrenome,email,idade) VALUES ('$nome','$sobrenome','$email','$idade')"; 
		if(filter_var($email,FILTER_VALIDATE_EMAIL)):
			if(mysqli_query($connect,$sql)):
				$_SESSION['mensagem'] = "Cadastrado com sucesso!";
				header('Location: ../index.php');
			else:
				$_SESSION['mensagem'] = "Não possível realizar o cadastro!";
				header('Location: ../index.php');
			endif;
		else:
			$_SESSION['mensagem'] = "Email Inválido!";
			header('Location: ../index.php');
		endif;
	endif;
?>