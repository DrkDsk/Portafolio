<script setup>
let props = defineProps({
    project : Object
})
</script>

<template>
    <div class="flex flex-col w-8/12 bg-white p-4 shadow-md border mx-auto gap-2">
        <p class="text-gray-700 text-xl font-extrabold">
            Nombre: <span class="text-lg italic font-medium">{{project.name}}</span>
        </p>
        <p class="text-gray-700 text-xl font-extrabold">
            Descripción: <span class="text-lg italic font-medium">{{project.description}}</span>
        </p>
        <div class="flex flex-row items-center gap-2 mt-2" v-if="project.github_link">
            <div><img src="/assets/social_networks/github-mark.png" width="30" alt=""></div>
            <a :href="project.github_link" target="_blank" class="underline text-blue-500 text-xl font-extrabold">
                Ver código
            </a>
        </div>
    </div>
</template>

<style scoped>

</style>
