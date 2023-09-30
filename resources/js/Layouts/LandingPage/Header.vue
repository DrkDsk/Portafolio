<script setup>
import { Link } from '@inertiajs/vue3';

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
                    Home
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
                <Link class="rounded-xl text-sky-600 px-4 py-2" :href='route("home")'>
                    Contacto
                </Link>
            </div>
        </div>

        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto">
                <slot />
            </div>
        </main>
    </nav>
</template>

<style scoped>

</style>
