<template>
    <div class="container py-3" v-if="cabin">
        <Header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">{{ cabin.title }}</h1>
                <p class="fs-5 text-muted">
                    <router-link to="/">Страница со списком лайнеров</router-link>
                    -
                    <router-link :to="`/edit/${cabin.ship_id}`">Страница редактирования лайнера</router-link>
                    - Страница редактирования категории
                </p>
            </div>
        </Header>
        <main>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-thumbnail w-100" :src="JSON.parse(cabin.photos)">
                </div>
                <div class="col-md-6">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Редактирования категории</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="d-flex justify-content-between">
                                    <div class="text-muted">Наименование</div>
                                    <input class="form-control w-75" type="text" v-model="cabin.title">
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div class="text-muted">Код</div>
                                    <input class="form-control w-75" type="text" v-model="cabin.vendor_code">
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div class="text-muted">Лайнер</div>
                                    <select v-model="cabin.ship_id" class="form-control w-75">
                                        <option v-for="option in ships" :value="option.id">
                                            {{ option.title }}
                                        </option>
                                    </select>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div class="text-muted">Описание</div>
                                    <textarea class="form-control w-75" rows="10" type="text"
                                              v-model="cabin.description"></textarea>
                                </li>
                            </ul>
                            <div class="w-100 btn btn-lg btn-primary" @click="updateCabin">Сохранить</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <Footer></Footer>
    </div>
</template>

<script>
import * as api from '../services/api.js';
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
//import CabinPopup from "./CabinPopup.vue";
import 'vue3-carousel/dist/carousel.css';
import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel';
import {createToast} from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css';

export default {
    data() {
        return {
            cabin_id: null,
            cabin: null,
            ships: [],
            toast: {
                position: 'bottom-right',
                type: 'success',
                transition: 'zoom',
                showIcon: true,
            }
        }
    },
    components: {
        Header, Footer,
        Carousel,
        Slide,
        Pagination,
        Navigation,
        //CabinPopup
    },
    created() {
        this.cabin_id = this.$route.params.id;
    },
    mounted() {
        this.getCabin(this.cabin_id);
        this.getShips();
    },
    methods: {
        updateCabin() {
            setTimeout(() => {
                api.updateCabin(this.cabin_id, this.cabin).then(() => {
                    createToast('Данные сохранены',
                        {
                            ...this.toast,
                        })
                    this.getCabin(this.cabin_id);
                })
            }, 200);
        },
        getCabin(cabin_id) {
            api.getCabin(cabin_id).then((r) => {
                this.cabin = r.data;
            })
        },
        getShips() {
            api.getShips().then((r) => {
                this.ships = r.data;
            })
        },
    }
}
</script>

<style scoped>
.list-unstyled li {
    margin-bottom: 10px;
}
</style>
