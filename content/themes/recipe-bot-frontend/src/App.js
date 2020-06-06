import React from 'react';
import { Route } from 'react-router-dom';

import './App.css';

import Recipes from "./components/Recipes";
import Header from "./components/layouts/Header";

function App() {
  return (
    <div className="App">
      <Header />
      <Recipes />
    </div>
  );
}

export default App;
