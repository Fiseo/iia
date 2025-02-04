<?php
define('USER', "root");
define('PASSWD', "");
define('SERVER', "localhost");
define('BASE', "iia");

// pour oracle: $dsn="oci:dbname=//serveur:1521/base
// pour sqlite: $dsn="sqlite:/tmp/base.sqlite"
$dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
try {
    $pdo = new PDO($dsn, USER, PASSWD);
} catch (PDOException $e) {
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
}

function getPromotion(){

    global $pdo;
    $listPromo = [];
    $sql = "SELECT * from Promotions";
    if (!$pdo->query($sql)) echo "Pb d'accès au PROMOTIONS";
    else {
        foreach ($pdo->query($sql) as $row)
            $listPromo[] = $row;
    }
    return $listPromo; // $listPromo[0] donne l'id et [1] le libelle
}

function getStudentsByPromotion($promotion){
    global $pdo;
    $sql = $pdo->prepare("SELECT T2.Nom,T2.Prenom 
            FROM Promotions AS T1 
            JOIN Etudiant AS T2 ON T1.Identifiant = T2.IdentifiantPromotions
            Where T1.libelle = :libelle
            ORDER BY T1.Identifiant");
    $sql->bindParam(":libelle", $promotion);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function addPromotion($libelle){
    global $pdo;
    $sql = $pdo ->prepare("INSERT INTO Promotions(libelle) VALUES (:libelle)");
    $sql->bindParam(":libelle", $libelle);
    $sql->execute();
}

function addEtudiant($nom, $prenom, $promo = null){
    global $pdo;
    if (isset($promo)){
        $sql = $pdo ->prepare("INSERT INTO Etudiant(Nom,Prenom,IdentifiantPromotions) VALUES (:nom, :prenom, :promo);");
    }else{
        $sql = $pdo ->prepare("INSERT INTO Etudiant(Nom,Prenom) VALUES (:nom, :prenom);");
    }

    if ($nom != "" && $prenom != "") {
        if (isset($promo)){
            $promotions = getPromotion();
            foreach ($promotions as $promotion){
                if ($promotion[1] == $promo) {
                    $id = $promotion[0];
                    break;
                }
            }
        }

        $sql->bindParam(":nom", $nom);
        $sql->bindParam(":prenom", $prenom);
        if (isset($promo)){
            $sql->bindParam(":promo", $id);
        }

        $sql->execute();
    }else{
        echo "Veuillez remplir les champs";
    }
}
/*
 */