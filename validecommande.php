<?php
ob_start();
include 'admin1/config.php'
?>
<?php
session_start();
$ids = array_keys($_SESSION['panier']);
if (empty($ids)){
    header("Location: index.php");
    exit();
}
?>
<?php
if (!empty($_POST["valide-commande"])){
    $now = new DateTime();
    $status_livraison = 'N';
    $status_paiement = 'N';
    $date_cmd = $now->format('Y-m-d H:i:s');
    $ref_commande = 'CMD-' . (string)date("YmdHis");

    if ($_POST['lieu_livraison'] == "") {
        $register_error_message = 'Le nom est obligatoire';
    } else if ($_POST['date_livraison'] == "") {
        $register_error_message = 'Le email est obligatoire';
    } else if ($_POST['heure_livraison'] == "") {
        $register_error_message = 'Le prenom est obligatoire';
    } else {
        try {

            //createCommande($date_cmd, $_POST["montant"], $_POST["lieu_livraison"], $status_livraison, $status_paiement, $_POST["date_livraison"], $_POST["heure_livraison"]);
            session_start();
            $designation = $_SESSION["designation"];

            $id = createCommande($date_cmd, $_POST["montant"], $_POST["lieu_livraison"], $status_livraison, $status_paiement, $_POST["date_livraison"], $_POST["heure_livraison"], $_SESSION["auth_id"], $designation, $ref_commande);



            session_start();
            $_SESSION["ref_commande"] = $id;
            $_SESSION["montant_total"] = $_POST["montant"];
            $_SESSION["id_trans"] = $ref_commande;
            header("Location: resume.php");
        }catch (Exception $exception){
            var_dump($exception->getCode());
        }

        //$_SESSION['user_id'] = $user_id;
    }
    //header("Location: checkout.php");
}

?>