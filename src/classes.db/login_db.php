<?php

include 'src/classes.db/db_connect.php';

function doLogin(){
    $params[':table'] = "login";

    $user = $_POST['user'];
    $pw = $_POST['pw'];
    $tipo = $_POST['typeL'];

    $sql = 'SELECT tipo, id FROM :table 
            WHERE user = "'.$user.'" AND userpw = "'.$pw.'" AND tipo = "'.$tipo.'"';


    return db_query($sql, 'select', $params)[0];
}