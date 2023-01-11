# File Upload 

Les failles à exploitée lors d'un téléchargment d'un fichier d'un client vers un serveur sont multiple et complexe. 
Cette catégorie de faille, à pour principe d'envoyer un fichier vérolé (qui contient un code différent à celui souhaité et presque tout le temps malveillant). Cela permet d'executer du code dans le serveur hébergent le fichier envoyée. 
Les failles exploitée sont celle de contrôle de l'import, et voir même celle de blockage interne d'execution. 

Lors de l'import, le site ou l'application va réduire premièrement le risque par définir un/plusieurs type(s) de fichier que le client peut envoyer. 
[**Voir type security**](./type_security.md)

Il peut aussi aussi demander une taille maximal
[**Voir size security**](./size_security.md)