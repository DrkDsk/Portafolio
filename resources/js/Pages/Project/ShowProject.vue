<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Navigation } from 'vue3-carousel'

let props = defineProps({
    project : Object,
    images: Object,
    type: Object,
    technologiesProject: Object
})

const arrayOfImages = props.images
</script>

<template>
    <div class="mt-8">
        <Carousel :wrap-around="true">
            <Slide v-for="slide in arrayOfImages" :key="slide">
                <img alt="" class="img-height md:w-11/12 object-fill" loading="lazy" :src="slide.fullImagePath">
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>
    </div>
    <div class="flex flex-col w-1/2 bg-white my-10 ml-16 p-4 shadow-md border gap-2">
        <p class="text-gray-700 text-2xl font-extrabold">
            {{project.name}}
        </p>
        <p class="text-gray-700 text-lg font-extrabold capitalize">
            {{project.description}}
        </p>
        <div class="flex flex-row items-center gap-2 mt-2" v-if="project.github_link">
            <div><img src="/assets/social_networks/github-mark.png" width="30" alt=""></div>
            <a :href="project.github_link" target="_blank" class="underline text-blue-500 text-xl font-extrabold">
                Ver código
            </a>
        </div>
        <div class="mt-3 flex flex-col gap-2">
            <p class="font-bold text-2xl text-gray-800">Técnologias:</p>
            <ol>
                <li v-for="(technologyProject, index) in technologiesProject" v-bind:id="index" class="text-gray-700 text-lg font-bold italic">
                    {{index+1}}.- {{technologyProject.technology.name}}
                </li>
            </ol>
        </div>
    </div>
</template>

<style scoped>
.img-height {
    height: 650px;
}
</style>
