<script setup>

import {useForm} from "@inertiajs/vue3";
import {readonly} from "vue";
import Multiselect from '@vueform/multiselect';
import Header from "@/Layouts/LandingPage/Header.vue";

let props = defineProps({
    technologies: Object,
    typesOfProjects: Object
})

let formProject = useForm({
    technologies: null,
    name: '',
    description: '',
    creation_year : 0,
    creation_month : 0,
    type: null
})

const optionsTechnologies = [];

readonly(props.technologies.map((technology) => optionsTechnologies.push({ value: technology.id, label: technology.name })));

const submitForm = () => {

}

</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<template>
    <Header>
        <div class="font-sans w-full min-h-screen justify-center flex items-center h-full top-0 backdrop-filter backdrop-blur-lg">
            <div class="px-6 p-2 bg-white relative justify-center items-center w-1/2 m-auto h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg: mx-5 lg:h-1/3 rounded-3xl filter drop-shadow-2xl">
                <div class="mt-3  sm:mt-5">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Registrar proyecto
                    </h1>
                </div>
                <div class="mt-1 sm:mt-8">
                    <form @submit.prevent="" class="flex-col flex text-gray-700">
                        <label for="technologies" class="text-gray-700 mb-1">Tecnologías</label>
                        <Multiselect class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" v-model="formProject.technologies" :taggable="true" :options="optionsTechnologies" searchable mode="tags" placeholder="Seleccionar opciones"></Multiselect>

                        <label for="name" class="text-gray-700 mt-5 mb-1">Nombre</label>
                        <input v-model="formProject.name" type="text" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" />

                        <label for="description" class="text-gray-700 mt-5 mb-1">Descripción</label>
                        <textarea rows="6" v-model="formProject.description" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none"/>

                        <label for="type" class="text-gray-700 mt-1 mt-5 mb-1">Tipo</label>
                        <select v-model="formProject.type" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none">
                            <option :value="null" disabled>Selecciona una opción</option>
                            <option v-for="typeOfProject of typesOfProjects" :value="typeOfProject.id">{{typeOfProject.name}}</option>
                        </select>
                    </form>
                </div>
                <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex p-4">
                    <button class="bg-blue-600 text-gray-100 rounded-md h-8 sm:h-auto sm:rounded-lg w-20 sm:w-52 p-1 text-lg sm:text-md sm:p-3">
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </Header>
</template>

<style scoped>

</style>
