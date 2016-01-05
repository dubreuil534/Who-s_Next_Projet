<?php
include("Server_Conf.php");
session_start();
if(!empty($_SESSION['nbr']))

	$_SESSION['nbr']=0;	

$user= $_SESSION['user'];
try{

			$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD); 
			

			$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			

			$qt="UPDATE message SET Vu=1 WHERE Recepteur='".$user->Login."' AND Emetteur='".$_GET['id']."';";
			

			$stm=$cn->prepare($qt);
			$stm->execute();
			

}catch(PDOException $ex){
			echo "Error : ".$ex->getMessage().";alert-error";
}				
?>				
