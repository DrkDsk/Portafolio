<script setup>
import {downloadFile} from "@/Services/FileService.ts";

const downloadCv = () => {
    downloadFile()
}
</script>

<template>
    <div id="aboutme" class="flex flex-col md:flex-row w-10/12 text-gray-700 bg-gray-300 shadow-lg border rounded-lg mx-auto p-4 gap-4">
        <div class="p-4 mx-auto">
            <img alt="" src="/assets/img/portada.JPG" class="object-center object-cover" width="200" loading="lazy">
        </div>
       <div class="flex flex-col w-full md:w-10/12">
           <div class="p-4">
               <p class="text-2xl leading-relaxed italic text-justify">
                   Hola, soy Alfredo Palacios, un apasionado desarrollador de software full stack
                   con 4 años de experiencia. En mis diversos roles, he enfrentado múltiples desafíos
                   por cuenta propia, lo que me ha mantenido actualizado y sumergido en diversas
                   tecnologías de desarrollo. Me considero una persona autodidacta a la que le gusta
                   aprender cosas nuevas todos los días de ambos mundos, tanto en el frontend como en el backend.
               </p>
           </div>
           <div class="p-4 flex-row justify-center md:justify-end flex md:ml-auto">
               <button @click="downloadCv" class="text-white rounded-lg bg-gray-500 px-3 py-2 flex flex-row gap-2">
                   Descargar CV
                   <img src="/assets/svg/buttons/download-button.svg" alt="" width="25">
               </button>
           </div>
       </div>
    </div>
</template>

<style scoped>

</style>
