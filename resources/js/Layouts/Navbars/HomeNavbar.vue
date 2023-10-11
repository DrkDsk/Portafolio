<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>
    <nav class="w-full font-semibold text-lg text-white">
        <div class="flex justify-between items-center p-4">
            <div class="flex">
                <Link :href='route("home")' class="text-black">
                    Mi portafolio
                </Link>
            </div>

            <div class="flex gap-4">
                <Link class="rounded-xl bg-blue-600 px-4 py-2" :href='route("home")'>
                    Inicio
                </Link>
                <Link class="rounded-xl text-sky-600 px-4 py-2" href="#aboutme">
                    Acerca de mí
                </Link>
                <a  class="rounded-xl text-sky-600 px-4 py-2" href="#projects">
                    Proyectos
                </a>
                <Link class="rounded-xl text-sky-600 px-4 py-2" href="#skills">
                    Habilidades
                </Link>
                <Link class="rounded-xl text-sky-600 px-4 py-2" href="#contact">
                    Contacto
                </Link>
            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
