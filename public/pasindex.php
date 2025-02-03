<?php
session_start();
?>
<html>
<head>
    <title>Gestion de l'IIA</title>
</head>
<body>
    <h1>Liste des élèves de <?php echo $_SESSION["promotion"]; ?></h1>
    <?php

    require("../paspublic/connect.php");
    $sql = $pdo->prepare("SELECT T2.Nom,T2.Prenom 
            FROM Promotions AS T1 
            JOIN Etudiant AS T2 ON T1.Identifiant = T2.IdentifiantPromotions
            Where T1.libelle = :libelle
            ORDER BY T1.Identifiant");
    $sql->bindParam(":libelle", $_SESSION["promotion"]);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<p>".$row["Nom"]." ".$row["Prenom"]."</p>";
    }
    ?>

</body>
</html>