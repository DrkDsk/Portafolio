<script setup lang="ts">
import {DeleteTechnology} from "../../Events/DeleteTechnology";

let props = defineProps({
    url:{
        type: String
    }
})


const handleDelete = () => {
    let deleteTechnology = new DeleteTechnology()
    deleteTechnology.delete(props.url)
}

</script>

<template>
    <button @click="handleDelete" class="text-white bg-red-500 px-3 py-1.5 rounded-md">Eliminar</button>
</template>

<style scoped>

</style>
