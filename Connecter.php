<?php
include("Server_Conf.php");
include("db/_common.php");

session_start();
		try{
			$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
			$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$qt="SELECT username,email,age,password,sex,orientation,region,buts,description,statut,photo FROM user WHERE email=?";
		$stmt=$cn->prepare($qt);
		$stmt->bindValue(1, $_POST['email']);		
		//$stmt->bindValue(2, passwd_encrypt($_POST['pass']));
		
				if($stmt->execute()){
						$ligne=$stmt->fetch(PDO::FETCH_OBJ);
				   $_SESSION['user']=$ligne;
			
			
						if (!empty($_SESSION['user'])){
							        
									if(passwd_check($_POST['pass'],$ligne->password)){
							
										$qt="UPDATE user SET statut=1 WHERE email='".$_POST['email']."';";
										$stm=$cn->prepare($qt);
										$stm->execute();
								
										header('Location:index.php');
									}else
									header('Location:alerte.php');
						}
						else
							header('Location:alerte.php');


				}

			
		}catch(PDOException $ex){
			$_SESSION['messcon']='<span style="color:red">Erreur : '.$ex->getMessage().'</span>';
			echo "Error : ".$ex->getMessage().";alert-error";

		}
		
		
?>