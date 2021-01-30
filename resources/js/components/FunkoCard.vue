<template>
    <main>
        <div class="card m-5" style="width: auto">
            <img src="" class="card-img-top" alt="Funko collection">
            <div class="card-body">
                <h5 class="card-title">Nombre collection</h5>
                <a href="" class="btn btn-primary">Explorar</a>
            </div>
        </div>
    </main>
</template>

<script>
import { mapState, mapMutations, mapActions } from "vuex";
export default {
    data(){
        return{

        };
    },
    created() {
        this.getApi({ruta: 'funkos_collection', nombreTabla: 'collection'})
    },
    methods: {
        ...mapActions(["getApi"])
    },
    computed: {
        ...mapState(['arrayFunkosCollecion'])
    }
}
</script>
<style lang="scss">

</style>
