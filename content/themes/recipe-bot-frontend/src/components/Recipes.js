import React, { Component } from 'react'
import axios from "axios";

import RecipeItem from './RecipeItem';

import '../styles/recipe.scss';

export class Recipes extends Component {

    state = {
        recipes: [],
        isLoaded: false
    }

    componentDidMount(){
        axios.get('http://localhost/sites-wordpress/recipes-app-bot/wp-json/wp/v2/recettes')
        .then(res => this.setState({
            recipes: res.data,
            isLoaded: true
        }))
        .catch(err => console.log(err));
    }


    render() {
        console.log(this.state)
        const { recipes, isLoaded } = this.state;
       
        if(isLoaded) {
            return (
                <div className="container">
                    <h2>Les dernières recettes ajoutées</h2>
                <div className="list-recipes">
                    { recipes.map(recipe => (
                        <RecipeItem key={recipe.id} recipe={recipe} />
                    )) } 
                </div>
                </div>
            );
        }
        
        return <h3>Loading...</h3>
    }
}

export default Recipes

