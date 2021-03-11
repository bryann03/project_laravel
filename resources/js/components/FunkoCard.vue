<template>
    <main>
        <div class="card m-5" style="width: auto">
            <img :src="collection.imagen" class="card-img-top" :alt="collection.name">
            <div class="card-body">
                <h5 class="card-title">{{ collection.name }}</h5>
                <button type="button" class="btn btn-danger" @click="deleteCollection(collection.id)">Delete</button>
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
        deleteCollection(collectionId){
            this.$emit('delete', collectionId);
            // console.log(collectionId);
        }
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
