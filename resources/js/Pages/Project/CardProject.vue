<script setup>
import {Link} from "@inertiajs/vue3";
import DeleteButton from "@/Layouts/Buttons/DeleteButton.vue";

let props = defineProps({
    project: {
        type: Object
    },
    routeTo: {
        type: String
    }
})

const cover = props.project.project_images[0]?.imagePath ?? "/assets/img/default.jpg"

</script>

<template>
    <div class="rounded-md bg-white shadow-md border px-4 py-6">
        <div class="flex flex-col">
            <Link :href="route(routeTo, props.project.id)"> <img loading="lazy" :src=cover alt="" class="h-96 w-full object-cover object-center"> </Link>
            <div class="gap-1 mt-3">
                <p class="text-black text-2xl font-bold">{{project.name}}</p>
                <p class="text-black font-thin text-md capitalize">{{project.project_type.name}}</p>
                <p class="text-black font-medium text-md text-justify pr-8 my-4">{{project.description}}</p>

                <div class="flex flex-row items-center gap-2 mt-2" v-if="project.github_link">
                    <div><img src="/assets/social_networks/github-mark.png" width="30" alt=""></div>
                    <a :href="project.github_link" target="_blank" class="text-md text-blue-500 font-semibold underline">ver código</a>
                </div>

                <div class="flex flex-row justify-end">
                    <DeleteButton delete-type="project" :url="route('admin.projects.destroy', project.id)"></DeleteButton>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
