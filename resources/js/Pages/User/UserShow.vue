<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

defineProps({ usuario: Object })

const form = reactive({
    name: null,
    email: null,
    password: null,
})


</script>

<template>
    <AppLayout title="Información de Usuario">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Información de Usuario
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

              

                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white pt-3">Nombre:</label>
                            <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="usuario.name" disabled/>
        

                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white pt-3">Correo Electronico:</label>
                            <input id="email" type="email" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="usuario.email" disabled/>
     

                            <div class="flow-root pb-5 mt-4">  
                            
                                <a v-bind:href="'/user'" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow float-right mr-3">Atras</a>
            
                            </div>

                        
              

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
