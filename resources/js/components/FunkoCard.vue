<template>
    <main>
        <div class="card m-5" style="width: auto">
            <img :src="collection.imagen" class="card-img-top" :alt="collection.name">
            <div class="card-body">
                <h5 class="card-title">{{ collection.name }}</h5>
                <button type="button" class="btn btn-danger" @click="deleteCollection(collection, 'delete')">Delete</button>
                <button type="button" class="btn btn-primary" @click="updateCollection(collection, 'update')">Edit</button>
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
        deleteCollection(collection, apiAction){
            this.$emit('delete', { object: collection, action: apiAction } );
            // console.log(collectionId);
        },
        updateCollection(collection, apiAction){
            this.$emit('update', { object: collection, action: apiAction } );
            // console.log(collectionId);
        },
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
