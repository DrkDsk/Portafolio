<script setup>

import Header from "@/Layouts/Header.vue";
import Landing from "@/Layouts/LandingPage/Landing.vue";
import LandingProjects from "@/Pages/Project/LandingProjects.vue";
import AboutMe from "@/Pages/AboutMe.vue";
import LandingTechnologies from "@/Pages/Technologies/LandingTechnologies.vue";
import Contact from "@/Pages/Contact.vue";

let props = defineProps({
    projects : Object,
    technologies: Object,
    myInfo  : Object,
    cvPath: String
})

</script>

<template>
    <Header>
        <Landing :my-info="myInfo"></Landing>
        <AboutMe :cv-path="cvPath"></AboutMe>
        <div class="my-8"></div>
        <LandingProjects route-to="project.show" title="Proyectos Destacados" :projects="projects"></LandingProjects>
        <div class="my-8"></div>
        <LandingTechnologies :technologies="technologies"></LandingTechnologies>
        <Contact :my-info="myInfo"></Contact>
    </Header>
</template>

<style scoped>

</style>
