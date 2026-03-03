<?php

/* Contient toutes les clés de traduction personalisée (pas généré par la librairie lang) */

/**
 * French UI language file
 * 
 * This file contains all French localization strings for the user interface.
 * 
 * @package DevProdMed
 * @subpackage Language
 * @category French (fr)
 * 
 * @since 1.0.0
 */
declare(strict_types=1);

return [
    'home' => [
        'title' => 'Accueil',
        'description' => "Page d'accueil du réseau social.",
        'introduction' => 'Bienvenue sur :app_name !',
    ],
    'profile' => [
        'title' => 'Profil de :username',
        'description' => 'Page de profil pour :username.',
        'number_of_posts' => '{0} Aucune publication|{1} :count publication|[2,*] :count publications',
    ],
    'about' => [
        'title' => 'À propos',
        'description' => 'Page à propos de notre réseau social.',
        'introduction' => 'Ce réseau social a été créé pour permettre aux utilisateur.trices de partager leurs pensées et leurs idées avec le monde entier.',
        'disclaimer' => "Ce réseau social est un projet réalisé dans le cadre d'un cours de la HEIG-VD, Suisse.",
        'copyright' => '© :year Tous droits réservés.',
    ],
    'posts' => [
        'no_posts' => 'Aucun post à afficher.',
        'likes_count' => '{0} Aucun like|{1} :count like|[2,*] :count likes',
    ],
];
