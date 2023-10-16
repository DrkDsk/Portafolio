<script setup>

import {Link} from "@inertiajs/vue3";

let props = defineProps({
    url:{
        type: String
    }
})

</script>

<template>
    <Link :href="url" class="text-white bg-red-500 px-3 py-1.5 rounded-md">Eliminar</Link>
</template>

<style scoped>

</style>
