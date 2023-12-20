<script setup>

import {useForm} from "@inertiajs/vue3";

defineProps({
    myInfo: Object
});

let contactForm = useForm({
    name: null,
    email: null,
    message: null
})

const sendForm = () => {
    contactForm.post(route('contact.email'))
}

</script>

<template>
    <div class="flex flex-row w-9/12 mx-auto" id="contact">

        <div class="flex flex-col w-full">
            <div class="flex w-full justify-center">
                <p class="text-5xl text-gray-800 font-semibold my-8">Contacto</p>
            </div>

            <div class="md:grid md:grid-cols-2 md:gap-8 my-4">
                <div class="flex flex-col text-sky-600 font-semibold gap-4 text-justify rounded-md shadow-lg border p-5">
                    <p class="text-3xl">Conecta conmigo</p>
                    <p class="text-lg">Si desear conocer más de mi trabajo y lo que hago,
                        puedes contactarme conmigo vía correo electrónico en el formulario de abajo
                        o en mis distintas redes sociales.
                    </p>

                    <div>
                        <form @submit.prevent="sendForm" class="flex flex-col gap-4 text-gray-700">
                            <input v-model="contactForm.name" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" placeholder="Escribe tu nombre">
                            <input v-model="contactForm.email" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none" placeholder="Escribe tu correo electrónico">
                            <textarea v-model="contactForm.message" rows="4" placeholder="Deja tu mensaje" class="w-full rounded-md border-b-2 border-gray-300 focus:border-blue-300 outline-none"></textarea>
                            <div class="ml-auto">
                                <button class="text-white px-4 py-2 bg-indigo-500 rounded-lg hover:scale-110">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="flex flex-col gap-1 rounded-md shadow-lg border p-5 my-6 md:my-0">
                    <div class="flex flex-row justify-center">
                        <p class="text-4xl font-semibold text-gray-600">Redes sociales</p>
                    </div>

                    <div class="flex flex-col my-4 h-full">
                        <div class="mb-16">
                            <p class="text-2xl font-semibold text-gray-600">Email</p>
                            <p class="text-2xl font-semibold text-sky-600">joseaph.1998@gmail.com</p>
                        </div>

                        <div>
                            <p class="text-2xl font-semibold text-gray-600">Sociales</p>
                            <div class="flex flex-row gap-6 mt-3">
                                <div>
                                    <a :href="myInfo.github" target="_blank"><img src="/assets/social_networks/github-mark.png" width="40" alt=""></a>
                                </div>
                                <div>
                                    <a :href="myInfo.linkedin" target="_blank"><img src="/assets/social_networks/LinkedIn.png" width="40" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
