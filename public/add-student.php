<?php
require("../paspublic/connect.php");
?>
<html>
<head>
    <title>Gestion de l'IIA</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Ajout d'un étudiant</h1>
    <div>
        <label for="nom">Nom :</label>
        <input id="nom" name="nom" type="text"/>
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input id="prenom" name="prenom" type="text"/>
    </div>
    <?php
    $promotions = getPromotion();
    foreach ($promotions as $promotion) {
        echo "<input id=\"".$promotion[0]."\"type=\"radio\" name=\"promo\" value=\"".$promotion[1]."\"/><label for=\"".$promotion[0]."\">".$promotion[1]."</label>";

    }
    ?>
    <div>
        <input type="submit" value="Envoyer le formulaire">
    </div>
</form>
<a href="index.php">Retour au choix de promotion</a><br/>
<a href="add-promo.php">Rajouter une promotion</a>
</body>
</html>

<?php
if (isset($_POST['promo'])){
    $sql = $pdo ->prepare("INSERT INTO Etudiant(Nom,Prenom,IdentifiantPromotions) VALUES (:nom, :prenom, :promo);");
}else{
    $sql = $pdo ->prepare("INSERT INTO Etudiant(Nom,Prenom) VALUES (:nom, :prenom);");
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && $_POST['nom'] != "" && $_POST['prenom'] != "") {
    if (isset($_POST['promo'])){
        foreach ($promotions as $promotion){
            if ($promotion[1] == $_POST['promo']) {
                $id = $promotion[0];
                break;
            }
        }
    }

    $sql->bindParam(":nom", $_POST['nom']);
    $sql->bindParam(":prenom", $_POST['prenom']);
    if (isset($_POST['promo'])){
        $sql->bindParam(":promo", $id);
    }

    $sql->execute();
    header("Location: index.php");

} else {
    echo "veuillez remplir tous les champs";
}
?>
