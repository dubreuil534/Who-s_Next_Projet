<?php
include("Server_Conf.php");
session_start();
$user=$_SESSION['user'];
		try{
				$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);

				$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$qt="INSERT INTO message(Recepteur,Emetteur,Texte,DateMess) VALUES(?,?,?,?)";

				$stmt=$cn->prepare($qt); 

				$stmt->bindValue(1, $_GET['id']);
				$stmt->bindValue(2, $user->Login);
				$stmt->bindValue(3, $_GET['mess']);
				$stmt->bindValue(4,  date("Y-m-d h:i:s",time()));
				if($stmt->execute())
				echo 'ok';
				else
				echo 'no';
				$cn=null;
		}catch(PDOException $ex){
			echo $ex->getMessage();
		}

?>