<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

defineProps({ errors: Object })

const form = reactive({
    name: null,
    email: null,
    password: null,
})

function submit() {
  router.post('/user/store', form)
}

</script>

<template>
    <AppLayout title="Creacion de Usuario">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Nuevo Usuario
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

              
                        <form @submit.prevent="submit">

                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white pt-3">Nombre:</label>
                            <input id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required/>
                            <div v-if="errors.name" class="text-red-600">{{ errors.name }}</div>

                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white pt-3">Correo Electronico:</label>
                            <input id="email" type="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Walker" required/>
                            <div v-if="errors.email" class="text-red-600">{{ errors.email }}</div>

                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white pt-3">Contraseña:</label>
                            <input id="password" type="password" v-model="form.password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required/><br>
                            <div v-if="errors.password" class="text-red-600">{{ errors.password }}</div>

                            <div class="flow-root pb-5">  
                                
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border rounded float-right shadow" >Crear Usuario</button>
                            
                                <a v-bind:href="'/user'" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow float-right mr-3">Atras</a>
            
                            </div>

                        </form>
              

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
