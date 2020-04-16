<?php
	include_once 'php_action/db_connect.php';
	include_once 'includes/header.php';
	include_once 'includes/mensagem.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<table>
			<h3 class="light">Clientes</h3>
			<thead class="striped">
				<tr>
					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Email:</th>
					<th>Idade:</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM cliente";
					$resultado = mysqli_query($connect,$sql);
					if(mysqli_num_rows($resultado) > 0):
						while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['sobrenome']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['idade']; ?></td>
					<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
					<td><a href="php_action/delete.php?id=<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
				</tr>
				<?php
					endwhile;
					endif;
				?>
			</tbody>
		</table>
		<br>
		<a href="adicionar.php" class="btn">Adicionar cliente</a>
	</div>
</div>
<?php
	include_once 'includes/footer.php';
?>