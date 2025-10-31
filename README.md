# UP Admin Bar Position

Plugin WordPress permettant de repositionner la barre d’administration en un clic.

## Fonctionnalités

- Sélecteur dans la barre d’administration pour choisir la position : **Haut**, **Bas**, **Gauche**, **Droite**.
- Mise en page adaptée pour chaque position (barre pleine largeur en haut/bas, barre compacte verticale gauche/droite).
- Styles générés via `assets/scss/style.scss` compilé vers `style.css`.
- Persistance de la position choisie via `localStorage`.

## Installation

1. Copier le dossier `up-admin-bar-position` dans `wp-content/plugins/`.
2. Activer l’extension depuis **Extensions > Installées**.
3. Recharger une page du site pour voir le sélecteur apparaître dans la barre d’administration (zone droite).

## Compilation SCSS

Un fichier `assets/scss/style.scss` est fourni pour personnaliser plus facilement les styles.

```bash
# Exemple de compilation via WP-CLI ou npm scripts
sass assets/scss/style.scss style.css --style=compressed
```

## Développement

- Le JavaScript principal se trouve dans `assets/js/admin-bar-position.js`.
- Le sélecteur est injecté via `admin_bar_menu` dans `up-admin-bar-position.php`.
- La largeur de la barre verticale est contrôlée par la variable SCSS `$upab-side-width`.

## Historique

Consulter le fichier [CHANGELOG](./CHANGELOG.md) pour suivre l'évolution des versions.

## Support

Pour toute question ou amélioration, contacter l’auteur : GEHIN NICOLAS.
