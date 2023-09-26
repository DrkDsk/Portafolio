<script setup>
defineProps({
    project: Object
})
</script>

<template>
    <div class="rounded-sm bg-white shadow-md border px-4 py-6">
        <div class="flex flex-col gap-1">
            <p class="text-black text-2xl font-bold">{{project.name}}</p>
            <p class="text-black font-thin text-md capitalize">{{project.type}}</p>
            <p class="text-black font-medium text-md">{{project.description}}</p>
        </div>
    </div>
</template>

<style scoped>

</style>
