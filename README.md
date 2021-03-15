Ce site, développé avec les frameworks Symfony et Vue.js, explore la programmation et les outils de datavisualisations. L'interface backend dispose notamment d'un éditeur Highcharts dynamique.

Avancées du projet -> https://github.com/JEND-CODES/Details-Projet-5

Url de présentation du projet -> http://dataviz.planetcode.fr

## CLI COMMANDS

- Création BDD : "php bin/console doctrine:database:create"

- Créer un Controller -> "php bin/console make:controller"

- Créer une nouvelle Entity : "php bin/console make:entity"

- Faire une migration -> "php bin/console make:migration"
Ensuite -> "php bin/console doctrine:migrations:migrate"

- Mettre à jour une Entité -> "php bin/console make:entity --regenerate App" (getters/setters sont générés)
Ensuite : "php bin/console doctrine:schema:update --dump-sql" et "php bin/console doctrine:schema:update --force"

- Vérifier si les Entités sont conformes : "php bin/console doctrine:schema:validate"

- Clear the cache ! "php bin/console cache:clear"

- Lancer le live, exemple : php -S localhost:8000 -t public

- Générer des Fixtures entrer : "php bin/console doctrine:fixtures:load"
