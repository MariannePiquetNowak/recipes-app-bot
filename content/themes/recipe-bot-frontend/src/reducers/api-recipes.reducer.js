// Import Action Types 
import { FETCH_RECIPES } from "../actions/home.actions";

const initialState = {
    recipes: [],
    isLoaded: false
}

const HomeReducer = (state = initialState, action) => {
    switch (action.type) {
        case FETCH_RECIPES:
            return {
                ...state,
                recipes: action.payload.data, 
                isLoaded: true
            };
    }

    return state;
}