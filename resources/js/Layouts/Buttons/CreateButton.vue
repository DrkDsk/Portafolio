<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String
    },
    link: {
        type: String
    }
})

</script>

<template>
    <Link :href="link" class="rounded-xl border px-4 py-1.5 bg-sky-500 text-white font-semibold">{{title}}</Link>
</template>

<style scoped>

</style>
