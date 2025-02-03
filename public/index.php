<?php
session_start();
?>
<html>
    <head>
        <title>Gestion de l'IIA</title>
    </head>
    <body>
    <form action="" method="post" enctype="multipart/form-data">
            <h1>Liste des promotions</h1>
            <?php

            require("../paspublic/connect.php");
            $sql = "SELECT * from Promotions";
            if (!$pdo->query($sql)) echo "Pb d'accès au CARNET";
            else {
                foreach ($pdo->query($sql) as $row)
                    echo "<div class=\"container\"><input name=\"promotion\" type=\"submit\" value=\"".$row['libelle']."\"></div><br/>\n";
            }
                if (isset($_POST['promotion'])){
                    $_SESSION['promotion'] = $_POST['promotion'];
                    header("Location: pasindex.php");
                }
            ?>
        </form>
    <a href="add-promo.php">Rajouter une promotion</a>
    </body>
</html>
