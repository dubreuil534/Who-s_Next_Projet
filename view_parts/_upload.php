<?php
$upload_msg = ''; // Message d'erreur le cas échéant
$upload_ok = array_key_exists('image_files', $_FILES);
if ( ! $upload_ok) {
    $upload_msg = 'Pb upload';; // Message pour résumer l'upload
};

if ($upload_ok) {
    $filename = $_FILES["image_files"]["name"];
    $extension = explode(".",$filename);
    $ext= $extension[count($extension)-1 ];
    $user = $_SESSION['user'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($user->username.'.'.$ext);

}

/*var_dump($_FILES);*/
//    echo '<p>Le fichier '. basename( $_FILES["image_files"]["name"]). ' a été téléversé avec succès.</p>';
//    echo '<img src="uploaded_files/' . $_FILES["image_files"]["name"] . '" title="uploaded images" />';



// Vérification des fichiers uploadés : Sont-ce des images valides ?
/*if (isset($_POST["upload_submit"])) {
    $check = getimagesize($_FILES["image_files"]["tmp_name"]);
    $upload_ok = ($check !== false);
    if ( ! $upload_ok) {
        $upload_msg = 'Le fichier téléversé n\'est une images valide.';
    }
    //echo 'Le fichier téléversé est une images valide (' . $check["mime"] . ').';
}*/

// Check if file already exists
if ($upload_ok && file_exists($target_file)) {
    $upload_msg .= '<br>Le fichier existe déjà.';
    $upload_ok = false;
}

// Check file size
if ($upload_ok && $_FILES["image_files"]["size"] > 1000000) {
    $upload_msg .= '<br>Le fichier trop gros : (La taille maximale est 500000 octets).';
    $upload_ok = false;
}

// Allow certain file formats
if ($upload_ok) {
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $upload_msg .= '<br>Le format de fichier est invalide : (JPG, JPEG, PNG & GIF uniquement).';
        $upload_ok = false;
    }
}

// Transfert du fichier
if ($upload_ok) {
    if (!move_uploaded_file($_FILES["image_files"]["tmp_name"], $target_file)) {
        $upload_ok = false;
    }

   $cn=new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME,USER_NAME,PASSEWORD);
    $qt="UPDATE user SET photo = '".$user->username.".".$ext."' WHERE username='".$user->username."';";
    $stm=$cn->prepare($qt);
    $stm->execute();

}

?>

<!--<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Résultat du téléversement</title>
</head>
<body>
<h1>Résultat du téléversement</h1>
<?php
/*/*if ($upload_valid) {
    echo '<p>Le fichier '. basename( $_FILES["image_files"]["name"]). ' a été téléversé avec succès.</p>';
    echo '<img src="uploaded_files/' . $_FILES["image_files"]["name"] . '" title="uploaded images" />';
} else {
    echo '<p>Le fichier n\'a pas été téléchargé.</p>';
    echo "<p>$error_msg</p>";
    echo '<img width="200px" src="images/grumpy-cat_1_0.jpg" title="uploaded images" />';
}
*/?>
</body>
</html>-->