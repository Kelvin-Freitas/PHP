<?php
namespace Source\Support;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email{
	
	/** @var PHPMailer */
	private $email;
	private $error;
	private $data;
	
	public function __construct(){
		$this->email = new PHPMailer();
		$this->data  = new stdClass; //cria objeto vazio capaz de adicionar propriedades
		
		$this->email->SMTPDebug = SMTP::DEBUG_SERVER;
		$this->email->isSMTP();
		$this->email->isHTML(true); //permite enviar como html
		$this->email->setLanguage("br");
		
		$this->email->SMTPAuth = true; //autenticação do servidor SMTP
		$this->email->SMTPSecure = "tls"; //segurança utilizada
		$this->email->CharSet ="utf-8";
		
		//dados ja definidos na configuração
		$this->email->Host = MAIL["host"];
		$this->email->Username = MAIL["username"];
		$this->email->Password = MAIL["passwd"];
		$this->email->Port = MAIL["port"];
	}
	
	//função utilizada para adicionar dados ao email
	public function add(string $subject,string $body,string $recipient_name,string $recipient_email): Email{
		$this->data->subject = $subject; 
		$this->data->body = $body; 
		$this->data->recipient_name = $recipient_name; 
		$this->data->recipient_email = $recipient_email;
		return $this;
	}
	
	//funcao utilizada para anexar arquivos 
	public function attach(string $filePath, string $fileName): Email{
		$this->data->attach[$filePath] = $fileName;
		return $this;
	}
	
	//função para enviar o email
	public function send(string $from_name=MAIL["from_name"],string $from_email=MAIL["from_email"]): bool{ //dados definidos na configuração
		try{
			$this->email->Subject = $this->data->subject; //adiciona o assunto
			$this->email->msgHTML($this->data->body); //corpo da mensagem em html
			$this->email->setFrom($from_email,$from_name); 
			$this->email->addAddress($this->data->recipient_email,$this->data->recipient_name); //email e nome de quem receberá
			
			//caso tenha dados para anexar no arquivo
			if(!empty($this->data->attach)){
				foreach($this->data->attach as $path => $name){
					$this->email->addAttachment($path,$name); //aqui será anexado o arquivo
				}
			}
			
			$this->email->send(); //envia o email
			return true;
		}catch(Exception $exception){
			$this_error = $exception;
			return false;
		}
	}
	public function error(): ?Exception{
		return $this->error;
	}
}