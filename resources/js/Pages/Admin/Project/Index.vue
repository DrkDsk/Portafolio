<script setup>

import Header from "@/Layouts/LandingPage/Header.vue";
import LandingProjects from "@/Pages/Project/LandingProjects.vue";

let props = defineProps({
    projects : {
        type: Object
    }
})

</script>

<template>
    <Header>
        <LandingProjects route-to="admin.projects.show" id="projects" :projects="projects"></LandingProjects>
    </Header>
</template>

<style scoped>

</style>
