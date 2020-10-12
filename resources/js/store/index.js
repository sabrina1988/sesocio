import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)


export default new Vuex.Store({
    state:{
        token : ''
    },
    mutations:{
        GUARDAR_TOKEN(state,token){
            state.token = token
        }
    },
    getters:{

    },
    actions:{
        guardarToken({commit},token){
            commit('GUARDAR_TOKEN',token)
        }
    }
});