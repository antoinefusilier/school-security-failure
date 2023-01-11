# Google CLoud Containers 

Chez Google tous leur architecture est basé sur des container. Cette logique de container remplaçant les virtuals machines, est très pratique et interressant pour différentes raisons, de sécurité, optimisation et backup.

La définition de la différence entre containers et virtuals machine simple et claire par Google : 

```txt
Conteneurs et VM
Vous connaissez peut-être le principe des VM : un système d'exploitation invité tel que Linux ou Windows est exécuté sur un système d'exploitation hôte ayant accès au matériel sous-jacent. Les conteneurs sont souvent comparés aux machines virtuelles (VM). À l'instar de ces dernières, ils vous permettent de regrouper votre application, des bibliothèques et d'autres dépendances en un seul package afin d'obtenir un environnement isolé pour l'exécution de vos services logiciels. La ressemblance s'arrête toutefois ici, car les conteneurs prennent la forme d'unités bien plus légères et offrent de nombreux avantages aux développeurs et aux équipes informatiques.

Les conteneurs sont beaucoup plus légers que les VM.
Les conteneurs virtualisent au niveau de l'OS alors que les VM virtualisent au niveau du matériel.
Les conteneurs partagent le noyau OS et utilisent bien moins de mémoire que les VM.
```
``` tkt
Comment sont utilisés les conteneurs ?
Les conteneurs proposent un mécanisme de regroupement logique qui permet d'extraire des applications de l'environnement dans lequel elles s'exécutent réellement. Grâce à cette dissociation, les applications basées sur des conteneurs peuvent facilement être déployées dans n'importe quel environnement, qu'il s'agisse d'un centre de données privé, du cloud public ou encore de l'ordinateur personnel d'un développeur.
Développement agile
Les conteneurs permettent à vos développeurs de travailler beaucoup plus rapidement, car ils n'ont pas à se soucier des dépendances et des environnements.

Opérations efficaces
Les conteneurs sont légers et vous permettent de n'utiliser que les ressources de calcul strictement nécessaires, ce qui optimise l'exécution de vos applications.

Une très grande compatibilité
Les conteneurs peuvent s'exécuter pratiquement n'importe où. Vous pouvez donc les utiliser quel que soit l'environnement de votre logiciel.
```
[Ressource](https://cloud.google.com/learn/what-are-containers?hl=fr)


