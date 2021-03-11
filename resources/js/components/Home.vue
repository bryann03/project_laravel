<template>
    <main>
        <h1 class="text-center">Stock Funko Pop</h1>
        <button type="button" class="btn btn-success" @click="showModal = true">Add New Collection</button>

        <!-- MODAL ADD COLLECTION -->
        <modal-new-collection v-if="showModal" @close="showModal = false" :actionApi="actionModal" :objectInfo="objectToModal">

        </modal-new-collection>
        <!-- FIN MODAL -->

        <div class="row text-center mt-5 justify-content-center">
            <div v-for="collection in arrayFunkosCollection" :key="collection.id"
                class="col-lg-6 col-sm-12 col-md-10">
                <funko-card v-bind:collection="collection" @delete="openModal"></funko-card>
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
        this.getApi({ruta: 'funkos_collection', nombreTabla: 'collection'});
    },
    methods: {
        ...mapActions(["getApi"]),
        openModal( { object, action } ){
            this.objectToModal = object;
            this.actionModal = action;
            this.showModal = true;
        },
        deleteCollection(collectionId){
            axios.delete("/funkos_collection/" + collectionId)
                .then( (result) => {
                    console.log(result);
                }).catch((err) => {
                    console.log(err);
                });
            // console.log(collectionId);
        }
    },
    computed: {
        ...mapState(['arrayFunkosCollection'])
    }
}
</script>

<style lang="scs
FunkoCards">

</style>
