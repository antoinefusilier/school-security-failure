# ![Logo 3WA](assets/picture/3wa-logo.png) Leason of 3W Academy - Security failure

![Bureau Veritas Landing Cover Cybersecurity](assets/picture/bureau_veritas_cybersecurity_landing_cover.jpeg)
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

