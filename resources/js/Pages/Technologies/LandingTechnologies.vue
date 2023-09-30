<script setup>
import ShowTechnology from "@/Pages/Technologies/ShowTechnology.vue";

let props = defineProps({
    technologies: Object
})
</script>

<template>
    <div class="flex flex-col w-10/12 mx-auto mb-8" id="skills">
        <div class="flex flex-row mx-auto justify-center my-4">
            <p class="text-sky-800 text-4xl">Habilidades y Tecnologías</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <ShowTechnology v-for="technology in technologies" v-bind:id="technology.id" :technology="technology"></ShowTechnology>
        </div>
    </div>
</template>

<style scoped>

</style>
