import axios from 'axios';

const ROOT_URL = "http://localhost/sites-wordpress/recipes-app-bot/wp-json/wp/v2";
const FETCH_RECIPES = 'FETCH_RECIPES';

export function fetchRecipes(recipes) {
    const url = `${ROOT_URL}/recettes`;
    const request = axios.get(url);

    return {
        type: FETCH_RECIPES,
        payload: request
    };
}

// Appel API avec Redux : https://stackoverrun.com/fr/q/10966572