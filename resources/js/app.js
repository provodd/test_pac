import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import "./bootstrap.js";
import '../css/app.css';

import axios from 'axios'
import VueAxios from 'vue-axios'
import { createApp } from 'vue';
import router from "./router/router";
import store from "./store/store.js";


const app = createApp({

});

app.use(router).use(store).mount('#app');
