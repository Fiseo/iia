<?php
session_start();
if (!isset($_SESSION["promotion"])){
    header("Location: index.php");
}elseif ($_SESSION["promotion"] == "null"){
    $libelle = "Futurs étudiants";
}else{
    $libelle = "élèves de ".$_SESSION["promotion"];
}
?>
<html>
<head>
    <title>Gestion de l'IIA</title>
    <link rel="stylesheet" href="deleteButton.css">
</head>
<body>
    <h1>Liste des <?php echo $libelle; ?></h1>
    <form action="studentDelete.php" method="post" enctype="multipart/form-data">
        <?php
        if (isset($_SESSION["promotion"])){
            if ($_SESSION["promotion"] == "null"){
                $_SESSION["promotion"] = null;
            }
            require("../paspublic/connect.php");
            foreach ($result = getStudentsByPromotion($_SESSION["promotion"]) as $key => $row) {
                echo    "<p>".$row["Nom"]." ".$row["Prenom"]."</p>
                        <div class = \"button\"><input class=\"visible\" type=\"submit\" value=\"Supprimer\">
                        <input class=\"invisible\" type=\"submit\" name=\"id\" value=\"".$key."\"></div><br>";
            }
        }
        ?>
    </form>
    <a href="index.php">Retour au choix de promotion</a>
</body>
</html>