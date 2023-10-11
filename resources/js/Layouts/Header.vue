<script setup>
import HomeNavbar from "@/Layouts/Navbars/HomeNavbar.vue";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import AdminNavbar from "@/Layouts/Navbars/AdminNavbar.vue";

const page = usePage()
const isAdmin = computed(() => page.props.auth.isAdmin)
</script>

<template>

    <AdminNavbar v-if="isAdmin">

    </AdminNavbar>

    <HomeNavbar v-else>

    </HomeNavbar>
    <main class="flex-1 overflow-x-hidden overflow-y-auto">
        <div class="container mx-auto">
            <slot />
        </div>
    </main>
</template>

<style scoped>

</style>
