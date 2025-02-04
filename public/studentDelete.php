<?php
session_start();
require("../paspublic/connect.php");
if(isset($_POST["id"])){
    $_SESSION["id"] = $_POST["id"];
}
$result = getStudentsByPromotion($_SESSION["promotion"]);
$result = $result[$_SESSION["id"]];
$nom = $result["Nom"];
$prenom = $result["Prenom"];
$id = $result["Identifiant"];

if (isset($_POST["answer"])){
    if ($_POST["answer"] == "oui"){
        deleteEtudiant($id);
        unset($_SESSION["id"]);
        header("Location:pasindex.php");
    }else{
        unset($_SESSION["id"]);
        header("location:pasindex.php");
    }
}
?>

<html>
<head>
    <title>Gestion de l'IIA</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Voulez vous vraiment supprimez <?php echo $nom." ".$prenom ?></h1>
    <input type="submit" name="answer" value="oui">
    <input type="submit" name="answer" value="non">

</form>
<a href="pasindex.php">Retour à la liste des élèves</a><br/>
</body>
</html>
