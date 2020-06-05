import React, { Component } from 'react';

export class StyleItem extends Component {
    render() {
        const { style } = this.props;
        return (
              
            <a href={style.slug}>{style.name}</a>
            
        )
    }
}

export default StyleItem;
