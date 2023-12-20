<script setup>
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";

let isOpen = ref(false)

const toggleMenu = () => {
    isOpen.value = !isOpen.value;
}

</script>

<template>
    <nav class="w-full py-3 sticky top-0 z-50 bg-white">
        <div class="w-full flex items-center justify-start mt-0 px-6 py-2">
            <label
                for="menu-toggle"
                class="cursor-pointer md:hidden block"
                @click="toggleMenu"
            >
                <svg
                    class="fill-current text-blue-600"
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                >
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div
                class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1"
                id="menu"
            >
                <nav>
                    <ul class="md:flex items-center justify-between text-base pt-4 md:pt-0">
                        <li>
                            <Link :href='route("home")' class="rounded-xl text-sky-600 px-4 py-2">
                                Mi portafolio
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href='route("home")'>
                                Inicio
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#aboutme">
                                Acerca de mí
                            </Link>
                        </li>
                        <li>
                            <Link  class="rounded-xl text-sky-600 px-4 py-2" href="#projects">
                                Proyectos
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#skills">
                                Habilidades
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#contact">
                                Contacto
                            </Link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <aside
            :class="{ 'hidden': !isOpen }"
            class="fixed z-10 md:hidden flex-col w-64 h-screen px-5 overflow-y-auto bg-white border border-gray-200 rounded-md"
        >
            <div class="flex flex-col justify-between flex-1">
                <nav class="-mx-3">
                    <ul class="md:flex items-center justify-between text-base pt-4 md:pt-0">
                        <li class="my-3">
                             <Link :href='route("home")' class="rounded-xl text-sky-600 px-4 py-2">
                                Mi portafolio
                            </Link>
                        </li>
                        <li class="my-3">
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href='route("home")'>
                                Inicio
                            </Link>
                        </li>

                        <li class="my-3">
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#aboutme">
                                Acerca de mí
                            </Link>
                        </li>

                        <li class="my-3">
                            <Link  class="rounded-xl text-sky-600 px-4 py-2" href="#projects">
                                Proyectos
                            </Link>
                        </li>

                        <li class="my-3">
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#skills">
                                Habilidades
                            </Link>
                        </li>

                        <li class="my-3">
                            <Link class="rounded-xl text-sky-600 px-4 py-2" href="#contact">
                                Contacto
                            </Link>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </nav>
</template>

<style scoped>

</style>
