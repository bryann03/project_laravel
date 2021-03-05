<template>
    <transition name="modal">
        <div class="modal-mask modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New collection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control" required id="recipient-name" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-danger" @click="$emit('close')">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
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
            obejctCollection:{
                name:'',
                image:''
            }
        };
    },
    created() {
        this.getApi({ruta: 'funkos_collection', nombreTabla: 'collection'});
    },
    methods: {
        insertCollection(){
            let me = this;
            axios
                .post('/funkos_collection', this.obejctCollection)
                .then( (response) => {

                })
                .cath( (error) => {
                    console.log(error);
                })
        }
    }
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

</style>
