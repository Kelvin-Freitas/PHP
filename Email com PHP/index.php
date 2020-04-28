<?php
require __DIR__ . "/vendor/autoload.php";
echo "<h1>PHP Mailer</h1><br>";

use Source\Support\Email;

$email = new Email(); 

$email->add(
	"Meu email de teste", //assunto
	"<h1>Ola estou lhe enviando esse email como teste, não é preciso responder!</h1>", //corpo da mensagem
	"Fulano", 
	"fulano@gmail.com" 
)->send(); //preparamos o email e em seguida enviamos

if(!$email->error()){
	var_dump(true);
}else{
	echo $email->error()->getMessage(); //visualização do erro ocorrido
}
