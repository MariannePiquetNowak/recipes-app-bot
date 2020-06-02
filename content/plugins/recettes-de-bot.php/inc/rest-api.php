<?php

/// Dialoguer avec la REST API de WP

class RecipesApi
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'authorField']);
        add_action('rest_api_init', [$this, 'ingredientField']);

    }

    // ============= EXEMPLE SIMPLE ===============

    // // Déclarer un champ author à la rest API
    // public function authorField()
    // {
    //     // Modifier le retour de la REST API
    //     register_rest_field(
    //         // Type de contenu que je souhaite modifier
    //         "post",
    //         // Nom du champ à ajouter
    //         'author_name',
    //         [
    //             // Fonction à appeler lors d'un GET
    //             'get_callback'      => [$this, 'getAuthorName'],
    //             // Fonction à appeler lors d'un POST
    //             'update_callback'   => null,
    //             // Structure de la donnée
    //             'schema'            => null
    //         ]

    //     );
    // }

    // public function getAuthorName() 
    // {
    //     // Un nouveau champ 'author_name' sur les posts à été ajouté dynamiquement dans la rest api 
    //     return 'Chloé';
    // }

    // =================== EXEMPLE PROPRE ===============

    public function authorField()
    {
        // Modifier le retour de la REST API : https://developer.wordpress.org/reference/functions/register_rest_field/
        register_rest_field(
            // Type de contenu que je souhaite modifier
            ['post', 'recettes'],
            // Nom du champ à ajouter (field_name)
            'author',
            [
                // Fonction à appeler lors d'un GET
                'get_callback'      => [$this, 'getAuthorName'],
                // Fonction à appeler lors d'un POST
                'update_callback'   => null,
                // Structure de la donnée
                'schema'            => null
            ]

        );
    }

    /**
     *  Callback appelé lors d'un GET (wp/v2/posts par exemple) pour modifier la clé "author"
     *
     *  @param array $object : stocke les anciennes données de la rest api avant modification
     *  @param string $field_name : le nom du champ/clé ciblé (ou du nouveau champ) (ici, on cible la clé "author")
     *  @param WP_REST_Request $request : contient le détail de la requête
    **/


    public function getAuthorName($object, $field_name, $request) 
    {
        return [
            "id" => $object["author"], 
            "name" => get_the_author_meta("nickname", $object["author"]) // Récupère le psuedonyme + id dynamiquement
        ];
    }


    public function ingredientField()
    {
        register_rest_field(
            ['recettes'],
            'ingredient',
            [
                'get_callback'  => [$this, 'get_ingedient_name'],
                'get_update'    => null,
                'supports'      => null
            ]
        );
    }

    public function get_ingedient_name($object, $field_name, $request)
    {
        return [
           // "id"    => $object['ingredient'],
            "details"  => get_terms("ingredient", $object['ingredient'])
        ];
    }

}