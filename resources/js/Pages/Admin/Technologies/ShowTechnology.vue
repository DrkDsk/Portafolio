<script setup>

import { Link } from '@inertiajs/vue3';

let props = defineProps({
    technology: Object
})

const cover = props.technology?.fullImagePath ?? "/assets/img/default.jpg"

</script>

<template>
    <Link :href="route('admin.technologies.edit', technology.id)" class="rounded-md bg-white shadow-md border px-4 py-6">
        <div class="flex flex-col">
            <div>
                <img loading="lazy" :src=cover alt="" class="h-96 w-full object-cover object-center">
            </div>
            <div class="gap-1 mt-3">
                <p class="text-black text-2xl font-bold capitalize">{{technology.name}}</p>
            </div>
        </div>
    </Link>
</template>

<style scoped>

</style>
