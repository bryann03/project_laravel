<template>
    <main>
        <h1 class="text-center">Stock Funko Pop</h1>
        <button type="button" class="btn btn-success" @click="openModal( {action: 'insert'} )">Add New Collection</button>

        <!-- MODAL ADD COLLECTION -->
        <modal-new-collection v-if="showModal" @close="showModal = false" :actionApi="actionModal" :objectInfo="objectToModal"
                            @refreshData="getCollections" @messageInfo="showMsg">

        </modal-new-collection>
        <!-- FIN MODAL -->

        <div class="row text-center mt-5 justify-content-center">
            <div v-for="collection in arrayFunkosCollection" :key="collection.id"
                class="col-lg-6 col-sm-12 col-md-10">
                <funko-card v-bind:collection="collection" @delete="openModal" @update="openModal"></funko-card>
            </div>
        </div>
    </main>
</template>

<script>
import FunkoCard from './FunkoCard.vue'
import ModalNewCollection from './ModalNewCollection'
import { mapState, mapMutations, mapActions } from "vuex";
export default {
    data(){
        return{
            showModal: false,
            objectToModal: null,
            actionModal: ''
        };
    },
    created() {
        this.getCollections();
    },
    methods: {
        ...mapActions(["getApi"]),
        getCollections(){
            this.getApi({ruta: 'funkos_collection', nombreTabla: 'collection'});
        },
        openModal( { object, action } ){
            this.objectToModal = object;
            this.actionModal = action;
            this.showModal = true;
        },
        showMsg({message}){
            console.log(message);
        }
    },
    computed: {
        ...mapState(['arrayFunkosCollection'])
    }
}
</script>

<style lang="scss">

</style>
