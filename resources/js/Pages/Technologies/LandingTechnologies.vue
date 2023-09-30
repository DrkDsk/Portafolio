<script setup>
import ShowTechnology from "@/Pages/Technologies/ShowTechnology.vue";

let props = defineProps({
    technologies: Object
})
</script>

<template>
    <div class="m-4 flex flex-col px-4" id="skills">
        <div class="flex flex-row mx-auto justify-center my-4">
            <p class="text-sky-800 text-4xl">Habilidades y Tecnologías</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 w-11/12 mx-auto gap-6 px-4">
            <ShowTechnology v-for="technology in technologies" v-bind:id="technology.id" :technology="technology"></ShowTechnology>
        </div>
    </div>
</template>

<style scoped>

</style>
