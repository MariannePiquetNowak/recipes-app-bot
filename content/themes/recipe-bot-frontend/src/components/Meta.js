import React, { Component } from 'react';

export class Meta extends Component {
    render() {
        const { meta } = this.props;
        // console.log(meta)
        return (
            <div className="recipe_meta">
                <span><strong>Créateur: </strong>{meta.createur}</span>
                <span><strong>Préparation: </strong>{meta.preparation}</span>
                <span><strong>Cuisson: </strong>{meta.temps_de_cuisson}</span>
            </div>
        )
    }
}

export default Meta;
