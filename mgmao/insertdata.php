<?php

include ('dbconnection.php');
if(isset($_POST['ajouter'])){
$marque = $_POST['marque'];
$parc = $_POST['parc'];
$immatricule = $_POST['immatricule'];
$chassis  = $_POST['chassis'];
$kilometrage  = $_POST['kilometrage'];
$query = "insert into `buses`(`marque`,`numero_parc`,`numero_immatriculation`,`numero_chassis`,`kilometrage`) values ('$marque', '$parc','$immatricule',
'$chassis', '$kilometrage')";
$result = mysqli_query($connection,$query);

    header('location:index.php?insert_msg=your data has been added seccusfuly');
}


?>



 