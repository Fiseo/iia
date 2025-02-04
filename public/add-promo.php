<html>
<head>
    <title>Gestion de l'IIA</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Ajout d'une promotions</h1>
    <div>
        <label for="name">Nom :</label>
        <input id="name" name="promotion" type="text"/>
    </div>
    <div>
        <input type="submit" value="Valider">
    </div>
</form>
<a href="index.php">Retour au choix de promotion</a>
</body>
</html>

<?php
require("../paspublic/connect.php");
$sql = $pdo ->prepare("INSERT INTO Promotions(libelle) VALUES (:libelle)");
if (isset($_POST['promotion'])){
$sql->bindParam(":libelle", $_POST['promotion']);
$sql->execute();
header('location:index.php');
}
?>