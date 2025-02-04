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
    if (isset($_SESSION["promotion"])){
        require("../paspublic/connect.php");
        foreach ($result = getStudentsByPromotion($_SESSION["promotion"]) as $row) {
            echo "<p>".$row["Nom"]." ".$row["Prenom"]."</p>";
        }
    }
    ?>

</body>
</html>