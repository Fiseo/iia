<?php
session_start();
require("../paspublic/connect.php");
?>
<html>
    <head>
        <title>Gestion de l'IIA</title>
    </head>
    <body>
    <form action="" method="post" enctype="multipart/form-data">
            <h1>Liste des promotions</h1>
            <?php
            $promotions = getPromotion();
            foreach ($promotions as $promotion) {
                echo "<input name=\"promotion\" type=\"submit\" value=\"".$promotion[1]."\"><br/>\n";
            }
            ?>
        </form>
    <a href="add-promo.php">Rajouter une promotion</a><br/>
    <a href="add-student.php">Rajouter un étudiant</a>
    </body>
</html>
<?php
if (isset($_POST['promotion'])){
    $_SESSION['promotion'] = $_POST['promotion'];
    header("Location: pasindex.php");
}
?>