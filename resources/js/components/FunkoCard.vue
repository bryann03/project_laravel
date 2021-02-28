<template>
    <main>
        <div class="card m-5" style="width: auto">
            <img src="" class="card-img-top" :alt="collection.name">
            <div class="card-body">
                <h5 class="card-title">{{ collection.name }}</h5>
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
    },
    methods: {
        // ...mapActions(["getApi"])
    },
    computed: {
        // ...mapState(['arrayFunkosCollecion'])
    },
    props: [
        'collection'
    ]
}
</script>
<style lang="scss">

</style>
