# Commande Injection Hacking

Aller à la page de DVWA Command Injection. 

Pour introduire les injonction de commandes, par exemple lorsque je tape une commande quelconque tel que :

```bash
ping 8.8.8.8 & ls
```

La command `cat` liste le contenu d'un fichier
```
& cat /etc/hosts
```

Revenir au dossier sources et lire les fichiers et dossier de ce folder :
```bash
& cd ~ & ls ./
```

## Exercices

- [Exercice Root Me Injection de commande](https://www.root-me.org/fr/Challenges/Web-Serveur/Injection-de-commande)
Dans cet exercice, une commande php résumant l'utilisation du mot de passe stocker sur ce serveur dans un fichier caché.
pour lire le contenu du fichier index.php, nous allons entré l'ajout de la commande `& ls` premièrement pour localisé le fichier, puis nous allons faire un `& cat index.php` afin d'afficher en HTML le code de la page index.php

A vous de trouver alors quel fichier comporte le mot de passe ! Car aucune solution de hacking n'est authorisé sur internet !!


