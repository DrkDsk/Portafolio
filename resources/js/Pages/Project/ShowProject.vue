<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Navigation } from 'vue3-carousel'
import Header from "@/Layouts/Header.vue";
import {computed} from "vue";

let props = defineProps({
    project: {
        type: Object
    },
    images: {
        type: Object
    },
    type: {
        type: Object
    },
    technologiesProject: {
        type: Object
    },
    showMarkdown:{
        type: Boolean
    },
    markdownContent: {
        type: null
    }
})

const arrayOfImages = props.images.slice(1)
const monthFormat = computed( () =>  {
    const month = props.project.creation_month
    return month < 10 ? `0${month}` : `${month}`;
})

</script>

<template>
    <Header>
        <div class="mt-8">
            <Carousel :wrap-around="true">
                <Slide v-for="slide in arrayOfImages" :key="slide">
                    <img alt="" class="img-height md:w-11/12 object-fill" loading="lazy" :src="slide.imagePath">
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>
        <div class="flex flex-col w-10/12 md:w-11/12 bg-white my-10 ml-16 p-4 shadow-md border gap-2">
            <p class="text-gray-700 text-4xl font-extrabold">
                {{project.name}}
            </p>

            <div class="flex flex-row gap-4">
                <p class="text-gray-700 text-lg font-extrabold capitalize">
                    FECHA DE INICIO:
                </p>
                <p class="text-gray-600 text-lg font-extrabold capitalize italic">
                    {{monthFormat}}/{{project.creation_year}}
                </p>
            </div>

            <p class="text-gray-700 text-lg font-extrabold text-justify pr-8 my-2">
                {{project.description}}
            </p>

            <div class="flex flex-row items-center gap-2 mt-2" v-if="project.github_link">
                <div><img src="/assets/social_networks/github-mark.png" width="30" alt=""></div>
                <a :href="project.github_link" target="_blank" class="underline text-blue-500 text-xl font-extrabold">
                    Ver código
                </a>
            </div>
            <div class="mt-3 flex flex-col gap-2">
                <p class="font-bold text-2xl text-neutral-800">Técnologias:</p>
                <div class="flex flex-row gap-4">
                    <div class="flex flex-col gap-2 mr-4" v-for="(technologyProject, index) in technologiesProject" v-bind:id="index">
                        <p class="text-neutral-600 font-bold text-2xl mx-auto">{{technologyProject.technology.name}}</p>
                        <img alt="" width="250" class="object-cover object-center" :src="technologyProject.technology.imagePath">
                    </div>
                </div>
            </div>
            <div class="w-1/2 mx-auto" v-if="showMarkdown">
                <div v-html="markdownContent"></div>
            </div>
        </div>
    </Header>
</template>

<style scoped>
.img-height {
    height: 650px;
}
</style>
