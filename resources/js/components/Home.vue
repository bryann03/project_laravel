<template>
    <main>
        <h1 class="text-center">Stock Funko Pop</h1>
        <div class="row text-center mt-5 justify-content-center">
            <div v-for="collection in arrayFunkosCollection" :key="collection.id"
                class="col-lg-6 col-sm-12 col-md-10">
                <funko-card></funko-card>
            </div>
            <!-- <div class="col-lg-6 col-sm-12 col-md-10">
                <funko-card></funko-card>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-10">
                <funko-card></funko-card>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-10">
                <funko-card></funko-card>
            </div> -->
        </div>
    </main>
</template>

<script>
import FunkoCard from './FunkoCard.vue'
import { mapState, mapMutations, mapActions } from "vuex";
export default {
    data(){
        return{

        };
    },
    created() {
        this.getApi({ruta: 'funkos_collection', nombreTabla: 'collection'});
        // console.log(this.arrayFunkosCollection);
    },
    methods: {
        ...mapActions(["getApi"])
    },
    computed: {
        ...mapState(['arrayFunkosCollection'])
    }
}
</script>
<style lang="scs
FunkoCards">

</style>
