import {createRouter, createWebHistory} from "vue-router";
import Home from "/resources/js/views/Home.vue";
import ShipEditing from "/resources/js/views/ShipEditing.vue";
import CabinEditing from "/resources/js/views/CabinEditing.vue";

const routes = [
    {
        path: '/', name: 'Home', component: Home
    },
    {
        path: '/edit/:id', name: 'EditShip', component: ShipEditing
    },
    {
        path: '/cabin/edit/:id', name: 'EditCabin', component: CabinEditing
    }
]
const router = createRouter({
    routes,
    history: createWebHistory()
})
export default router
