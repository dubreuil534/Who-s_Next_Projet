<?php
include("Server_Conf.php");


session_start();
		try{
			$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
			$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$qt="SELECT username,email,age,password,sex,orientation,region,buts,description,statut FROM user WHERE email=? AND password=?";
		$stmt=$cn->prepare($qt);
		$stmt->bindValue(1, $_POST['email']);		
		$stmt->bindValue(2, $_POST['pass']);
		
				if($stmt->execute()){
						$ligne=$stmt->fetch(PDO::FETCH_OBJ);
				   $_SESSION['user']=$ligne;
			
			echo $ligne->username;
		$qt="UPDATE user SET statut=1 WHERE email='".$_POST['email']."';";
			$stm=$cn->prepare($qt);
			$stm->execute();
						if (!empty($_SESSION['user']))
							header('Location:index.php');
						else
							header('Location:alerte.php');


				}

			
		}catch(PDOException $ex){
			$_SESSION['messcon']='<span style="color:red">Erreur : '.$ex->getMessage().'</span>';
			echo "Error : ".$ex->getMessage().";alert-error";

		}
		
		
?>