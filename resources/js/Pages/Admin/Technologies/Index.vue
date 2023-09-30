<script setup>

import ShowTechnology from "@/Pages/Admin/Technologies/ShowTechnology.vue";

defineProps({
    technologies : Object
})

</script>

<template>
    <div id="projects" class="m-4 flex flex-col px-4">
        <p class="text-4xl text-sky-800 text-center mb-8">Tecnologías</p>
        <div class="grid grid-cols-2 w-11/12 mx-auto gap-6 px-4">
            <ShowTechnology v-for="technology in technologies" v-bind:id="technology.id" :technology="technology"></ShowTechnology>
        </div>
    </div>
</template>

<style scoped>

</style>
