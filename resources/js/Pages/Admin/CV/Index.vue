<script setup>
import Header from "@/Layouts/LandingPage/Header.vue";
import {downloadFile} from '@/Services/FileService.js'

let props = defineProps({
    cvPath : {
        type: String
    }
})

const downloadCv = () => {
    downloadFile()
}

</script>

<template>
    <Header>
        <div class="font-sans w-full justify-center flex items-center h-full top-0 ">
            <div class="px-6 p-2 bg-white relative justify-center items-center m-5 w-full h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg:mx-5 lg:h-1/3 rounded-3xl shadow-md border">
                <div class="mt-3 sm:mt-5">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Ruta: {{cvPath}}
                    </h1>
                </div>

                <div class="mt-1 sm:mt-8" v-if="cvPath">
                    <div class="justify-center flex-col items-end mt-2 sm:mt-8 flex p-4">
                        <button @click="downloadCv" class="bg-blue-600 text-gray-100 rounded-md text-lg text-md py-1.5 px-8">
                            Descargar CV
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </Header>
</template>

<style scoped>

</style>
