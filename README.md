# ![Logo 3WA](assets/picture/3wa-logo.png) Leason of 3W Academy - Security failure

![Bureau Veritas Landing Cover Cybersecurity](assets/picture/bureau_veritas_cybersecurity_landing_cover.jpeg)

[Voir les parties du repository](#parts)
Ensemble des notions de Cyber Sécurité vu et appronfondit au cours d'une formation à la 3W Academy, haute école du digital.
Passant des failles XSS au gros brute force en Kali Linux, le projet de ce repo est le regroupement des dernière méthode de crakage et d'utilisation de failles de sécurité.

*:construction: Ce repository, pour l'instant en français, est actuellement en cours de rédaction et n'est pas du tout terminé.*



# <a id="parts"> SOMMAIRE - Les différentes parties du repository :airplane:

## <a id="attacks_types"> Les différentes types d'attaques

- [:construction: Le brute force (En cours...)](./brute_force) >> Recherche dans un ensemble de combinaisons le mots de passe ou la clefs
- [:construction: Content Security Policy (CSP) Bypass](./csp_bypass/) >> Contourner une protecter contre XSS, changer la description et les fichiers sources à partir desquels le naviagateur peut charger des ressources
- [:construction: Carriage Return Line Feed Injection (CRLFi)](./crlf/) >> L'injection CRLF est une vulnérabilité de codage d'application logicielle qui se produit lorsqu'un attaquant injecte une séquence de caractères CRLF là où elle n'est pas attendue. Lorsque l'injection CRLF est utilisée pour fractionner un en-tête de réponse HTTP, on parle de fractionnement de réponse HTTP.
- [:construction: Cross-Site Request Forgery (Falsification de requêtes intersites)](./csrf/) >>  Cross-Site Request Forgery (CSRF) est une attaque qui oblige un utilisateur final à exécuter des actions indésirables sur une application Web dans laquelle il se trouve actuellement.
- [:construction: Loose Comparaison (Faille d'égalité de comparaison)](./loose_comparaison/) >>  Utilisation de faille lors de comparaison d'informations sensibles
- [:construction: Reverse Shell](./reverseshell/) >> 
- [:construction: SQL Injection Blind (Injection SQL Aveugle)](./sqk_injection_blind/) >> L'injection SQL aveugle survient lorsqu'une application est vulnérable à l'injection SQL, mais que ses réponses HTTP ne contiennent pas les résultats de la requête SQL
- [:construction: SQL Injection Basic](./sql_injection/) >> La faille SQLi, abréviation de SQL Injection, soit injection SQL en français, est un groupe de méthodes d'exploitation de faille de sécurité d'une application interagissant avec une base de données.
- [:triangular_flag_on_post: :construction: Weak Session Ids]() >> 
- [:construction: XSS Basée sur le DOM (DOM Based XSS)](./xss_dom/) >> Une XSS basée sur le DOM a lieu lorsqu'une entrée utilisateur est directement mise dans le code Javascript d'une page
- [:construction: XSS Reflected XSS (ou non persistante)](./xss_reflected/) >> Ce type de faille XSS ne stocke pas le contenu malicieux sur le serveur web. Le contenu est par exemple livré à la victime via une URL qui le contient (envoyée par email ou par un autre moyen).
- [:construction: XSS Stored (Scripting)](./xss_stored/) >> Le script intersite (XSS) est un type de vulnérabilité de sécurité que l'on peut trouver dans certaines applications Web. Les attaques XSS permettent aux attaquants d'injecter des scripts côté client dans les pages Web consultées par d'autres utilisateurs.
- [:construction: Insecure Captcha](./insecure_captcha/) >> Passage de captcha... :construction:

## <a id="softwares-webbapps-env"> Les logiciels, webapps et environnements

- [:construction: Docker](./docker/) >> 
- [:construction: Kali LInux](./kali_linux/) >> 
- [:construction: Ngrok](./ngrok/) >> 
- [:construction: Root Me](./rootme/) >>

## <a id="courses"> Autres cours et connaissances importantes

- [:construction: Les normes de Cyber Sécurité (Cybersecurity Standard)](./cybersecurity_standard/) >> L'importance du respect de ces règles est indéfinisable, bien regarder les normes mondiale et européennes. 
- [:construction: Encryptage des données (Data encryption)](./data_encryption/) >>
- [:construction: Google Cloud Containers](./google/) >>
- [:construction: Google Tag Manager](./google/) >>
- [:construction: Github Security Study](./github/) >> Tous les notions de sécurité des répository, paramètrage et des accès donnés.
- [:construction: Encodage des fichiers (File encoding)](./file_encoding/) >> Tous les notions sur les différents encodage
- [:construction:]() >>
- [:construction:]() >>
- [:construction:]() >>
- [:construction:]() >>





# Ressources
- [Docker](./docker.md)
- [Google Cloud Container for comparison](./google_cloud_container.md)
- [Lesson with DVWA](./cyber_security_failure.md)
- []




## Docker Desktop

Installation de docker Desktop (4.15.0)
- [Windows Install](https://docs.docker.com/desktop/install/windows-install/)
Alors pour Docker Windows, en réalité Docker fonctionne uniquement sur Linux, l'application Docker Windows s'install sur une Virtual Machin Linux. Requière donc Windows Service Linux.
- [Windows Core Linux Package](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi)


Vérification de l'installation de vsl
`-vsl`

Machine virtuel VS Container 

Quand on cré une machine virtuel on défini :
Partition de ram 
Disques
Coeur 

Assez gourmant en ressources sur host machine

Alors qu'avec un container il va avoir son propre systeme de fichier, son propre environnement, mais va consommer les ressources de la machine host.
Par exemple si il a besoin d'un deuxième coeur à un instant T, il le consommera.

Docker va permettre de monter des container, regroupant tout les composants de l'application par exemple, même si sur la machine host aucun environnement n'est installé.

A savoir la Google Cloud fonctione uniquement sur des containers 
- [Voir page de présentation](https://cloud.google.com/containers?hl=fr)

