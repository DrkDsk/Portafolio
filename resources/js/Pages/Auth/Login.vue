<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="flex flex-row min-h-screen">
        <div class="hidden md:flex w-5/12">
            <div>
                <img alt="" width="650" src="/assets/img/sunset.webp">
            </div>
        </div>

        <div class="w-full md:w-7/12">
            <Head title="Log in" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div class="w-full md:w-10/12 mx-auto min-h-screen justify-center flex items-center h-full top-0">
                    <div class="rounded-lg shadow-lg bg-white border p-5 w-3/4 flex flex-col gap-4">
                        <label class="text-2xl font-bold my-4">Iniciar sesión</label>

                        <input v-model="form.email"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="Email"
                               type="email"
                               class="rounded-xl border-gray-300"
                        >

                        <InputError class="mt-2" :message="form.errors.email" />

                        <input v-model="form.password"
                               required
                               autocomplete="current-password"
                               placeholder="Contraseña"
                               type="password"
                               class="rounded-xl border-gray-300"
                        >

                        <InputError class="mt-2" :message="form.errors.password" />

                        <div class="flex flex-row justify-between">
                            <div class="block">
                                <label class="flex items-center">
                                    <Checkbox name="remember" v-model:checked="form.remember" />
                                    <span class="ml-2 text-sm text-gray-600">Recordar sesión</span>
                                </label>
                            </div>

                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Olvidaste tu contraseña?
                            </Link>
                        </div>
                        <button class="bg-blue-600 rounded-full my-4 p-3 text-white">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
