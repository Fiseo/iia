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
    $sql = "SELECT T2.Nom,T2.Prenom 
            FROM Promotions AS T1 Where T1.libelle = ".$_SESSION["promotion"]."
            JOIN Etudiant AS T2 ON T1.Identifiant = T2.IdentifiantPromotions
            ORDER BY T1.Identifiant";
    if (!$connexion->query($sql)) echo "Pb d'accès au CARNET";
    else {
        foreach ($connexion->query($sql) as $row)
            echo $row['Nom']." ".$row['Prenom']."<br>";
    }
    ?>

</body>
</html>

