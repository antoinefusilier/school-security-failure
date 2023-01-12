# Loose comparaison

## Ressources

- [Décrypter un hash MD5 en php](https://www.edureka.co/blog/decrypt-md5-password-php/)
- [md5()(_Doc Php_)](https://www.php.net/manual/fr/function.md5.php)

## Exercice 1

[Voir le fichier pdf](./loose_comparaison.pdf)
[Alpes Exo1 Server](https://alpes.zimple.eu/loose_comparaison/exo1/)
[CodeShare Code source exo](https://codeshare.io/MNVJ3e)
[Les hash magique (GithubRepo)](https://github.com/Cyrhades/Security/tree/main/magichashes)

Avec le code source, on peut récupérer un hash : `0e451993494339105802830400421990`
Il est comparé à la chaine de caractère reçue de l'utilisateur, convertit en md5..

```php
if(md5($_POST['password']) == "0e451993494339105802830400421990") {
        $html = 'Youhou vous êtes administrateur !!!<br />Le flag est : '.$_ENV['FLAG'];
    } else {
        $html = 'Echec de connexion<br /><form method="POST">
            <p><label>Password : <input type="password" name="password"></label></p>
            <input type="submit">
    </form>';
    }
```

On remarque que le hash commence par **0e**, on peut utiliser un magic hash md5, car le script ne comportant pas de strict comparaison, php interprete la chaine comparative comme NULL.

## Exercice 2

[Alpes Exo2 Server](https://alpes.zimple.eu/loose_comparaison/exo2/)
[Cyber Chef](https://gchq.github.io/CyberChef/)

Code source :

```php
<?php
if(sizeof($_POST) > 0) {
    $_PRIVATE_KEY = '2aa7d41e61ff387547c28d629a2d0b3024cbfbeb';
    if(!empty($_POST['login']) && !empty($_POST['password'])) {
        setcookie('user', serialize(['login' => $_POST['login'], 'token' => SHA1($_POST['password'].$_PRIVATE_KEY )]));
        header('location:index.php');
    }
}
if(isset($_COOKIE["user"])) {
    $cookie = unserialize($_COOKIE["user"]);
    if( isset($cookie['login']) && $cookie['login'] == 'admin'
    && isset($cookie['token']) && $cookie['token'] == SHA1(rand(1, 9999999999))) {
        echo 'Vous êtes administrateur';
    } else {
        echo 'Vous êtes un simple utilisateur';
    }
} else {
    echo '<form method="POST"><input name="login"> <input type="password" name="password"> <input type="submit"></form>';
}
```

### Ressources

- [Serialize Php Doc](https://www.php.net/manual/fr/function.serialize.php)

Dans ce script on lie que le mot de passe et le login entré, sont utilisés pour créer une chaine de caractère (serializé), placé dans le cookie **user**.
Ce même cookie, est désérilisé et le login est comparé à la valeur **admin** et le token comparé à une valeur ramdomisée (soit 1e20 possibilitées !!) elle-même hashé en SHA1 (Possibilité infinie !!!!), donc on doit contournée cela...

```php
set cookie('user',
    setcookie(
        'user',
        serialize(
            [
                'login' => $_POST['login'],
                'token' => SHA1($_POST['password'].$_PRIVATE_KEY )
            ]
        )
    );
)

```

Notre $\_PRIVATE_KEY en SHA1 = 3d0601cb7fe5e22b0ec8ec8c5aa75b4ef0ee8229

On va créer un tableau en php

```php
$cookie = [
    "login" => "admin",
    "token" => true
]
```

On sérialize notre tableau

```php
serialize($cookie);
// a:2:{s:5:"login";s:5:"admin";s:5:"token";b:1;}
```

Point sur les random :

[Exemple article](https://www.cloudflare.com/learning/ssl/lava-lamp-encryption/)

## Exercice 3 : [PHP - Loose Comparison](https://www.root-me.org/fr/Challenges/Web-Serveur/PHP-Loose-Comparison?lang=fr)

Code source

```php
<html>
<body>
// Un formulaire qui envoie en POST à index, soit ce même fichier ...
 <form action="index.php" class="authform" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Unbreakable Random</legend>
            // $_POST['s] Pour la graine (seed)
            <input type="text" id="s" name="s" value="" placeholder="seed" />
            // $_POST['h] Pour le hash (Chaine hachée)
            <input type="text" id="h" name="h" value="" placeholder="hash" />
            <input type="submit" name="submit" value="Check" />

        <div class="return-value" style="padding: 10px 0">&nbsp;</div>
        </fieldset>
        </form>
<?php
// Première méthode, qui retourne un chiffre ramdom
function gen_secured_random() { // cause random is the way
    $a = rand(1337,2600)*42;
    $b = rand(1879,1955)*42;
// 
    $a < $b ? $a ^= $b ^= $a ^= $b : $a = $b;

    return $a+$b;
}

// Seconde méthode qui renvoie le retour de la troisième méthode haché en md5
function secured_hash_function($plain) { // cause md5 is the best hash ever
    $secured_plain = sanitize_user_input($plain);
    return md5($secured_plain);
}
// Troisième méthode qui attend un variable contenu
function sanitize_user_input($input) { // cause someone told me to never trust user input
// Expression régulière regex
// https://blog.paumard.org/cours/java-api/chap03-expression-regulieres-syntaxe.html#:~:text=Une%20expression%20r%C3%A9guli%C3%A8re%20est%20une,enrichir%20ce%20qu'il%20repr%C3%A9sente.

    $re = '/[^a-zA-Z0-9]/';
    // $re = Si n'est pas compris de a à z, A à Z, et de 0 à 9, tous sauf les caractère alphanumériques 
    // Méthode preg_replace
    // https://www.php.net/manual/en/function.preg-replace.php
    // 3 paramètre 
    // 1st = pattern : Attends des PCRE Regex Le modèle à rechercher. Il peut s'agir d'une chaîne ou d'un tableau avec des chaînes.
    // https://www.php.net/manual/en/reference.pcre.pattern.modifiers.php
    // 2nd = remplacment : Si occurence la le troisième paramètre avec le patterne, valeur de remplacement
    //  
    $secured_input = preg_replace($re, "", $input);
    return $secured_input;
}

if (isset($_GET['source'])) {
    show_source(__FILE__);
    die();
}


require_once "secret.php";

if (isset($_POST['s']) && isset($_POST['h'])) {
    $s = sanitize_user_input($_POST['s']) // Alpharnumeric string
    $h = secured_hash_function($_POST['h']); // Alphanumeric md5 string

    $r = gen_secured_random(); // A entier random
    if($s != false && $h != false) { // $s et $h pas égale à false
        if($s.$r == $h) {
            // $s.$r : alphanumeric string + random interger doit etre null, on pourrait le faire commencé par "0e"
            // $h = string = null
            print "Well done! Here is your flag: ".$flag;
        }
        else {
            print "Fail...";
        }
    }
    else {
        print "<p>Hum ...</p>";
    }
}
?>
<p><em><a href="index.php?source">source code</a></em></p>
</body>
</html>

```
