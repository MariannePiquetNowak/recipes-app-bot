import React, { Component } from 'react'
import renderHTML from 'react-render-html';
import axios from 'axios';
import PropTypes from 'prop-types';


export class RecipeItem extends Component {

    state = {
        imgUrl: '',
        author: '', 
        isLoading: false
    }

    static propTypes = {
        recette: PropTypes.object.isRequired
    }

    componentDidMount(props) {
        const { featured_media, author } = this.props.recette;
        const getImageUrl = axios.get(`http://localhost/sites-wordpress/recipes-app-bot/wp-json/wp/v2/media/${featured_media}`);
        const getAuthor = axios.get(`http://localhost/sites-wordpress/recipes-app-bot/wp-json/wp/v2/users/${author}`);

        Promise.all([getImageUrl, getAuthor]).then(res => {
            console.log(res)
            // this.setState({
            //     imgUrl: 
            // })
        })
    }



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
