<script setup>

import {useForm} from "@inertiajs/vue3";

let formProject = useForm({
    name: '',
    description: '',
    creation_year : 0,
    creation_month : 0,
    type: ''
})

</script>

<template>
    <div class="font-sans w-full min-h-screen justify-center flex items-center h-full top-0 backdrop-filter backdrop-blur-lg">
        <div class="px-6 p-2 bg-white relative justify-center items-center w-1/2 m-auto h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg: mx-5 lg:h-1/3 rounded-3xl filter drop-shadow-2xl">
            <div class="mt-3  sm:mt-5">
                <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                    Registrar proyecto
                </h1>
            </div>
            <div class="mt-1 sm:mt-8">
                <form action="" class="flex-col flex">
                    <label for="name" class="text-gray-700 text-xs sm:text-md">Nombre</label>
                    <input v-model="formProject.name" type="text" class="
                                w-full
                                h-4
                                sm:h-9
                                rounded-md
                                border-b-2 border-gray-300
                                focus:border-blue-300
                                outline-none
                            " />
                    <label for="description" class="text-gray-700 mt-1 sm:mt-5 text-xs sm:text-md">Descripción</label>
                    <input v-model="formProject.description" type="text" class="w-full  h-4 sm:h-9 border-b-2 border-gray-300 focus:border-blue-300 outline-none" />

                    <label for="type" class="text-gray-700 mt-1 sm:mt-5 text-xs sm:text-md">Tipo</label>
                    <input v-model="formProject.type" type="text" class="w-full h-4 sm:h-9 border-b-2 border-gray-300 focus:border-blue-300 outline-none" />
                </form>
            </div>
            <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex p-4">
                <button class="bg-blue-600 text-gray-100 rounded-md h-8 sm:h-auto sm:rounded-lg w-20 sm:w-52 p-1 text-lg sm:text-md sm:p-3">
                    Registrar
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
