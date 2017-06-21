<?php

include_once 'lib/Utils.php';
include_once 'lib/ApiDatabaseManager.php';

$database = new DatabaseManager('unity');

if(isset($_GET['token'], $_GET['user'], $_GET['password'])){
        //Save into database
        $query = "SELECT * FROM unity.token WHERE value = '".$_GET['token']."' AND expiration > NOW(); ";
        $vToken = $database->FetchDatabase($query);       
        if(!empty($vToken)){
            $query = "SELECT user.username, user.password FROM unity.user WHERE username='".$_GET['user']."'AND password='".$_GET['password']."' ";
            
            $vUser = $database->FetchDatabase($query);          
            if(!empty($vUser)){
                echo "Connected";            
            } else{
                echo "NOT CONNECTED M8";
            }                 
        die;
    }
}
