<?php
    include_once 'lib/Utils.php';
    include_once 'lib/ApiDatabaseManager.php';

    $vValidKey = ['harambart', 'key'];

    $database = new DatabaseManager('unity');
    $token = generateToken();

    $expiration = date('y-m-d H:i:s', strtotime("+1 day"));

    if(isset($_GET['apikey']) && in_array($_GET['apikey'], $vValidKey)){
        //Save into database
        $query = "SELECT * FROM unity.token WHERE apikey='" . $_GET['apikey'] . "' AND expiration > NOW();";
        $vToken = $database->FetchDatabase($query);
        if(empty($vToken)){
            $query = "INSERT INTO unity.token VALUES (NULL, '". $token. "', '" . $expiration . "','". $_GET['apikey'] . "');";
            $database->FetchDatabase($query);
        } else {
            $token = $vToken[0]['value'];
        }
        print $token;
        die;
    }
    print 'Failure :(';
    die;
?>