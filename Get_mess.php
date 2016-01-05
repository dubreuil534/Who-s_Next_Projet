<?php

try{
	session_start();
include("Server_Conf.php");
$user=$_SESSION['user'];

if(!empty($_SESSION['idmess']) && $_SESSION['idmess']!= $_GET['id']){
	$_SESSION['nbr']= 0;
	//echo 'nbr = '.$_SESSION['nbr'].' imess = '.$_SESSION['idmess'].' id = '.$_GET['id'];
}
if(!isset($_SESSION['nbr'])){
	$_SESSION['nbr']=0;
	//echo 'nbr = '.$_SESSION['nbr'].' imess = '.$_SESSION['idmess'].' id = '.$_GET['id'];
}
$_SESSION['idmess']=$_GET['id'];

$cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);

$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$qt="SELECT u.Nom as nomr,u.Prenom as prenomr,ue.Nom as nome,ue.Prenom as prenome,u.Photo as phr,ue.Photo as phe,m.Texte,m.DateMess,m.Recepteur,m.Emetteur FROM message m join membre u on u.Login=m.Recepteur join membre ue on ue.Login=m.Emetteur WHERE (m.Recepteur=? AND m.Emetteur=?) OR (m.Recepteur=? AND m.Emetteur=?) ORDER BY m.DateMess LIMIT 1000 OFFSET ".$_SESSION['nbr'];
//echo $qt;
//echo "idrecept = ".$_GET['id']." emet = ".$user->Id." nbr = ".$_SESSION['nbr'];
		$stmt=$cn->prepare($qt);
		$stmt->bindValue(1, $user->Login);		
		$stmt->bindValue(2, $_GET['id']);	
		$stmt->bindValue(3, $_GET['id']);	
		$stmt->bindValue(4, $user->Login);	
		//$stmt->bindValue(5, $_SESSION['nbr']);	
	    $p=$stmt->execute();
//$res=$cn->query($qt);
//echo $stmt->num_rows;
//unset($_SESSION['nbr']);
//echo $_SESSION['nbr'];

$cpt=0;
$_SESSION['idmess']=$_GET['id'];
//echo 'session : '.$_SESSION['nbr'];
while($rw=$stmt->fetch(PDO::FETCH_OBJ)){
	//echo $qt;
	//echo 'idem = '.$rw->IdEmetteur.' et iduser='.$user->CheminPhoto;
	//echo $cpt." --- ".$_SESSION['nbr'];
	if($rw->Emetteur==$user->Login){
	?>
    <li class="in">
                                                <img class="avatar" alt="" src="/demo/Photo/<?php echo $rw->phe; ?>" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> <?php echo $rw->prenome." ".$rw->nome; ?> </a>
                                                    <span class="datetime"> <?php echo date("d/M/Y h:i:s",strtotime($rw->DateMess)); ?> </span>
                                                    <span class="body"> <?php echo $rw->Texte; ?> </span>
                                                </div>
   </li>
	 
	 <?php }else{ ?>
     <li class="out">
                                                <img class="avatar" alt="" src="/demo/Photo/<?php echo $rw->phe; ?>" />
                                                <div class="message">
                                                    <span class="arrow"> </span>
                                                    <a href="javascript:;" class="name"> <?php echo $rw->prenome." ".$rw->nome; ?> </a>
                                                    <span class="datetime"> <?php echo date("d/M/Y h:i:s",strtotime($rw->DateMess)); ?> </span>
                                                    <span class="body"> <?php echo $rw->Texte; ?> </span>
                                                </div>
   </li>
                                        
<?php	

	 
	}
	$cpt++;
}
$_SESSION['nbr']+=$cpt;
//echo ' session = '.$_SESSION['nbr'];

}catch(PDOException $ex){
	echo $ex->getMessage();
}
									
?>