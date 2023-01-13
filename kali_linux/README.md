# Kali Linux


## Ressources

- [11 Outils de brute force attacks](https://geekflare.com/fr/brute-force-attack-tools/)
- [](https://www.leblogduhacker.fr/installer-kali-linux-sous-windows-en-10min-wsl/)


## <a id="install"> Installation
1. Installer Kali via Docker
- docker pull kalilinux/kali-rolling
2. Lancer le container
3. Accéder au terminal du container Kali
4. Taper les commandes suivantes :
4.a apt update && apt -y install wget
4.b apt update && apt -y install hashcat
4.c wget https://github.com/brannondorsey/naive-hashcat/releases/download/data/rockyou.txt
// Les deux premières commandes vont installer les paquets : wget et hashcat
// La 3° va récupérer le dictionnaire
Vous pouvez utiliser hashcat

Installer hashcat !!

