<?php
	session_start();
	mysql_connect('localhost','root','') or die("Database  not connect");
	mysql_select_db('voter') or die("No database selected");
	

	$configVars = array();
	error_reporting(0);
	$configVars['my_email'] = 'testmailalert20@gmail.com';
	$configVars['user_name'] = 'testmailalert20@gmail.com';
	$configVars['password'] = 'qwghdvduxumxjidk';

	function sendMail($param){
		  $message = '
			<html>
			  <body bgcolor="#DCEEFC">
			    <center>
				'.$param['message'].'
				Thanks
  			    </center>
			  </body>
			</html>';
	   sendOrderMail($message);
	}

	function sendOrderMail($msg){
		
		global $configVars;
		include_once('phpmailer/class.smtp.php');
		include_once('phpmailer/class.pop3.php');
		include_once('email.class.inc.php');
		$html .= 'Dear '.$_SESSION['logged_user'].',<br />';
		$html .= $msg;
		$email = new Email();
		$email->set_from($configVars['my_email']);
		$email->set_from_name('Compliant Status');		
		$email->set_subject('Your Compliant Status');
		$email->set_message(html_entity_decode($html));
		$email->add_to($configVars['my_email'],'shop now');
		$email->add_to($_SESSION['user_email'],$_SESSION['logged_user']);
		echo 'sennt';
		$sent_flag = $email->send();
	}
	



?>

