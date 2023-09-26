<script setup>

import Header from "@/Layouts/LandingPage/Header.vue";
import Landing from "@/Layouts/LandingPage/Landing.vue";
import ShowProject from "@/Pages/Project/ShowProject.vue";
import LandingProjects from "@/Pages/Project/LandingProjects.vue";

let props = defineProps({
    projects : Object,
    myInfo  : Object
})

</script>

<template>
    <Header>
        <Landing :my-info="myInfo"></Landing>
        <LandingProjects id="projects" :projects="projects"></LandingProjects>
    </Header>
</template>

<style scoped>

</style>
