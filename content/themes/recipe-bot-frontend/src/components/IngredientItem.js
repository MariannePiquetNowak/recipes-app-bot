import React, { Component, Fragment } from 'react'

export class IngredientItem extends Component {
    render() {
        const { ingredient } = this.props;
        // console.log(ingredient)
        return (
            <a href="ingredient" className="ingredient">{ingredient.name}</a>    
        )
    }
}

export default IngredientItem
