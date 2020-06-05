import React, { Component } from 'react';
import IngredientItem from './IngredientItem';
import Meta from './Meta';
import StyleItem from './StyleItem';

export class RecipeItem extends Component {
    render() {
        const { title, excerpt, thumbnail, meta, ingredient, style, slug } = this.props.recipe;
        return (
            <div className="recipe" >
                <h2>{title.rendered}</h2>
                <div className="recipe_excerpt" dangerouslySetInnerHTML={{ __html: excerpt.rendered }} />
                <Meta meta={meta} />

                <div className="recipe_img">
                    <img src={thumbnail.url} alt={slug}/>
                </div>

                <div className="recipe_ingredient">
                    <h3>Ingredients</h3>
                    <ul className="recipe_ingredient_item">
                        {ingredient.map(ingredientItem => (
                            <IngredientItem key={ingredientItem.id} ingredient={ingredientItem} />
                        ))}
                    </ul>
                </div>

                <div className="recipe_style">
                    <h3>Visible dans:</h3>
                    <div className="recipe_style_item">
                        {style.map(styleItem => (
                            <StyleItem key={styleItem.id} style={styleItem} />
                        ))}
                    </div>
                </div>
                <button className="recipe_button" onClick={() => console.log("accéder recette")}>Accéder à la recette</button>
            </div>
        )
    }
}

export default RecipeItem;


// TODO 

// 1) Faire component pour Meta informations
// 2) Faire component pour les ingredients