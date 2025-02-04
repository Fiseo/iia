<?php
session_start();
require("../paspublic/connect.php");
if (isset($_SESSION["id"])){
    unset($_SESSION["id"]);
}
if (isset($_POST['promotion'])){
    $_SESSION['promotion'] = $_POST['promotion'];
    header("Location: pasindex.php");
}elseif (isset($_POST['null'])){
    $_SESSION['promotion'] = "null";
    header("Location: pasindex.php");
}elseif (isset($_POST['id'])){
    $_SESSION["id"] = $_POST["id"];
    header("Location: promotionDelete.php");
}
?>
<html>
    <head>
        <title>Gestion de l'IIA</title>
        <link rel="stylesheet" href="deleteButton.css">
    </head>
    <body>
    <form action="" method="post" enctype="multipart/form-data">
            <h1>Liste des promotions</h1>
            <?php
            $promotions = getPromotion();
            foreach ($promotions as $key => $promotion) {
                echo "<input name=\"promotion\" type=\"submit\" value=\"".$promotion[1]."\">
                      <div class = \"button\"><input class=\"visible\" type=\"submit\" value=\"Supprimer\">
                      <input class=\"invisible\" type=\"submit\" name=\"id\" value=\"".$key."\"></div><br>";
            }
            ?>
            <div class = \"button\">
                <input class="visible" name="null" type="submit" value="Futur étudiant"">
            </div><br/>
        </form>
    <a href="add-promo.php">Rajouter une promotion</a><br/>
    <a href="add-student.php">Rajouter un étudiant</a>
    </body>
</html>