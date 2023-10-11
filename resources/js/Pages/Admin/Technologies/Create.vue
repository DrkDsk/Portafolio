<script setup>

import Header from "@/Layouts/Header.vue";
import {useForm} from "@inertiajs/vue3";

let technologyForm = useForm({
    name : null,
    image: null,
    start_experience: null,
    finish_experience: null
})

const submitForm = () => {
    technologyForm.post(route('admin.technologies.store'))
}
</script>

<template>
    <Header>
        <div class="font-sans w-full min-h-screen justify-center flex items-center h-full top-0 backdrop-filter backdrop-blur-lg">
            <div class="px-6 p-2 bg-white relative justify-center items-center m-5 w-full h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg:mx-5 lg:h-1/3 rounded-3xl shadow-md border">
                <div class="mt-3 sm:mt-5">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Registrar Tecnología
                    </h1>
                </div>
                <div class="mt-1 sm:mt-8">
                    <form @submit.prevent="submitForm" class="flex-col flex text-gray-700" enctype="multipart/form-data">

                        <label for="name" class="text-gray-700 mt-5 mb-1">Nombre</label>
                        <input v-model="technologyForm.name" type="text" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" />

                        <label for="cover" class="text-gray-700 mt-1 mt-5 mb-1">Portada</label>
                        <input class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" type="file" @input="technologyForm.image = $event.target.files[0]">

                        <div class="flex flex-row justify-between gap-4">
                            <div class="flex flex-col">
                                <label for="start_experience" class="text-gray-700 mt-1 mt-5 mb-1">Fecha de inicio de experiencia</label>
                                <input v-model="technologyForm.start_experience" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" type="date" placeholder="Ingresa una fecha">
                            </div>

                            <div class="flex flex-col">
                                <label for="finish_experience" class="text-gray-700 mt-1 mt-5 mb-1">Fecha de fin de experiencia</label>
                                <input v-model="technologyForm.finish_experience" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" type="date" placeholder="Ingresa una fecha">
                            </div>
                        </div>

                        <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex mb-2">
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
