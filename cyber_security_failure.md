# Cyber X Security

## Ressources

- [Lien du package DVWA Image Docker](https://hub.docker.com/r/vulnerables/web-dvwa)
- []()
- []()
- []()
- []()


## Install on Docker

```bash
docker pull cyberxsecurity/dvwa
```

Démarrage d'un docker dvwa 
Name : dvwa1
Port : 81

```bash
docker container run -d --name=dvwa1 -p 81:80 cyberxsecurity/dvwa
```

Aller dans le docker > View details > Terminal
Pour voir les différents utilisateurs, et leurs mots de passe

Connection à la base MySQL [dvwa]
```bash
mysql -u root
```
Ouverture de la session : `MariaDB [dvwa] > `

Voir les utilisateurs et leurs mots de passe

```bash
SELECT User, Host, Password, password_expired FROM mysql.user;
```
![MariaDB DVWA Show Users Password](assets/mariadb_show_user_password.png)

Ici on peut lire un mot de passe encrypté : `*99DE6805356A04FDF37D7361BCF994E8B5DC75FF`

## Trouver et décrypter le mot de passe

### Ressources
Chez IBM 
- [IBN Codage et chiffrement des mots de passe](https://www.ibm.com/docs/fr/was/9.0.5?topic=files-password-encoding-encryption)
- [IBN Conseil de résolution des incidents liés au décodage du mot de passe de sécurité](https://www.ibm.com/docs/fr/was/9.0.5?topic=configurations-password-decoding-troubleshooting-tips-security)


Chez Google

Le mode d'encryption/decryption de Google Cloud KMS, Cloud KMS est une API REST qui peut utiliser une clé pour chiffrer, déchiffrer ou signer des données, comme des secrets, à des fins de stockage.
- [Présentation du système Security Key Managment](https://cloud.google.com/security-key-management?hl=fr#:~:text=Cloud%20KMS%20est%20une%20API,%C3%A0%20des%20fins%20de%20stockage.)
- [Page général de la documentation de Google KMS(KeyManagmentSecurity)](https://cloud.google.com/kms/docs/apis?hl=fr)
- [Créer un clé de signature Cloud KMS](https://cloud.google.com/kms/docs/reference/pkcs11-apache?hl=fr#creating_a-hosted_signing_key)
## X-XSS Failures - Fishing

Utilies :

- [URL Encode/Decode](https://www.url-encode-decode.com/)

Formulaire test login d'integration lors d'une faille XSS trouvée

Attention à remplacer l'url avec l'encodage via Url Encode/Decode

```html

<!-- Suppression de tout les autres éléments html -->
<style>* {overflow: hidden;}</style>

<!-- Ajout de nos nouveaux element html -->

<div>
    <form>
        <p>Login : <input type="text" name="login"></p>
        <p>Password: <input type="text" name="password"></p>
        <button type="submit" >Se connecter</button>
    </form>
</div>


```