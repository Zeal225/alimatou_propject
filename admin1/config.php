<?php
/**
 * iTech Empires Tutorial Script : PHP Login Registration system with PDO Connection
 *
 * File: Database Configuration
 */
// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'root'); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'restaurant'); // Database Database name

function DB()
{
    try {
        return new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}

/*function Login()
{
    $query = DB()->query('select * from user where');
    return $query->fetchAll();
}*/

function isEmail($email)
{
    try {
        $db = DB();
        $query = $db->prepare("SELECT id FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function createdUser($first_name, $last_name, $email, $password)
{
    try {
        $db = DB();
        $query = $db->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES (:first_name,:last_name,:email,:password)");
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $enc_password = hash('sha256', $password);
        $query->bindParam("password", $enc_password, PDO::PARAM_STR);
        $query->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function login($email, $password)
{
    try {
        $db = DB();
        $query = $db->prepare("SELECT id FROM users WHERE (email=:email) AND password=:password");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $enc_password = hash('sha256', $password);
        $query->bindParam("password", $enc_password, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->id;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

//GESTION DES PRODUITS
function createProduits($name, $description, $images, $prix)
{
    try {
        $db = DB();
        $query = $db->prepare("INSERT INTO products(name, description, images, prix) VALUES (:name,:description,:images,:prix)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("images", $images, PDO::PARAM_STR);
        $query->bindParam("prix", $prix, PDO::PARAM_STR);
        $query->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function getProducts()
{
    try {
        $db = DB();
        $query = $db->prepare("SELECT * FROM products ORDER BY id desc");
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}


function findProduit($id)
{
    $db = DB();
    $sql = "SELECT * FROM products where id =?";
    $q = $db->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function updateProduit($name, $prix, $images, $description, $id)
{
    $db = DB();
    try {
        $sql = "UPDATE products SET name = ?,prix = ?,images = ?, description = ? WHERE id = ?";
        $q = $db->prepare($sql);
        $q->execute(array($name,$prix, $images, $description, $id));
        header("Location: produits.php");
    }catch (Exception $exception){
        var_dump($exception->getMessage());
        die();
    }

}

function deleteProduit($id)
{
    $db = DB();
    $sql = "DELETE FROM products WHERE id = ?";
    $q = $db->prepare($sql);
    $q->execute(array($id));
    header("Location: produits.php");
}


//GESTION DES COMMANDES
/**
 * @param $date_cmd
 * @param $montant
 * @param $lieu_livraison
 * @param $status_livraison
 * @param $status_paiement
 * @param $date_livraison
 * @param $heure_livraison
 * @param $id_client
 * @param $designation
 * @return string
 */
function createCommande($date_cmd, $montant, $lieu_livraison, $status_livraison, $status_paiement, $date_livraison, $heure_livraison, $id_client, $designation)
{
    try {
        $db = DB();
        //$query = $db->prepare("INSERT INTO commande(date_cmd, montant, lieu_livraison, status_livraison, status_paiement, date_livraison, heure_livraison) VALUES (:date_cmd,:montant,:lieu_livraison,:status_livraison, status_paiement, date_livraison, heure_livraison)");
        $query = $db->prepare("INSERT INTO commandes(date_cmd, montant, lieu_livraison, status_livraison, status_paiement, date_livraison, heure_livraison, id_client, libelle) VALUES (:date_cmd, :montant, :lieu_livraison, :status_livraison, :status_paiement, :date_livraison, :heure_livraison, :id_client, :libelle)");
        $query->bindParam("date_cmd", $date_cmd, PDO::PARAM_STR);
        $query->bindParam("montant", $montant, PDO::PARAM_STR);
        $query->bindParam("lieu_livraison", $lieu_livraison, PDO::PARAM_STR);
        $query->bindParam("status_livraison", $status_livraison, PDO::PARAM_STR);
        $query->bindParam("status_paiement", $status_paiement, PDO::PARAM_STR);
        $query->bindParam("date_livraison", $date_livraison, PDO::PARAM_STR);
        $query->bindParam("heure_livraison", $heure_livraison, PDO::PARAM_STR);
        $query->bindParam("id_client", $id_client, PDO::PARAM_INT);
        $query->bindParam("libelle", $designation, PDO::PARAM_STR);
        /*$query->bindParam("montant", $montant, PDO::PARAM_STR);
        $query->bindParam("lieu_livraison", $lieu_livraison, PDO::PARAM_STR);
        $query->bindParam("status_livraison", $status_livraison, PDO::PARAM_STR);
        $query->bindParam("status_paiement", $status_paiement, PDO::PARAM_STR);
        $query->bindParam("date_livraison", $date_livraison, PDO::PARAM_STR);
        $query->bindParam("heure_livraison", $heure_livraison, PDO::PARAM_STR);*/
        //$query->bindParam("id_client", $id_client, PDO::PARAM_INT);
        $query->execute();
        return $db->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getAllCommande(){
    try {
        $db = DB();
        $query = $db->prepare("SELECT * FROM commandes ORDER BY id_cmd desc");
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

function countCommande()
{

    try {
        $db = DB();
        $query = $db->prepare("SELECT COUNT(*) FROM commandes");
        $query->execute();
        return $query->fetchColumn();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}


function countProduits()
{

    try {
        $db = DB();
        $query = $db->prepare("SELECT COUNT(*) FROM products");
        $query->execute();
        return $query->fetchColumn();
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

