<script setup>
import Header from "@/Layouts/Header.vue";
import {useForm} from "@inertiajs/vue3";

let formCv = useForm({
    file : null
})

const submitForm = () => {
    formCv.post(route('cv.store'))
}

</script>

<template>
    <Header>
        <div class="font-sans w-full justify-center flex items-center h-full top-0 ">
            <div class="px-6 p-2 bg-white relative justify-center items-center m-5 w-full h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg:mx-5 lg:h-1/3 rounded-3xl shadow-md border">
                <div class="mt-3 sm:mt-5">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Actualizar CV
                    </h1>
                </div>

                <div class="mt-1 sm:mt-8">
                    <form @submit.prevent="submitForm" class="flex-col flex text-gray-700" enctype="multipart/form-data">
                        <label for="cover" class="text-gray-700 mt-1 mt-5 mb-1">Archivo CV</label>
                        <input type="file" @input="formCv.file = $event.target.files[0]">

                        <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex p-4">
                            <button class="bg-blue-600 text-gray-100 rounded-md text-lg text-md py-1.5 px-8">
                                Actualizar
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
