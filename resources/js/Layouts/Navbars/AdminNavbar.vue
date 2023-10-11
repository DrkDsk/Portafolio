<script setup>

import {Link} from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
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

                <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('dashboard')">
                    Dashboard
                </Link>

                <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.projects.index')">
                    Proyectos
                </Link>

                <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.technologies.index')">
                    Tecnologías
                </Link>

                <Link class="rounded-xl text-sky-600 px-4 py-2" :href="route('admin.cv.index')">
                    Ver Cv
                </Link>

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

            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
