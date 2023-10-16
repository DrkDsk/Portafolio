<script setup>

import { Link } from '@inertiajs/vue3';
import DeleteButton from "@/Layouts/Buttons/DeleteButton.vue";

let props = defineProps({
    technology: {
        type: Object
    }
})

const cover = props.technology?.imagePath ?? "/assets/img/default.jpg"

</script>

<template>
    <div class="rounded-md bg-white shadow-md border px-4 py-6">
        <div class="flex flex-col">
            <Link :href="route('admin.technologies.edit', technology.id)">
                <img loading="lazy"  :src=cover alt="" class="h-96 w-full object-cover object-center">
            </Link>
            <div class="gap-1 mt-3 flex flex-row justify-between">
                <p class="text-black text-2xl font-bold capitalize">{{technology.name}}</p>
                <DeleteButton :url="route('admin.technologies.destroy',technology.id)"></DeleteButton>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
