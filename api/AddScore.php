<?php

include_once 'lib/Utils.php';
include_once 'lib/ApiDatabaseManager.php';

$database = new DatabaseManager('unity');
$token = generateToken();

$score = (int)$_GET['score'];
$user = $_GET['user'];

if(isset($_GET['token'])){
        //Save into database
        $query = "SELECT token.id FROM unity.token WHERE value = '".$_GET['token']."' AND expiration > NOW(); ";
        $vToken = $database->FetchDatabase($query);
        if(!empty($vToken)){           
            $query= "UPDATE unity.user SET score=$score WHERE username='$user'";
            if(!$query){
                "INSERT INTO unity.user VALUES score=$score WHERE username='$user'";
            }
            $vUser = $database->FetchDatabase($query);          
            foreach ($vUser as $user){
                print $user['username'].'-'.$user['score'].' ';
            } 
        }
} else {
        print_r("ERROR");
}


//$vToken = $database->FetchDatabase($query);

// Devoir 2 - API, leaderboard.
//	- Créer un point d'accès PHP utilisant le jeton(token) d'accès comme authentification.
//	- La page (endpoint) devras s'appeler leaderboard.php.
//	- Le jeton d'accès seras fourni via le paramètre GET.
//	- Dans le scénario ou le jeton est valide(et non expirée), une liste d'utilisateurs (table user) et leur score relié seras affiché à l'écran.
//	- Le visuel n'est pas compté (Une simple liste sans style est nécessaire).
//	- Aucun service manipulant le score des utilisateurs de type "SET" est imposé.
?>