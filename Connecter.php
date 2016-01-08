<?php
include("Server_Conf.php");

session_start();
		try{
			$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
			$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$qt="SELECT Login,Nom,Password,Prenom,Photo,Email,Statut FROM membre WHERE Email=? AND Password=?";
		$stmt=$cn->prepare($qt);
		$stmt->bindValue(1, $_POST['email']);		
		$stmt->bindValue(2, md5($_POST['pass']));
		
				if($stmt->execute()){
						$ligne=$stmt->fetch(PDO::FETCH_OBJ);
				   $_SESSION['user']=$ligne;
			
			
		$qt="UPDATE membre SET Statut=1 WHERE Email='".$_POST['email']."';";
			$stm=$cn->prepare($qt);
			$stm->execute();
			header('Location:/tp_dof/Tchat.php');
				}else
				header('Location:alerte.php');
			
		}catch(PDOException $ex){
			$_SESSION['messcon']='<span style="color:red">Erreur : '.$ex->getMessage().'</span>';
			echo "Error : ".$ex->getMessage().";alert-error";
		}
		
		
?>