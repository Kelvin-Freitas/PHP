<?php
	include_once 'includes/header.php';
?>
<div class="row">
	<div class="col s12 m6 push-m3">
		<form action="php_action/create.php" method="POST">
			<h3 class="light">Novo cliente</h3>
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome"/>
				<label for="nome">Nome</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="sobrenome" id="sobrenome"/>
				<label for="sobrenome">Sobrenome</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="email" id="email"/>
				<label for="email">Email</label>
			</div>
			<div class="input-field col s12">
				<input type="text" name="idade" id="idade"/>
				<label for="idade">Idade</label>
			</div>
			<button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
			<a href="index.php" type="submit" class="btn green">Lista de Clientes</a>
		</form>
	</div>
</div>
<?php
	include_once 'includes/footer.php';
?>