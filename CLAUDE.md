# Bebou App

## 🎯 Description du projet

Projet collaboratif développé en binôme, centralisant des outils pratiques pour le quotidien.

### Fonctionnalités actuelles
- **Outil de correspondance de couleurs de laine** : trouve le code couleur de laine le plus proche d'un code couleur standard (pour la couture)
- **Carnet de dégustation de Gin** : ajout/suppression/notation de Gins avec classement qualitatif (Bon/Bof/Ok)

## 🏗️ Stack Technique

- **Symfony** : 8.0
- **PHP** : 8.4
- **Base de données** : Doctrine ORM 3.6
- **Frontend** : Asset Mapper, Symfony UX (Live Components, Turbo, Twig Components)
- **Storage** : Flysystem (avec support S3)
- **Qualité** : PHPStan 2.1, PHP-CS-Fixer, Twig-CS-Fixer
- **Tests** : PHPUnit 12.5, Doctrine Test Bundle, Fixtures

## 🧪 Objectif d'apprentissage

Ce projet est un **terrain d'expérimentation** pour explorer l'architecture logicielle :
- Domain-Driven Design (DDD)
- Command Query Responsibility Segregation (CQRS)
- Event Sourcing
- Hexagonal Architecture
- Autres patterns architecturaux

**Important** : Il n'y a pas UNE architecture figée. Chaque fonctionnalité peut utiliser des patterns différents selon ce qui est testé.

## 🏛️ Architecture actuelle

### Approche générale
- Architecture Symfony classique pour l'instant
- Évolution progressive vers des patterns plus avancés selon les besoins d'apprentissage

### Principes SOLID respectés
✅ **Pas de classes "Service" génériques**
- Les classes `*Service` sont bannies car elles violent le principe de responsabilité unique (SRP)
- Elles deviennent des fourre-tout incompréhensibles

✅ **À la place, utiliser** :
- **Command Handlers** : pour les actions métier (ex: `RegisterGinTasting`, `FindClosestYarnColor`)
- **Query Handlers** : pour les lectures (ex: `GetGinRankings`)
- **Repositories** : pour l'accès aux données
- **Value Objects** : pour encapsuler la logique métier
- **Domain Events** : pour la communication entre contextes
- Classes avec des noms explicites qui décrivent leur responsabilité unique

## 📋 Conventions et règles de développement

### Tests
- ✅ **TOUJOURS** écrire des tests pour toute nouvelle fonctionnalité
- Tests unitaires pour la logique métier
- Tests fonctionnels pour les controllers/API
- Utiliser les fixtures pour les tests

### Documentation
- ✅ **Documentation suivant le framework Diátaxis** (dans `.docs/`)
  - **Tutorials** : guides d'apprentissage pas-à-pas
  - **How-to guides** : guides pratiques pour résoudre des problèmes spécifiques
  - **Reference** : documentation technique et APIs
  - **Explanation** : explications conceptuelles et contexte
- ✅ **ADR (Architecture Decision Records)** : documenter les décisions architecturales importantes
  - Pourquoi on a choisi tel pattern ?
  - Quel problème ça résout ?
  - Quelles alternatives ont été considérées ?
- ✅ Commenter le "pourquoi", pas le "quoi"

### Qualité de code
- Respecter les standards PHP-CS-Fixer
- Passer PHPStan sans erreur
- Code review mentale avant chaque commit

## 🤖 Règles pour Claude (l'IA)

### ⚠️ RÈGLE ABSOLUE : VÉRIFICATION OBLIGATOIRE
**TOUJOURS** vérifier les informations avant de les communiquer :
- ❌ Ne JAMAIS donner une information non vérifiée
- ✅ Lire le code source pour confirmer
- ✅ Tester les commandes avant de les suggérer
- ✅ Chercher dans la documentation officielle si nécessaire
- ✅ Si incertain, le dire explicitement : "Je ne suis pas sûr, laisse-moi vérifier..."

**Exemple à NE PAS FAIRE** :
```
Claude : "Tu peux utiliser la commande X pour faire Y"
*L'utilisateur essaie, ça ne marche pas*
Claude : "Ah désolé, je n'avais pas vérifié..."
```

**Exemple à FAIRE** :
```
Claude : "Laisse-moi vérifier quelle commande utiliser..."
*lit la doc / teste*
Claude : "J'ai vérifié, la commande est X, voici ce qu'elle fait..."
```

### Workflow de travail
1. **Toujours demander confirmation** avant de créer/modifier des fichiers
2. **Expliquer les choix** : pourquoi telle approche plutôt qu'une autre ?
3. **Proposer des alternatives** : surtout pour l'architecture
4. **Éduquer** : expliquer les patterns, concepts DDD/CQRS si utilisés

### Ce que Claude doit faire
- ✅ Écrire les tests en même temps que le code
- ✅ Suggérer des noms de classes explicites (pas de `*Service`)
- ✅ Proposer de créer un ADR pour les décisions architecturales importantes
- ✅ Challenger les choix architecturaux (c'est un projet d'apprentissage !)
- ✅ Documenter le code complexe dans `.docs/` selon Diátaxis
- ✅ **VÉRIFIER** toute information avant de la communiquer

### Ce que Claude ne doit PAS faire
- ❌ Créer des classes `*Service` génériques
- ❌ Modifier du code sans expliquer pourquoi
- ❌ Oublier les tests
- ❌ Faire des choix architecturaux sans proposer d'alternatives
- ❌ **Donner des informations non vérifiées**

### Approche pédagogique
Ce projet est un terrain d'apprentissage. Claude doit :
- Expliquer les concepts DDD/CQRS/Event Sourcing quand ils sont utilisés
- Proposer plusieurs approches architecturales avec leurs avantages/inconvénients
- Encourager l'expérimentation
- Documenter les patterns utilisés (dans `.docs/` selon Diátaxis)

## 📚 Ressources et contexte

### Structure du projet
- `src/` : Code source applicatif
- `tests/` : Tests automatisés
- `migrations/` : Migrations Doctrine
- `.docs/` : Documentation du projet (suivant le framework Diátaxis)
  - Tutorials : guides d'apprentissage
  - How-to : guides pratiques
  - Reference : documentation technique
  - Explanation : explications conceptuelles et ADR
- `config/` : Configuration Symfony

### Domaines métiers identifiés
- **Yarn/Couture** : gestion des couleurs de laine
- **Gin Tasting** : dégustation et notation de Gins

## 🔐 Fichiers sensibles (à ne pas modifier)
- `.env`, `.env.local`, `docker.env.local`
- `var/`, `vendor/`
- Fichiers de configuration Docker/Infrastructure

---

**Version** : 1.1
**Dernière mise à jour** : 2026-03-16
