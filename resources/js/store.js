import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex, axios);

export default new Vuex.Store({
    state: {
      arrayFunkosCollection: []
    },
    mutations: {
      funkos_collection(state, datosRecibidos) {
        state.arrayFunkosCollection = datosRecibidos;
      },
    },
    actions: {
      //LE PASA EL NOMBRE DE LA TABLA Y SU RUTA
      getApi({ commit }, { ruta, nombreTabla }) {
        axios
          .get("/" + ruta)
          .then(function(response) {
            const datos = response.data;
            console.log(datos);
            // commit(nombreTabla, datos);
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    },
    modules: {},
  });
