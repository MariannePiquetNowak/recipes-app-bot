<?php

// Ceci n'est pour le moment pas utile pour le site mais le sera peut-être par la suite 
// Cette class est avant tout créée pour pratiquer


// 2) La création des rôles pour accéder au dashboard
// Source : https://codex.wordpress.org/fr:R%C3%B4les_et_Capacit%C3%A9s

class RecipesRole
{
    // Ajout du rôle Cuistot
    public function addCuistot()
    {
        // Création d'un nouveau rôle pour un cuistot
        add_role(
            'cuistot',
            'Cuisinier pour Recettes de Bot',
            [
                'read'          => true, // Ajout de capacités natives à Wordpress
                'upload_files'  => true,
                'edit_posts'    => true,
            ]
            );
    }

    public function addCapabilities()
    {
        // Ajout des capacités inventées aux rôles existants (ici, pour le rôle cuistot)
        $role = get_role('cuistot');
        $role->add_cap('edit_recettes'); // création d'une capacité "edit_recettes" (peut éditer et voir les recettes) // Voir dans le CPT Recettes Capabilities
        $role->add_cap('edit_recettes_taxo');

        $role = get_role('administrator'); 
        $role->add_cap('edit_recettes');
        $role->add_cap('edit_recettes_taxo');

        $role = get_role('editor'); 
        $role->add_cap('edit_recettes');
        $role->add_cap('edit_recettes_taxo');


        // $role = get_role('author');
        // $role->remove_cap('delete_published_posts'); // Le rôle Author ne pourrait plus supprimer des posts.

    }

    // Exemple pour supprimer un rôle
    public function removeRole()
    {
        remove_role('cuistot');
    }

    public function role_activate() // A l'activation du plugin
    {
        $this->addCuistot();
        $this->addCapabilities();
    }

    public function role_deactivate() // A la désactivation du plugin
    {
        $this->removeRole();
    }
} 