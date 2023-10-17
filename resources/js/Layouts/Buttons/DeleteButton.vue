<script setup lang="ts">

import { DeleteTechnology } from "@/Classes/DeleteTechnology";
import { DeleteService} from "@/Services/DeleteService";
import {DeleteProject} from "@/Classes/DeleteProject";

let props = defineProps({
    url:{
        type: String
    },
    deleteType: {
        type: String
    }
})


const handleDelete = () => {

    let deleteType = new DeleteTechnology()

    if (props.deleteType == "project") {
        deleteType = new DeleteProject()
    }

    let deleteService = new DeleteService();
    deleteService.type(props.url, deleteType)
}

</script>

<template>
    <button @click="handleDelete" class="text-white bg-red-500 px-3 py-1.5 rounded-md">Eliminar</button>
</template>

<style scoped>

</style>
