<?php 

class Recipes_Cpt
{
    public function __construct() 
    {
        add_action('init', [$this, 'create_cpt_recipes']);
        add_action('init', [$this, 'create_taxonomies']);

        
    }

    // =========== CREATION DU CUSTOM POST TYPE RECETTES ============== \\

    public function create_cpt_recipes() 
    {
        $labels = [
            "name"                  => "Recettes",
            "singular_name"         => "Recette",
            "menu_name"             => "Recettes",
            "name_admin_bar"        => "Recette",
            'archives'              => 'Archives des recettes',
            'attributes'            => 'Attributs des recettes',
            'parent_item_colon'     => 'Element parent',
            'all_items'             => 'Toutes les recettes',
            "add_new"               => "Ajouter une recette",
            "add_new_item"          => "Ajouter une nouvelle recette",
            "new_item"              => "Nouvelle recette",
            "edit_item"             => "Editer la recette",
            'update_item'           => "Mettre à jour la recette",
            "view_item"             => "Voir la recette", 
            "all_items"             => "Voir toutes les recettes",
            "search_items"          => "Rechercher une recette",
            "not_found"             => "Aucune recette trouvée",
            "not_found_in_trash"    => "Aucune recette trouvée dans la corbeille",
            "featured_media"        => "Image de la recette",
            "set_featured_media"    => "Ajouter une image à la recette",
            "remove_featured_image" => "Supprimer l'image de la recette",
            "use_featured_media"    => "Utiliser l'image de la recette",
            'insert_into_item'      => "Insérer dans la recette",
            "uploaded_to_this_item" => "Téléverser dans la recette",
            "items_list"            => "Liste des recettes",
            "items_list_navigation" => "Liste des recettes",
            "filter_items_list"     => "Filtrer la liste des recettes"
        ];

        $args = [
            "labels"                => $labels,
            "description"           => "Recette de cuisine d'un bot discord",
            "supports"              => [
                "title",
                "editor",
                "thumbnail",
                "excerpt",
                "custom-fields",
                "revision", 
            ],
            "public"                => true, // Accéder à nos recettes sur le front
            "hierarchical"          => false,
            "menu_position"         => 5, // Au dessus de Articles
            "menu_icon"             => "dashicons-carrot",
            'has_archive'           => true, // Je veux que mes recettes soient bien archivées
            'rewrite'               => [
                'slug'              => 'recette',
                'with_front'        => true, 
            ],
            'capabilities' => [
                'edit_post'          => 'edit_recettes', 
                'read_post'          => 'edit_recettes', 
                'delete_post'        => 'edit_recettes',  
                'edit_posts'         => 'edit_recettes', 
                'edit_others_posts'  => 'edit_recettes', 
                'publish_posts'      => 'edit_recettes',       
                'read_private_posts' => 'edit_recettes', 
                'create_posts'       => 'edit_recettes',  
            ],
                
            'show_in_ui'            => true, 
            'show_in-rest'          => true, 
        ];


        register_post_type("recettes", $args);

    }

    // =========== CREATION DES TAXONOMIES ============== \\

    public function create_taxonomies() 
    {
        // Création d'une taxonomie ingrédients
        $labels =  [ 
            'name'                          => 'Ingrédients',
            'singular_name'                 => 'Ingrédient',
            "menu_name"                     => "Ingrédients",
            'all_items'                     => 'Toutes les ingrédients',
            "add_new_item"                  => "Ajouter un nouvel ingrédient",
            "new_item_name"                 => "Nouvel ingrédient",
            "edit_item"                     => "Editer les ingrédients",
            'update_item'                   => "Mettre à jour les ingrédients",
            "view_item"                     => "Voir les ingrédients", 
            'separate_items_with_commas'    => "Séparer les ingrédients avec une virgule",
            "add_or_remove_items"           => "Ajouter ou supprimer un ingrédient",
            "choose_from_most_used"         => "Choisir parmis les ingrédients les plus utilisés",
            "popular_items"                 => "Ingrédients populaires",
            "all_items"                     => "Voir tous les ingrédients",
            "search_items"                  => "Rechercher un ingrédient",
            "not_found"                     => "Aucun ingrédient trouvé",
            "items_list"                    => "Liste des ingrédients",
        ];

        $args = [
            'labels'                => $labels,
            "hierarchical"          => false,
            "public"                => true, 
            'show_in_ui'            => true, 
            'show_in-rest'          => true, 
            'capabilities'          => [
                'manage_terms'  => 'edit_recettes_taxo',
                'edit_terms'    => 'edit_recettes_taxo',
                'delete_terms'  => 'edit_recettes_taxo',
                'assign_terms'  => 'edit_recettes_taxo',
            ],
        ];

        // nom de la taxo, lié au cpt, on lui donne nos arguments
        register_taxonomy('ingredient', 'recettes', $args);

    // =============================================================== \\

        // Création d'une taxo Type pour relié les recettes par catégories de recettes
        $labels = [
            'name'                       => 'Types',
            'singular_name'              => 'Type',
            'menu_name'                  => 'Types',
            'all_items'                  => 'Tous les types',
            'new_item_name'              => 'Nouveau type',
            'add_new_item'               => 'Ajouter un type',
            'update_item'                => 'Mettre à jour un type',
            'edit_item'                  => 'Editer un type',
            'view_item'                  => 'Voir tous les types',
            'separate_items_with_commas' => 'Séparer les type avec une virgule',
            'add_or_remove_items'        => 'Ajouter une supprimer un type',
            'choose_from_most_used'      => 'Choisir parmis les types les plus utilisés',
            'popular_items'              => 'Types populaires',
            'search_items'               => 'Rechercher un type',
            'not_found'                  => 'Aucun type trouvé',
            'items_list'                 => 'Lister les types',
            'items_list_navigation'      => 'Lister les types',
        ];

        $args = [
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_in_rest'      => true,
            'capabilities'          => [
                'manage_terms'  => 'edit_recettes_taxo',
                'edit_terms'    => 'edit_recettes_taxo',
                'delete_terms'  => 'edit_recettes_taxo',
                'assign_terms'  => 'edit_recettes_taxo',
            ],
        ];
     
        register_taxonomy('type', "recettes", $args);
        
            
    // =============================================================== \\

        // Création d'une taxo pour relié les recettes aux concours

        $labels = [
            'name'                          => 'Gagnant du Concours',
            'singular_name'                 => 'Gagnant du Concours',
            "menu_name"                     => "Concours",
            'all_items'                     => 'Tous les concours',
            "add_new_item"                  => "Ajouter un nouveau concours",
            "new_item_name"                 => "Nouveau concours",
            "edit_item"                     => "Editer le concours",
            'update_item'                   => "Mettre à jour le concours",
            "view_item"                     => "Voir le concours", 
            'separate_items_with_commas'    => "Séparer les concours avec une virgule",
            "add_or_remove_items"           => "Ajouter ou supprimer un concours",
            "choose_from_most_used"         => "Choisir parmis les concours les plus utilisés",
            "popular_items"                 => "Concours populaires",
            "all_items"                     => "Voir toutes les concours",
            "search_items"                  => "Rechercher un concours",
            "not_found"                     => "Aucun concours trouvé",
            "items_list"                    => "Liste des concours",
        ];

        $args = [
            'labels'            => $labels,
            'public'            => true,
            'hierarchical'      => false,
            
        ];

        register_taxonomy('concours', "recettes", $args);
    }

    // re-calcul des routes à l'activation et la désactivation du plugin 
    // Pour éviter d'aller enregistrer les permaliens à chaque nouveau post du cpt
    public function recipes_activate()
    {
        // Exécute la méthode du plugin qui permet de décaler le cpt à WP
        $this->create_cpt_recipes();
        // pareil pour la taxonomie
        $this->create_taxonomies();
        // Exécute la fonction native de WP qui permet de recalculer les routes et les droits
        flush_rewrite_rules();
    }

    public function recipes_desactivate()
    {
        // On recalcule juste les routes et les droits (on ne lui déclare plus le cpt)
        flush_rewrite_rules();
    }
}
