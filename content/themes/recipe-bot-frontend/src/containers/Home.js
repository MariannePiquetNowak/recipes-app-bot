import { connect } from "react-redux";

// Import Actions Home

// Import local home 
import Recipes from "../components/Recipes";

// // Renvoit un objet de props au container
const mapStateToProps = (state) => {
    
}

// Renvoit les actions au container
const mapDispatchToProps = (dispatch) => {

}

const Home = connect(mapStateToProps, mapDispatchToProps)(Recipes);

export default Home;