<template>
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="XNo5Ab"
                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAq1BMVEW5xd6FnMl0j8Jrib96lMWmttbr7vX///+Zq9BbfblLcrVmhb0VVagdWKkARqOxv9sATaUASaTa4O2PpMwhWqolXKsEUaYAT6Y4Zq/DzePQ2On4+fxUeLcAPJ/+38n8tXv8sXP+28H8vYz9zaj+8ej8s3f+69390K/8qF7+59f8rGj9wZP7gAD7gQD7fQD7hgD7nEL/9/L7igD7jxT8o1X8oE37kyf7mTr9yaBpfj7mAAACCElEQVR4AYzQ4W7DIAwEYLISX5PYqSEYErq9/2sOlK6rNmna/eEUPlnEzg1vl4sfCT3kh8HjEbpO8zS6haWF1wEtNxUJ8bzfVpbE3l3EJGgyvQLwnCw79PhilnW9NSAetCcLAHaZE29oOYIlcRTpBDiylYp74JHlHZ2mVKiXByC1fKDmXPekAKIaX/ECYgcYudAiSmjNlF7BxhYIi4TWmoRvAE+wxE1NZiCnhFvur5zE7AlMMltaCaRyQS0ydZD2b2DMarH1zCPumjKwSErfYL+OtfeNZfJeTKm/ITyBTDgzi4mIWen/YyX+AqHdqUrfQN+D/wliMSUiL7IAfffuBxhZ5v4lJwaOPm7a/PEC3oSHr0HA1oSwjm5SnU9Qynrr50dZjz5JNOcwuFhrPEGt9f44CT3xOCoc/s6/wGeXc3EgMAhEATS3X0UEiY+gYfuvbFkXXB7MTPNiYJfFAfDzuvXBYD+2c77ms4ObWCxElQMiE3M8+97K6TipmGGTfHoPKgjkLZ2G75M6oA52aBksTwBAtZ9tjwIUti/gUNtQCO+goFG/BFL6BfQY+vEhih5PJ1AFsn4BbUmmDvCSM+i5eP/3g+ZgMBzsUTso0AxNPzlsjgyAwfH8DioOwUHxJBv7plL8BEjccoJUWNkmylk2PJq04UU+QFxbvVFnTNXA5ccAvqYSYeoE4BVoPkzchbq6hgAAAABJRU5ErkJggg=="
                     style="height:18px;width:18px" alt="" data-atf="1" data-frt="0">
                <small class="d-block mb-3 text-muted">© 2023</small>
            </div>
            <div class="col-6 col-md">
                <h5>Лайнеры</h5>
                <ul class="list-unstyled text-small" v-if="ships">
                    <li class="mb-1" v-for="item in ships" :key="item.id">
                        <router-link class="link-secondary text-decoration-none" :to="`/edit/${item.id}`">
                            {{ item.title }}
                        </router-link>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Каюты</h5>
                <ul class="list-unstyled text-small" v-if="cabins">
                    <li class="mb-1" v-for="item in cabins" :key="item.id">
                        <router-link class="link-secondary text-decoration-none" :to="`/cabin/edit/${item.id}`">
                            {{ item.title }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</template>

<script>
import * as api from '../../services/api.js';

export default {
    data() {
        return {
            cabins: null,
            ships: null,
        }
    },
    name: 'Footer',
    mounted() {
        api.getCabins().then((r) => {
            this.cabins = r.data;
        })
        api.getShips().then((r) => {
            this.ships = r.data;
        })
    }
}
</script>

<style scoped>

</style>
