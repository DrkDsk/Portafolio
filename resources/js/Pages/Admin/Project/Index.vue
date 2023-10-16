<script setup>

import Header from "@/Layouts/Header.vue";
import LandingProjects from "@/Pages/Project/LandingProjects.vue";
import CreateButton from "@/Layouts/Buttons/CreateButton.vue";

let props = defineProps({
    projects : {
        type: Object
    },
    showCreateProjectButton:{
        type: Boolean
    }
})

</script>

<template>
    <Header>
        <div class="flex flex-row justify-end mr-8" v-if="showCreateProjectButton">
            <CreateButton :link="route('admin.projects.create')" title="Crear proyecto"></CreateButton>
        </div>
        <p class="text-4xl text-sky-800 text-center mb-8">Proyectos</p>
        <LandingProjects route-to="admin.projects.show" id="projects" :projects="projects"></LandingProjects>
    </Header>
</template>

<style scoped>

</style>
