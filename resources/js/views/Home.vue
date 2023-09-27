<template>
    <div class="container py-3">
        <Header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">MSC</h1>
                <p class="fs-5 text-muted">Страница со списком лайнеров</p>
            </div>
        </Header>
        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" v-if="ships">

                <div v-for="ship in ships" :key="ship.id" class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{ship.title}}</h4>
                        </div>
                        <div class="card-body">
                           <ul class="list-unstyled mt-3 mb-4">
                                <li v-for="item in JSON.parse(ship.spec).sort()" class="d-flex justify-content-between">
                                    <div class="text-muted">{{item.name}}</div>
                                    <div>{{item.value}}</div>
                                </li>
                            </ul>
                            <div class="mt-3 mb-4" style="text-align: justify;" v-html="ship.description.slice(0,320) + ' ...'"></div>
                            <router-link :to="`/edit/${ship.id}`" class="w-100 btn btn-lg btn-primary">Редактировать</router-link>
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

export default {
    data(){
        return{
            ships: []
        }
    },
    components: {
        Header, Footer
    },
    mounted() {
      this.getShips();
    },
    methods:{
        getShips(){
            api.getShips().then((r)=>{
                this.ships = r.data;
            })
        }
    }
}
</script>

<style scoped>

</style>
