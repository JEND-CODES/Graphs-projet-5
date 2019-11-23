Ce site, développé avec les frameworks Symfony et Vue.js, explore la programmation et les outils de datavisualisations. L'interface backend dispose notamment d'un éditeur Highcharts dynamique.

# Avancées projet 5

# Symfony

-> Namespace, annotations, routes

-> Controller, Entité, FormType, Repositories

-> Système CRUD (via Doctrine)

-> Création et validation de formulaires

-> Relations entre Entités (Many to One)

-> Pagination avec le Bundle KNP Paginator

-> Méthode Delete intégrée à la pagination

-> Templates TWIG (Boucles, rendus conditionnels, attributs, variables globales..)

-> Cryptage de mot de passe utilisateur (security.yaml)

-> Pages sécurisées, protégées par mot de passe

-> Intégration de l'éditeur TinyMce


# SQL

-> Mise à jour de la base de données avec Composer (Migrations, clés étrangères) 

-> Requêtes pour l'affichage des statistiques du site en Back Office (Jointures entre tables et calculs, encodage JSON)

-> Requête pour les recherches d'articles sur le site (par mots-clés)


# Javascript & jQuery

-> Programmation de datavisualisations

-> Pagination des commentaires sur chaque article

-> Animations (divers)

-> Initialisation et options de l'éditeur TinyMce


# Html / Css

-> Réglages responsive

-> Corrections pour validation W3C


# Vue.js 

-> Animations, transitions

-> Rendus conditionnels


# Vuetify

-> Composants responsive (Slider, Navbar, Navigation Drawer, Cards, Footer, Scroll on top, icons, buttons...)

-> Animations (Hover, Expand, Transition, Pop-up, v:bind, v-if/else, Tabs interactives, Typography, Flip cards...)

-> Responsive Design ($.breakpoints, v-row, v-flex, v-layout, v-flex, v-if/else...)


# Highcharts dynamiques

-> Injections de données SQL dans les codes JS

-> Traitements des formats : CSV, JSON, API

-> Connexion AJAX ou FETCH() pour les données API et filtrage par mots clés

-> Contrôle des options des graphiques en Back Office

-> Possibilité d'afficher au moins 6 graphiques par article (et + ??)


# Démos (charts ou map non dynamiques) 

-> Carte Leaflet avec données de géolocalisations (fichier CSV)

-> Charts.js : 2 graphiques programmés avec la méthode FETCH()

