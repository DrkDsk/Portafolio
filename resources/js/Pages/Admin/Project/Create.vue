<script setup>

import {useForm} from "@inertiajs/vue3";
import {readonly} from "vue";
import Multiselect from '@vueform/multiselect';
import Header from "@/Layouts/LandingPage/Header.vue";
import { monthsArray, firstYearOfCreationProject }  from '@/Constants.js'

let props = defineProps({
    technologies: {
        type: Object
    },
    typesOfProjects: {
        type: Object
    }
})

let formProject = useForm({
    technologies: null,
    name: '',
    github: '',
    description: '',
    creation_year : 0,
    creation_month : 0,
    type: null,
    images: null,
    cover: null,
    readme: null
})

const optionsTechnologies = [];
const selectYearsOfCreation = []
const selectMonthsOfCreation = monthsArray

for (let i= firstYearOfCreationProject; i<=new Date().getFullYear(); i++) {
    selectYearsOfCreation.push(i)
}

readonly(props.technologies.map((technology) => optionsTechnologies.push({ value: technology.id, label: technology.name })));

const submitForm = () => {
    formProject.post(route('admin.projects.store'))
}


</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<template>
    <Header>
        <div class="font-sans w-full min-h-screen justify-center flex items-center h-full top-0 backdrop-filter backdrop-blur-lg">
            <div class="px-6 p-2 bg-white relative justify-center items-center m-5 w-full h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg:mx-5 lg:h-1/3 rounded-3xl shadow-md border">
                <div class="mt-3 sm:mt-5">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Registrar proyecto
                    </h1>
                </div>
                <div class="mt-1 sm:mt-8">
                    <form @submit.prevent="submitForm" class="flex-col flex text-gray-700" enctype="multipart/form-data">
                        <label for="technologies" class="text-gray-700 mb-1">Tecnologías</label>
                        <Multiselect class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" v-model="formProject.technologies" :taggable="true" :options="optionsTechnologies" searchable mode="tags" placeholder="Seleccionar opciones"></Multiselect>

                        <label for="name" class="text-gray-700 mt-5 mb-1">Nombre</label>
                        <input v-model="formProject.name" type="text" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" />

                        <label for="github" class="text-gray-700 mt-5 mb-1">Enlace de Git</label>
                        <input v-model="formProject.github" type="text" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" />

                        <label for="description" class="text-gray-700 mt-5 mb-1">Descripción</label>
                        <textarea rows="6" v-model="formProject.description" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none"/>

                        <div class="flex flex-row gap-2 mt-5 mb-1">
                            <div class="flex flex-col">
                                <label class="text-gray-700 mt-5 mb-1">Año de creación</label>
                                <select v-model="formProject.creation_year" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none0">
                                    <option disabled :value="null">Selecciona un año de creación del proyecto</option>
                                    <option v-for="year of selectYearsOfCreation" :value="year">{{year}}</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="text-gray-700 mt-5 mb-1">Mes de creación</label>
                                <select v-model="formProject.creation_month" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none0">
                                    <option disabled :value="null">Selecciona un año de creación del proyecto</option>
                                    <option v-for="month of selectMonthsOfCreation" :value="month.value">{{month.name}}</option>
                                </select>
                            </div>
                        </div>

                        <label for="type" class="text-gray-700 mt-1 mt-5 mb-1">Tipo</label>
                        <select v-model="formProject.type" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none capitalize">
                            <option :value="null" disabled>Selecciona una opción</option>
                            <option v-for="typeOfProject of typesOfProjects" :value="typeOfProject.id">{{typeOfProject.name}}</option>
                        </select>

                        <label for="type" class="text-gray-700 mt-1 mt-5 mb-1">Imágenes</label>
                        <input type="file" @input="formProject.images = $event.target.files" multiple>

                        <label for="cover" class="text-gray-700 mt-1 mt-5 mb-1">Portada</label>
                        <input type="file" @input="formProject.cover = $event.target.files[0]">

                        <label for="readme" class="text-gray-700 mt-1 mt-5 mb-1">Readme</label>
                        <input type="file" @input="formProject.readme = $event.target.files[0]">

                        <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex p-4">
                            <button class="bg-blue-600 text-gray-100 rounded-md text-lg text-md py-1.5 px-8">
                                Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Header>
</template>

<style scoped>

</style>
