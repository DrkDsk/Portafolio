<script setup>

let props = defineProps({
    technology: Object
})

const cover = props.technology?.imagePath ?? "/assets/img/default.jpg"

</script>

<template>
    <div class="rounded-md bg-white shadow-md border">
        <div class="flex flex-col text-gray-600 text-xl pb-4">
            <div class="pb-4">
                <img loading="lazy" :src=cover alt="" class="h-80 w-full object-cover object-right">
            </div>
            <div>
                <p class="font-bold capitalize px-4 py-1">{{technology.name}}</p>
            </div>
            <div class="flex flex-row">
                <p class="font-bold px-4 py-1">Experiencia: <span class="text-lg"> {{technology.startExperience}}</span></p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
