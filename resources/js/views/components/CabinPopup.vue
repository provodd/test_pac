<template>
    <div v-if="isOpen" class="modal" style="display: block" tabindex="-1" ref="popup">
        <div class="modal-dialog">
            <div class="modal-content" v-if="cabin">
                <div class="modal-header">
                    <h2>{{cabin.title}}</h2>
                    <button type="button" class="btn-close" @click="close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img v-if="cabin.photos" :src="JSON.parse(cabin.photos)" class="w-100 img-thumbnail">
                    <div v-html="cabin.description" class="my-2"></div>
                </div>
            </div>
            <div class="modal-content" v-else>
                <div class="modal-body">
                    <h3>Загрузка...</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import * as api from '../../services/api.js';

export default {
    name: 'Popup',
    data() {
        return {
            isOpen: false,
            dontClose: false,
            cabin: null
        }
    },
    popupController: null,
    methods: {
        open(id) {
            this.cabin = null;
            this.isOpen = true;
            api.getCabin(id).then((r) => {
                this.cabin = r.data;
                let resolve;
                let reject;
                const popupPromise = new Promise((ok, fail) => {
                    resolve = ok;
                    reject = fail;
                });

                this.$options.popupController = {resolve, reject};
                return popupPromise;
            })
        },
        close() {
            this.$options.popupController.resolve(false);
            this.isOpen = false;
        }
    }
}
</script>

<style scoped>
.modal {
    z-index: 100 !important;
    background-color: rgba(0, 0, 0, 0.5);
}
</style>
