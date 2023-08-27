import {createStore} from "vuex";
import axiosClient from "../axios.js";
import * as actions from "../store/actions.js"
import * as mutations from "../store/mutations.js"

const store = createStore({
        state: {
            user: {
                data: {},
                token: sessionStorage.getItem("TOKEN"),
            },
        },
        getters: {},
        actions,
        mutations
    }
);

export default store;
