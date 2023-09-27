<template>
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="XNo5Ab" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAq1BMVEW5xd6FnMl0j8Jrib96lMWmttbr7vX///+Zq9BbfblLcrVmhb0VVagdWKkARqOxv9sATaUASaTa4O2PpMwhWqolXKsEUaYAT6Y4Zq/DzePQ2On4+fxUeLcAPJ/+38n8tXv8sXP+28H8vYz9zaj+8ej8s3f+69390K/8qF7+59f8rGj9wZP7gAD7gQD7fQD7hgD7nEL/9/L7igD7jxT8o1X8oE37kyf7mTr9yaBpfj7mAAACCElEQVR4AYzQ4W7DIAwEYLISX5PYqSEYErq9/2sOlK6rNmna/eEUPlnEzg1vl4sfCT3kh8HjEbpO8zS6haWF1wEtNxUJ8bzfVpbE3l3EJGgyvQLwnCw79PhilnW9NSAetCcLAHaZE29oOYIlcRTpBDiylYp74JHlHZ2mVKiXByC1fKDmXPekAKIaX/ECYgcYudAiSmjNlF7BxhYIi4TWmoRvAE+wxE1NZiCnhFvur5zE7AlMMltaCaRyQS0ydZD2b2DMarH1zCPumjKwSErfYL+OtfeNZfJeTKm/ITyBTDgzi4mIWen/YyX+AqHdqUrfQN+D/wliMSUiL7IAfffuBxhZ5v4lJwaOPm7a/PEC3oSHr0HA1oSwjm5SnU9Qynrr50dZjz5JNOcwuFhrPEGt9f44CT3xOCoc/s6/wGeXc3EgMAhEATS3X0UEiY+gYfuvbFkXXB7MTPNiYJfFAfDzuvXBYD+2c77ms4ObWCxElQMiE3M8+97K6TipmGGTfHoPKgjkLZ2G75M6oA52aBksTwBAtZ9tjwIUti/gUNtQCO+goFG/BFL6BfQY+vEhih5PJ1AFsn4BbUmmDvCSM+i5eP/3g+ZgMBzsUTso0AxNPzlsjgyAwfH8DioOwUHxJBv7plL8BEjccoJUWNkmylk2PJq04UU+QFxbvVFnTNXA5ccAvqYSYeoE4BVoPkzchbq6hgAAAABJRU5ErkJggg==" style="height:18px;width:18px" alt="" data-atf="1" data-frt="0">
                <span class="fs-4">&nbsp;Тестовое задание</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <router-link class="me-3 py-2 text-dark text-decoration-none" to="/">Lorem</router-link>
                <router-link class="me-3 py-2 text-dark text-decoration-none" to="/">Ipsum</router-link>
            </nav>
        </div>
        <slot></slot>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style scoped>

</style>
