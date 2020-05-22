import React, { Component } from 'react'
import RecipeItem from './RecipeItem';
import axios from 'axios';

export class Recipes extends Component {
    // Initialisation du state
    state = {
        recipes: [],
        isLoaded: false
    }

    componentDidMount() {
        // Requête pour récupérer notre cpf de recettes
        axios.get('http://localhost/sites-wordpress/recipes-app-bot/wp-json/wp/v2/recettes')
        .then(res => this.setState({ // Ensuite, il me charge les données dans mon state
            recettes: res.data,
            isLoaded: true
        }) )
        .catch(err => console.log(err)) // Sinon il revoit une erreur en console
    }

    render() {
        console.log(this.state) // le state charge bien les recettes 
        const { recettes, isLoaded } = this.state;
        if(isLoaded) {
            return (
                <div>
                    {recettes.map(recette => (
                        <RecipeItem key={recette.id} recette={recette} />
                    ))}
                </div>
            )
        }
        return <h3>Loading...</h3>
    }
}

export default Recipes
