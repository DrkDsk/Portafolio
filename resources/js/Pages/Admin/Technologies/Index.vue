<script setup>

import ShowAdminTechnology from "@/Pages/Admin/Technologies/ShowAdminTechnology.vue";
import Header from "@/Layouts/LandingPage/Header.vue";

defineProps({
    technologies: {
        type : Object
    }
})

</script>

<template>
    <Header>
        <div id="projects" class="m-4 flex flex-col px-4">
            <p class="text-4xl text-sky-800 text-center mb-8">Tecnologías</p>
            <div class="grid grid-cols-2 w-11/12 mx-auto gap-6 px-4">
                <ShowAdminTechnology v-for="technology in technologies" v-bind:id="technology.id" :technology="technology"></ShowAdminTechnology>
            </div>
        </div>
    </Header>
</template>

<style scoped>

</style>
