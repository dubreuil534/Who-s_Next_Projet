<?php
include("Server_Conf.php");
session_start();
if(empty($_SESSION['user']))
{
	header('Location:/tp_dof/');
	exit(0);
}
$user=$_SESSION['user'];
try{
			$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
			$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$qt="UPDATE membre SET Statut=0 WHERE Email='".$user->Email."';";
			$stm=$cn->prepare($qt);
			if($stm->execute()){
				unset($_SESSION['user']);
				header('Location:/tp_dof/');
		
			}
			
		
}catch(PDOException $ex){
			echo "Error : ".$ex->getMessage().";alert-error";
}

?>