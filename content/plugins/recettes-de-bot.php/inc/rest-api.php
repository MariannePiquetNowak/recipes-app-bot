<?php

/// Dialoguer avec la REST API de WP

class RecipesApi
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'authorField']);
        add_action('rest_api_init', [$this, 'metaField']);
        add_action('rest_api_init', [$this, 'thumbnailField']);
       add_action('rest_api_init', [$this, 'ingredientField']);
       add_action('rest_api_init', [$this, 'styleField']);


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

    // ================== récupérer les ingrédients =============== \\


    public function ingredientField()
    {
        register_rest_field(
            'recettes',
            'ingredient',
            [
                'get_callback'  => [$this, 'get_ingredient_details'],
                'get_update'    => null,
                'supports'      => null
            ]
        );
    }

    public function get_ingredient_details($object, $field_name, $request)
    {

        $array_return = [];

        foreach ($object[$field_name] as $term_id) {

            $wp_term = get_term($term_id, $field_name);

            $array_return[] = [
                'id'            => $term_id,
                'name'          => $wp_term->name,
                'description'   => $wp_term->description,
                'slug'          => $wp_term->slug
            ];
        }

        return $array_return;
        
    }

    // ================== récupérer les styles de recettes =============== \\

        public function styleField()
        {
            register_rest_field(
                'recettes',
                'style',
                [
                    'get_callback'  => [$this, 'get_style_details'],
                    'get_update'    => null,
                    'supports'      => null
                ]
            );
        }
    
        public function get_style_details($object, $field_name, $request)
        {
    
            $array_return = [];
    
            foreach ($object[$field_name] as $term_id) {
    
                $wp_term = get_term($term_id, $field_name);
    
                $array_return[] = [
                    'id'            => $term_id,
                    'name'          => $wp_term->name,
                    'description'   => $wp_term->description,
                    'slug'          => $wp_term->slug
                ];
            }
    
            return $array_return;
            
        }

    // ================== récupérer les méta information =============== \\

    public function metaField()
    {
       register_rest_field(
            'recettes',
            'meta',
            [
                'get_callback'  => [$this, 'getMetaCf'],
                'get_update'    => null,
                'schema'      => null
            ]
        );
    }

    public function getMetaCf($object, $field_name, $request)
    {
        // Récupère toutes les méta du post
       $all_meta = get_post_meta($object['id']);

       $array_return = [];

       foreach ($all_meta as $meta_name => $meta_value) {
           if (substr($meta_name, 0, 1) !== '_') {
               $array_return[$meta_name] = $meta_value;
           }
       }

       return $array_return; // Retourne les meta informations sans '_' au début
    }

    // ================== récupérer les images des posts recettes =============== \\

    public function thumbnailField()
    {
        register_rest_field(
            'recettes',
            'thumbnail',
            [
                'get_callback'  => [$this, 'getThumbnail'],
                'get_update'    => null,
                'schema'      => null
            ]
        );
    }

    public function getThumbnail($object, $field_name, $request)
    {

        // Si je veux seulement l'url de l'image 
        // return get_the_post_thumbnail_url($object['id]);

        // Si je veux plus de détails, à savoir l'url, la largueur et la hauteur
        if (has_post_thumbnail($object['id'])) {
            $thumbnail_details = wp_get_attachment_image_src($object['featured_media']); // On récupère la clé "featured_media" 

            return [
                "url"       => $thumbnail_details[0],
                "width"     => $thumbnail_details[1],
                "height"    => $thumbnail_details[2],
            ];
        } else {
            return false;
        }
    }

}