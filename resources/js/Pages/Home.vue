<script setup>

import Header from "@/Layouts/LandingPage/Header.vue";
import Landing from "@/Layouts/LandingPage/Landing.vue";
import LandingProjects from "@/Pages/Project/LandingProjects.vue";
import AboutMe from "@/Pages/AboutMe.vue";

let props = defineProps({
    projects : Object,
    myInfo  : Object
})

</script>

<template>
    <Header>
        <Landing :my-info="myInfo"></Landing>
        <AboutMe></AboutMe>
        <div class="my-8"></div>
        <LandingProjects title="Proyectos Destacados" :projects="projects"></LandingProjects>
    </Header>
</template>

<style scoped>

</style>
