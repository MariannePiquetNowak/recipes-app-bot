import React, { Component } from 'react';

import '../../styles/header.scss';

export class Header extends Component {
    render() {
        return (
            <header>
                <nav className="navbar">
                    <a className="navbar_title" href="coucou"><strong>Recettes de Bot</strong></a>
                    <div className="navbar_items">
                        <a className="navbar_item" href="coucou">Recettes</a>
                        <a className="navbar_item" href="coucou">Au Hasard</a>
                        <a className="navbar_item" href="coucou">Galerie</a>
                        <a className="navbar_item" href="coucou">Concours</a>
                    </div>
                </nav>
            </header>
        )
    }
}

export default Header;
