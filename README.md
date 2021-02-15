# Aplicació basada en framework x2app

Es tracta d'una app basa en un framework MVC i OOP en PHP

## Estructura

Estructura de carpetes i fitxers

```
/index.php
 config.json
 composer.json
 vendor/
 src/
 templates/
 public/
    css/
    img/
    js/
```

La carpeta src/ incorpora les classes bàsiques de funcionament, incloent App que és la classe mestra inicial.
La carpeta vendor/ inclou únicament la característica autoload de PSR-4.
templates/ incorpora totes les plantilles php-html que s'utilitzen a les vistes.
public/ incorpora les característiques estàtiques i de front-end de l'aplicació.

## La navegació en l'app (Exemple)

```
welcome --> login  ----> dashboard ---> add task
        --> register               ---> complete task
                                   ---> remove task
                                   ---> edit task
                                   ---> profile
Controllers:  USERCONTROLLER          USER/TASKCONTROLLER

```

## Iniciar l'aplicació

Cal exportar l'SQL de la base dades de l'aplicació:

```
php start.php fitxer.sql
```

Cal instal·lar dependències

```
composer update
```

# todorecu
