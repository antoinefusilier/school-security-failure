# [PHP - Serialization](https://www.root-me.org/fr/Challenges/Web-Serveur/PHP-Serialisation)

## Parts
- [Aller au code source](#code_source)
- [Aller à l'édute du code source](#code_source_study)




# <a id="definitions" > Définitions

- [**Fichier .inc :**](https://christianelagace.com/php/php-securiser-les-fichiers-inc/) Un fichier .inc contient le même genre de code qu'un fichier .php. Cependant, par convention, on utilise l'extension .inc pour indiquer qu'il ne s'agit pas d'une page Web mais plutôt d'un fichier non autonome, qui sera INClus dans un autre. On pourrait par exemple avoir un fichier .inc qui contient l'information à placer au début de chaque page Web du site, un autre fichier .inc qui contient les information à placer à la fin de chacune des pages, etc.

Normalement, un fichier .inc devrait par défaut jouir des mêmes protections qu'un fichier .php. Les configurations du serveur peuvent cependant offrir des protections différentes.



# <a id="code_source_study"> Code source study

Ce qui nous interresse dans ce code est l'authentification et la méthode de vérification par sérialisation du password. 
On peut remarque l'utilisation du fichier **./passwd.inc.php**
Les conditions : 
- Si la valeur de $_SESSION['login'] n'est pas défini
- - Si le formulaire est transmit, un tableau $data[]
- - $data = [
    "login" : $_POST['login'],
    "password" : hash('sha256', $_POST['password'])
]
- - Si le formulaire n'est pas transmit, mais que le cookie **autologin** est défini, on désérialiser $_COOKIE['autologin'] et on défini $data en fonction.
*ICI Faille car on peut enregistré et modifier les cookies :)*

- Si la valeur de $_SESSION est définie et est strictement === "superadmin" 

*Deuxième faille qui fait suite à la première : dans la comparaison du mot de passe, $data, qui peut être modifier dans les cookie on le rappel, demande seulement une égalité en valeur ! **FAILLE DE COMPAISON Non strict !** *

*On se rappel que `TRUE` + une chaine (string) = `true`, et qu'un hash sha256 commençant par `0e` vaut `NULL` :) ;)

Mais la condition qui nous renvoie vers la page admin est :
```php
if($_SESSION['login'] === "superadmin")
```
Donc on doit affecter "superadmin" à $_SESSION['login'] une fois la vérification de cookie, en gros le login est "superadmin"


```php
$_SESSION['login'] = $data['login'];
```


```php
<?php
define('INCLUDEOK', true);
session_start();

if(isset($_GET['showsource'])){
    show_source(__FILE__);
    die;
}

/******** AUTHENTICATION *******/
// login / passwords in a PHP array (sha256 for passwords) !
require_once('./passwd.inc.php');


if(!isset($_SESSION['login']) || !$_SESSION['login']) {
    $_SESSION['login'] = "";
    // form posted ?
    if($_POST['login'] && $_POST['password']){
        $data['login'] = $_POST['login'];
        $data['password'] = hash('sha256', $_POST['password']);
    }
    // autologin cookie ?
    else if($_COOKIE['autologin']){
        $data = unserialize($_COOKIE['autologin']);
        $autologin = "autologin";
    }

    // check password !
    if ($data['password'] == $auth[ $data['login'] ] ) {
        $_SESSION['login'] = $data['login'];

        // set cookie for autologin if requested
        if($_POST['autologin'] === "1"){
            setcookie('autologin', serialize($data));
        }
    }
    else {
        // error message
        $message = "Error : $autologin authentication failed !";
    }
}
/*********************************/
?>



<html>
<head>
<style>
label {
    display: inline-block;
    width:150px;
    text-align:right;
}
input[type='password'], input[type='text'] {
    width: 120px;
}
</style>
</head>
<body>
<h1>Restricted Access</h1>

<?php

// message ?
if(!empty($message))
    echo "<p><em>$message</em></p>";

// admin ?
if($_SESSION['login'] === "superadmin"){
    require_once('admin.inc.php');
}
// user ?
elseif (isset($_SESSION['login']) && $_SESSION['login'] !== ""){
    require_once('user.inc.php');
}
// not authenticated ? 
else {
?>
<p>Demo mode with guest / guest !</p>

<p><strong>superadmin says :</strong> New authentication mechanism without any database. <a href="index.php?showsource">Our source code is available here.</a></p>

<form name="authentification" action="index.php" method="post">
<fieldset style="width:400px;">
<p>
    <label>Login :</label>
    <input type="text" name="login" value="" />
</p>
<p>
    <label>Password :</label>
    <input type="password" name="password" value="" />
</p>
<p>
    <label>Autologin next time :</label>
    <input type="checkbox" name="autologin" value="1" />
</p>
<p style="text-align:center;">
    <input type="submit" value="Authenticate" />
</p>
</fieldset>
</form>
<?php
}

if(isset($_SESSION['login']) && $_SESSION['login'] !== ""){
    echo "<p><a href='disconnect.php'>Disconnect</a></p>";
}
?>
</body>
</html>

```




# <a id="code_source"> Code source :

```php
<?php
define('INCLUDEOK', true);
session_start();

if(isset($_GET['showsource'])){
    show_source(__FILE__);
    die;
}

/******** AUTHENTICATION *******/
// login / passwords in a PHP array (sha256 for passwords) !
require_once('./passwd.inc.php');


if(!isset($_SESSION['login']) || !$_SESSION['login']) {
    $_SESSION['login'] = "";
    // form posted ?
    if($_POST['login'] && $_POST['password']){
        $data['login'] = $_POST['login'];
        $data['password'] = hash('sha256', $_POST['password']);
    }
    // autologin cookie ?
    else if($_COOKIE['autologin']){
        $data = unserialize($_COOKIE['autologin']);
        $autologin = "autologin";
    }

    // check password !
    if ($data['password'] == $auth[ $data['login'] ] ) {
        $_SESSION['login'] = $data['login'];

        // set cookie for autologin if requested
        if($_POST['autologin'] === "1"){
            setcookie('autologin', serialize($data));
        }
    }
    else {
        // error message
        $message = "Error : $autologin authentication failed !";
    }
}
/*********************************/
?>



<html>
<head>
<style>
label {
    display: inline-block;
    width:150px;
    text-align:right;
}
input[type='password'], input[type='text'] {
    width: 120px;
}
</style>
</head>
<body>
<h1>Restricted Access</h1>

<?php

// message ?
if(!empty($message))
    echo "<p><em>$message</em></p>";

// admin ?
if($_SESSION['login'] === "superadmin"){
    require_once('admin.inc.php');
}
// user ?
elseif (isset($_SESSION['login']) && $_SESSION['login'] !== ""){
    require_once('user.inc.php');
}
// not authenticated ? 
else {
?>
<p>Demo mode with guest / guest !</p>

<p><strong>superadmin says :</strong> New authentication mechanism without any database. <a href="index.php?showsource">Our source code is available here.</a></p>

<form name="authentification" action="index.php" method="post">
<fieldset style="width:400px;">
<p>
    <label>Login :</label>
    <input type="text" name="login" value="" />
</p>
<p>
    <label>Password :</label>
    <input type="password" name="password" value="" />
</p>
<p>
    <label>Autologin next time :</label>
    <input type="checkbox" name="autologin" value="1" />
</p>
<p style="text-align:center;">
    <input type="submit" value="Authenticate" />
</p>
</fieldset>
</form>
<?php
}

if(isset($_SESSION['login']) && $_SESSION['login'] !== ""){
    echo "<p><a href='disconnect.php'>Disconnect</a></p>";
}
?>
</body>
</html>

```