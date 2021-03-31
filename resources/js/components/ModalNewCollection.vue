<template>
    <transition name="modal">
        <div class="modal-mask modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ titleModal }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action>
                            <div v-if="actionApi === 'insert'" class="form-group">
                                <input type="text" class="form-control mb-2" required id="recipient-name" placeholder="Name" v-model="objectCollection.name" >
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" @change="onFileChange" >
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                            </div>

                            <div v-else-if="actionApi === 'update'" class="form-group">
                                <input type="text" class="form-control mb-2" required id="recipient-name" placeholder="Name" v-model="objectCollection.name" >
                                <div class="row">
                                    <div class="col-12 col-md-6 mt-3">
                                        <img :src="objectCollection.imagen" :alt="objectCollection.name" class="img-fluid" >
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <label class="btn btn-primary" for="customFile">Change image</label>
                                            </div>
                                            <input type="file" class="custom-file-input" id="customFile" @change="onFileChange">
                                            <div class="col-12 mb-5">
                                                <button class="btn btn-warning" @click="$emit('close')" type="button">Cancel</button>
                                            </div>
                                            <div class="col-12">
                                                <button v-if="actionApi === 'delete'" type="button" class="btn btn-danger" @click="deleteCollection(objectInfo.id)">Delete</button>
                                                <button v-else-if="actionApi === 'insert'" type="button" class="btn btn-success" @click="insertCollection()">Add</button>
                                                <button v-else-if="actionApi === 'update'" type="button" class="btn btn-success" >Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else-if="actionApi === 'delete'" class="form-group">
                                <h5 >Dou you want remove the <strong>{{ objectInfo.name }} </strong> collection?</h5>
                                <img :src="objectInfo.imagen" :alt="objectInfo.name" class="img-fluid" >
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-warning" @click="$emit('close')">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button v-if="actionApi === 'delete'" class="btn btn-danger" @click="deleteCollection(objectInfo.id)">Delete</button>
                                <button v-else-if="actionApi === 'insert'" class="btn btn-success" @click="insertCollection()">Add</button>
                                <button v-else-if="actionApi === 'update'" class="btn btn-success" >Save</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data(){
        return{
            showModal: false,
            titleModal: '',
            objectCollection:{
                name:'',
                imagen:''
            }
        };
    },
    created(){
        switch (this.actionApi) {
            case 'delete':
                this.titleModal = 'Delete collection';
                break;
            case 'insert':
                this.titleModal = 'New collection';
                break;
            case 'update':
                this.titleModal = 'Update collection';
                this.objectCollection['name'] = this.objectInfo['name'];
                this.objectCollection['imagen'] = this.objectInfo['imagen'];
                break;
            default:
                break;
        }
    },
    methods: {
        onFileChange(e){
            let files = e.target.files || e.dataTransfer.files;
            if (files.length > 0){
                this.objectCollection.imagen = "http://localhost:80/images/" + files[0]['name'];
                // console.log(files[0]['name']);
                return;
            }
        },
        insertCollection(){
            axios.post('/funkos_collection', this.objectCollection)
                .then( (response) => {
                    // console.log(response);
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        deleteCollection(collectionId){
            let me = this;
            axios.delete("/funkos_collection/" + collectionId)
                .then( (result) => {
                    me.$emit('refreshData');
                    me.$emit('messageInfo', {message: 'The collection has been successfully deleted!'});
                    me.$emit('close');
                }).catch((err) => {
                    console.log(err);
                });
        }
    },
    props:['actionApi', 'objectInfo']
}
</script>

<style lang="css">
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
    justify-content:center;
    align-items:center;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

.modal-content{
    max-height: calc(100vh - 100px);
    overflow-y: auto;
}

</style>
