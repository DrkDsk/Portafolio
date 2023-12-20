<script setup>
import Header from "@/Layouts/Header.vue";
import {downloadFile} from '@/Services/FileService.ts'
import {Link} from "@inertiajs/vue3";

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
            <div class="px-6 p-2 bg-white relative justify-center my-3 items-center w-full mx-6 h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-1/2 lg:mx-5 lg:h-1/3 rounded-3xl shadow-md border">
                <div class="my-4 px-4" v-if="cvPath">
                    <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
                        Ruta: {{cvPath}}
                    </h1>
                </div>

                <div>
                    <div class="flex-row items-center justify-between my-5 px-4 flex">
                        <Link class="bg-green-600 text-gray-100 rounded-md text-lg text-md py-1.5 px-8" :href="route('admin.cv.create')">
                            Actualizar CV
                        </Link>

                        <button v-if="cvPath" @click="downloadCv" class="bg-blue-600 text-gray-100 rounded-md text-lg text-md py-1.5 px-8">
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
