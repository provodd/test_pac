<template>
    <div class="container py-3">
        <Header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">{{ ship.title }}</h1>
                <p class="fs-5 text-muted"><router-link to="/">Страница со списком лайнеров</router-link> - Страница редактирования лайнера</p>
                <Carousel :items-to-show="gallery.length-1" :wrap-around="true">

                    <Slide v-for="slide in gallery" :key="slide.id">
                        <div class="carousel__item">
                            <img height="200" :src="slide.url" alt="" class="src">
                        </div>
                    </Slide>

                    <template #addons>
                        <Navigation />
                        <Pagination />
                    </template>
                </Carousel>
            </div>
        </Header>
        <main>
            <CabinPopup ref="popup">
                123
            </CabinPopup>
            <div class="row row-cols-1 row-cols-md-4 mb-3 text-center" v-if="Object.keys(ship).length >0">
                <div class="col col-md-5">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Технические характеристики</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4" v-if="specifications">
                                <li v-for="item in specifications" class="my-2 d-flex justify-content-between">
                                    <div class="text-muted">{{ item.name }}</div>
                                    <input class="form-control w-50" type="text" v-model="item.value">
                                </li>
                            </ul>
                            <div class="w-100 btn btn-lg btn-primary" @click="updateSpecifications">Сохранить</div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-7">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Каюты</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4" v-if="cabins">
                                <tr v-for="item in cabins" class="d-flex justify-content-between">
                                    <td class="col-md-2"><span class="badge bg-light text-dark">{{ item.vendor_code }}</span></td>
                                    <td class="col-md-2" style="min-height: 90px">
                                        <img class="img-thumbnail" width="90" v-if="Object.keys(JSON.parse(item.photos)).length>0"
                                             :src="JSON.parse(item.photos)">
                                    </td>
                                    <td class="col-md-5 cabin-title text-muted cursor-pointer" @click="showCabin(item.id)">
                                        <span class="blink">&#10142;</span> {{ item.title }}
                                    </td>
                                    <td class="col-md-2">
                                        <router-link :to="`/cabin/edit/${item.id}`" class="text-primary">
                                            Изменить
                                        </router-link>
                                    </td>
                                </tr>
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Описание</h4>
                        </div>
                        <div class="card-body" v-if="ship">
                            <textarea @change="updateDescription" class="w-100" rows="15" v-model="description"></textarea>
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
import CabinPopup from "./components/CabinPopup.vue";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import {createToast} from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css';

export default {
    data() {
        return {
            ship_id: null,
            ship: {},
            gallery: [],
            cabins: [],
            specifications: [],
            description : null,
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
        CabinPopup
    },
    created() {
        this.ship_id = this.$route.params.id;
    },
    mounted() {
        this.getShip(this.ship_id);
        this.getGallery(this.ship_id);
        this.getCabinsByShip(this.ship_id);
    },
    methods: {
        showCabin(id){
            this.$refs.popup.open(id);
        },
        updateSpecifications(){
            api.updateSpecifications(this.ship_id, this.specifications).then(()=>{
                createToast('Данные сохранены',
                    {
                        ...this.toast,
                    })
                this.getShip(this.ship_id);
            })
        },
        updateDescription(){
            setTimeout(()=>{
                api.updateDescription(this.ship_id, this.description).then(()=>{
                    createToast('Данные сохранены',
                        {
                            ...this.toast,
                        })
                    this.getShip(this.ship_id);
                })
            }, 200);
        },
        getShip(ship_id) {
            api.getShip(ship_id).then((r) => {
                this.description = r.data.description;
                this.ship = r.data;
                this.specifications = JSON.parse(r.data.spec);
            })
        },
        getGallery(ship_id) {
            api.getGallery(ship_id).then((r) => {
                this.gallery = r.data;
            })
        },
        getCabinsByShip(ship_id) {
            api.getCabinsByShip(ship_id).then((r) => {
                this.cabins = r.data;
            })
        }
    }
}
</script>

<style scoped>
    .cabin-title:hover{
        color: blue !important;
    }
    .blink {
        animation: blink 1.5s infinite; /* Параметры анимации */
    }
    @keyframes blink {
        from { opacity: 1; /* Непрозрачный текст */ }
        to { opacity: 0.3; /* Прозрачный текст */ }
    }
</style>
