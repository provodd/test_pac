import './bootstrap';
import {createApp} from 'vue';

import axios from 'axios'
import VueAxios from 'vue-axios'
import vuex from './store/store.js';
import router from "./router/router.js";
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

const app = createApp({

});
app.use(VueAxios, axios);
app.use(vuex);
app.use(router);
app.provide('axios', app.config.globalProperties.axios)
app.mount('#app');
