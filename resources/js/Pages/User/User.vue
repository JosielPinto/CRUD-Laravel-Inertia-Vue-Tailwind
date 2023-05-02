<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';
import JetDialogModal from '@/Components/DialogModal.vue';
import { ref } from 'vue';

defineProps({ users: Object })

let ModalOpen = ref(false);

let selectedUser = Object;

function DeleteUser(selectedUser) {

    router.delete(route('user.destroy', {'usuario':selectedUser}));
    
}

</script>

<template>
    <AppLayout title="Usuarios">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

        <div class="flow-root pb-5 pt-3">  
            <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4  rounded float-right" :href="route('user.create')">Crear Usuario</Link>
        </div>

                        
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="p-3">ID</th>
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr v-for="usuario in users" :key="usuario.id">
                                    <td class="p-3 border">{{ usuario.id }}</td>
                                    <td class="p-3 border">{{ usuario.name }}</td>
                                    <td class="p-3 border">{{ usuario.email }}</td>
                                    <td class="p-1 pr-0 m-0 border">
                                    
                                    <Link class="bg-white hover:bg-gray-300 font-bold py-2 px-4 rounded float-left" :href="route('user.show', { usuario: usuario })">
                                        <svg class="h-8 w-8 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </Link>

                                    <Link class="bg-white hover:bg-gray-300 font-bold py-2 px-4 rounded float-left" :href="route('user.edit', { usuario: usuario })">
                                        <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </Link>

                                    <button @click="ModalOpen=true;selectedUser=usuario;" class="py-2 px-4 rounded float-left"> 
                                        <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>
                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        
        <jet-dialog-modal :show="ModalOpen">

            <template v-slot:title>
                <h1>Eliminar Usuario</h1>
            </template>

            <template v-slot:content>
                <h1 v-if="selectedUser">¿Seguro que quieres eliminar el usuario: {{ selectedUser.name }} ?</h1>
            </template>

            <template v-slot:footer>

            <div class="flow-root pb-5 pt-3 pr-2">  
                <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right" @click="DeleteUser(selectedUser)">Eliminar</Link>
            </div>
                
            <div class="flow-root pb-5 pt-3">  
                <Link class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded float-right" @click="ModalOpen=false">Cerrar</Link>
            </div>

            </template>

        </jet-dialog-modal>

    </AppLayout>
</template>
