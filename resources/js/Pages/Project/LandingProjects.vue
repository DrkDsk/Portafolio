<script setup>

import CardProject from "@/Pages/Project/CardProject.vue";

let props = defineProps({
    projects: {
        type: Object
    },
    title: {
        type: String
    },
    routeTo: {
        type: String
    }
})

</script>

<template>
    <div id="projects" class="m-4 flex flex-col px-4">
        <p class="text-5xl text-sky-800 font-bold text-center mb-8">{{title}}</p>
        <div class="grid grid-cols-1 md:grid-cols-2 w-11/12 mx-auto gap-6 px-4">
            <CardProject :route-to="routeTo" v-for="project in projects" v-bind:id="project.id" :project="project"></CardProject>
        </div>
    </div>
</template>

<style scoped>

</style>
