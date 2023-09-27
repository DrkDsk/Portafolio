<script setup>
let props = defineProps({
    project: Object
})

const cover = props.project.project_images[0]?.fullImagePath ?? "/assets/img/default.jpg"

</script>

<template>
    <div class="rounded-md bg-white shadow-md border px-4 py-6">
        <div class="flex flex-col">
            <div> <img loading="lazy" :src=cover alt="" class="h-96 w-full object-cover object-center"> </div>
            <div class="gap-1 mt-3">
                <p class="text-black text-2xl font-bold">{{project.name}}</p>
                <p class="text-black font-thin text-md capitalize">{{project.project_type.name}}</p>
                <p class="text-black font-medium text-md">{{project.description}}</p>
                <a v-if="project.github_link" :href="project.github_link" target="_blank" class="text-md text-blue-500 font-semibold underline">ver código</a>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
