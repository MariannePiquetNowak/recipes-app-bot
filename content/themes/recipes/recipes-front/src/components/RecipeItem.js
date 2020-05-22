import React, { Component } from 'react'
import renderHTML from 'react-render-html';

export class RecipeItem extends Component {
    render() {
        const { title, excerpt } = this.props.recette;
        return (
            <div>
                <h2>{ title.rendered }</h2>
                <div>{renderHTML(excerpt.rendered)}</div>
            </div>
        )
    }
}

export default RecipeItem;
