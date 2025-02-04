<?php
session_start();
require("../paspublic/connect.php");
$result = getPromotion();
$result = $result[$_SESSION["id"]];
$libelle = $result["libelle"];
$id = $result["Identifiant"];

if (isset($_POST["answer"])){
    if ($_POST["answer"] == "oui"){
        deletePromotion($id);
        unset($_SESSION["id"]);
        header("Location:index.php");
    }else{
        unset($_SESSION["id"]);
        header("location:index.php");
    }
}
?>

<html>
<head>
    <title>Gestion de l'IIA</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Voulez vous vraiment supprimez la promotion <?php echo $libelle ?></h1>
    <input type="submit" name="answer" value="oui">
    <input type="submit" name="answer" value="non">

</form>
<a href="pasindex.php">Retour à la liste des élèves</a><br/>
</body>
</html>
