<script setup>

import ShowAdminTechnology from "@/Pages/Admin/Technologies/ShowAdminTechnology.vue";
import Header from "@/Layouts/Header.vue";
import CreateButton from "@/Layouts/Buttons/CreateButton.vue";

defineProps({
    technologies: {
        type : Object
    },
    showCreateTechnologyButton:{
        type: Boolean
    }
})

</script>

<template>
    <Header>
        <div id="projects" class="m-4 flex flex-col px-4">
            <div class="flex flex-row justify-end mr-8" v-if="showCreateTechnologyButton">
                <CreateButton :link="route('admin.technologies.create')" title="Crear Tecnología"></CreateButton>
            </div>
            <p class="text-4xl text-sky-800 text-center mb-8">Tecnologías</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mx-auto gap-6 px-4">
                <ShowAdminTechnology v-for="technology in technologies" v-bind:id="technology.id" :technology="technology"></ShowAdminTechnology>
            </div>
        </div>
    </Header>
</template>

<style scoped>

</style>
