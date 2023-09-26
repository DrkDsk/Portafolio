<script setup>
import ShowProject from "@/Pages/Project/ShowProject.vue";

defineProps({
    projects : Object
})
</script>

<template>
    <div class="m-4 flex flex-col px-4">
        <p class="text-4xl text-sky-800 text-center mb-8">Proyectos destacados</p>
        <div class="grid grid-cols-2 w-11/12 mx-auto gap-6 px-4">
            <ShowProject v-for="project in projects" v-bind:id="project.id" :project="project"></ShowProject>
        </div>
    </div>
</template>

<style scoped>

</style>
