<script setup>

import {Link} from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
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
                    <ul class="md:flex items-center justify-between font-semibold text-lg pt-4 md:pt-0">
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('dashboard')">
                                Dashboard
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.projects.index')">
                                Proyectos
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.technologies.index')">
                                Tecnologías
                            </Link>
                        </li>
                        <li>
                            <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.cv.index')">
                                Ver Cv
                            </Link>
                        </li>
                        <li>
                            <div class="hidden sm:flex sm:items-center">
                                <!-- Settings Dropdown -->
                                <div class="relative">
                                    <Dropdown align="right" width="48">
                                        <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="bg-gray-100 text-sm rounded-xl text-sky-800 px-4 py-2 inline-flex items-center border border-transparent leading-4 font-medium hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >

                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                        </template>

                                        <template #content>
                                            <Link class="text-gray-600 px-4 py-2 text-sm" :href="route('logout')" method="post" as="button">
                                                Cerrar Sesión
                                            </Link >
                                        </template>
                                    </Dropdown>
                                </div>
                            </div>
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
