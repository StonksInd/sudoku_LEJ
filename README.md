# Sudoku Solver - PHP

Un solveur de Sudoku développé en PHP utilisant la programmation orientée objet et les bonnes pratiques de développement.

## 📋 Description du Projet

Ce projet implémente un solveur de Sudoku complet avec les fonctionnalités suivantes :
- Chargement de grilles depuis des fichiers JSON
- Validation des grilles et des positions
- Résolution automatique des puzzles Sudoku
- Interface en ligne de commande pour tester multiple grilles
- Suite de tests unitaires complète

## 🛠️ Technologies Utilisées

- **PHP** : Langage principal du projet
- **Composer** : Gestionnaire de dépendances
- **PHPUnit** : Framework de tests unitaires (versions 7.5 à 10.0 supportées)
- **JSON** : Format de stockage des grilles
- **Git** : Contrôle de version avec normalisation LF

## 📁 Structure du Projet

```
sudoku-solver/
├── src/                        # Code source principal
│   ├── GridInterface.php       # Interface pour les grilles
│   ├── SolverInterface.php     # Interface pour les solveurs
│   ├── SudokuGrid.php         # Implémentation de la grille Sudoku
│   └── SudokuSolver.php       # Algorithme de résolution
├── grids/                      # Grilles de test
│   ├── full.json              # Grille complète (solution)
│   ├── grid1.json             # Grille de difficulté 1
│   ├── grid2.json             # Grille de difficulté 2
│   ├── grid3.json             # Grille de difficulté 3
│   ├── grid4.json             # Grille de difficulté 4
│   └── unsolvable.json        # Grille non résolvable
├── tests/                      # Tests unitaires
│   └── SudokuGridTest.php     # Tests pour SudokuGrid
├── composer.json              # Configuration Composer
├── solve.php                  # Script de résolution batch
├── index.php                  # Point d'entrée principal
└── LICENSE                    # Licence MIT
```

## ⚙️ Installation

### Prérequis
- PHP 7.4 ou supérieur
- Composer

### Installation des dépendances
```bash
composer install
```

## 🚀 Utilisation

### Résolution d'une grille simple
```php
<?php
require_once "vendor/autoload.php";

// Charger une grille depuis un fichier JSON
$sudokuGrid = SudokuGrid::loadFromFile('grids/grid1.json');

// Créer le solveur
$solver = new SudokuSolver($sudokuGrid);

// Résoudre la grille
$solver->solve();
```

### Résolution de toutes les grilles (script batch)
```bash
php solve.php
```

Ce script traite automatiquement toutes les grilles du dossier `grids/` et affiche :
- La grille initiale
- Le temps de résolution
- La solution ou un message d'échec

## 🏗️ Architecture

### Classes Principales

#### `SudokuGrid`
Représente une grille de Sudoku 9x9 avec les méthodes :
- `loadFromFile()` : Chargement depuis JSON
- `get()/set()` : Accès aux cellules
- `row()/column()/square()` : Accès aux lignes, colonnes et blocs
- `isValid()` : Validation de la grille
- `isFilled()` : Vérification si complète
- `isValueValidForPosition()` : Validation d'une valeur à une position

#### `SudokuSolver`
Implémente l'algorithme de résolution :
- Utilise le backtracking pour explorer les solutions
- Valide chaque placement selon les règles du Sudoku
- Retourne la solution ou null si impossible

### Format des Grilles

Les grilles sont stockées au format JSON comme tableau 9x9 :
```json
[
    [9, 3, 1, 6, 5, 7, 8, 4, 2],
    [2, 8, 6, 9, 4, 1, 7, 3, 5],
    ...
]
```
- `0` représente une case vide
- `1-9` représentent les chiffres placés

## 🧪 Tests

### Exécution des tests
```bash
# Tous les tests
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

# Tests spécifiques
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/SudokuGridTest.php
```

### Couverture des tests
Les tests couvrent :
- ✅ Chargement de fichiers
- ✅ Manipulation des grilles
- ✅ Validation des règles Sudoku
- ✅ Navigation dans la grille
- ✅ Détection de grilles complètes/valides

## 📈 Fonctionnalités

### ✅ Implémentées
- [x] Chargement de grilles JSON
- [x] Validation complète des règles Sudoku
- [x] Interface orientée objet
- [x] Tests unitaires complets
- [x] Script de résolution batch
- [x] Gestion des erreurs

### 🔄 En développement
- [ ] Algorithme de résolution (partiellement implémenté)
- [ ] Interface utilisateur web
- [ ] Génération de nouvelles grilles
- [ ] Analyse de difficulté

## 🐛 Problèmes Connus

1. **Algorithme de résolution incomplet** : Le `SudokuSolver` nécessite une implémentation complète du backtracking
2. **Gestion d'erreurs** : Quelques cas d'erreur dans le parsing JSON à améliorer

## 🤝 Contribution

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/amazing-feature`)
3. Commit les changements (`git commit -m 'Add amazing feature'`)
4. Push vers la branche (`git push origin feature/amazing-feature`)
5. Ouvrir une Pull Request

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 👨‍💻 Auteur

**Nath** - Développeur principal

---

*Projet développé dans le cadre d'un exercice de programmation orientée objet en PHP.*
