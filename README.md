# Movie API

## Description

Movie API est une application développé par symfony 5.4 et php 8.2 pour la partie backend, et pour frontend javascript, jquery et on à utilisé moteur de template twig. C'est un application qui fournit un ensemble de services et d’API pour rechercher des films, récupérer le meilleurs film et récupérer le contenu vidéo associé. L’application s’intègre à des bases de données externes pour fournir des informations détaillées sur les films, les genres et le contenu vidéo.

## Features

- **Meilleur service de film** : Récupère le meilleurs film à partir d’une base de données de films préconfigurée.
- **Service de recherche de films** : recherche de films en fonction de nom de film ( avec autocomplete)
- **Genre Service** : Récupère une liste de genres de films et lors de sélection de genre on affiche liste des films ( pour la liste des films on à intégré systéme de pagination et sytéme loading )
- **Service de film détaillé avec vidéo** : Permet d’obtenir du contenu détaillé et vidéo lié à un film spécifique.

## Requirements

- docker
- make


## Installation

### Clone the repository

```bash
git clone https://github.com/abaiedmohamed/testSf.git

cd movie-database-api

make docker-start

docker-compose exec www bash

composer install 

npm install 

exit

make back-clear-cache

make npm-run-watch 

```

### Pour lancer l'application : http://localhost:8741

### Autres commandes

```bash

make back-unit-test # pour lancer les tests unitaires

make docker-stop # pour arrêter les containers

make docker-kill # pour supprimer les containers

make phpstan-quality # pour vérifier la qualité de code 
```

