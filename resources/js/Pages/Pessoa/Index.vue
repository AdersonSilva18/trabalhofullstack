<template>

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div
            class="w-full sm:max-w-xl  mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <div class="mb-4">
                <Link
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    :href="`pessoas/create`">Adicionar Pessoa
                </Link>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th v-for="header in headers" :key="header" scope="col" class="px-6 py-3">
                            {{ header }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="pessoa in pessoas" :key="pessoa.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ pessoa.nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ pessoa.cpf }}
                        </td>
                        <td class="px-6 py-4">
                            {{ pessoa.telefone }}
                        </td>
                        <td class="px-6 py-4">
                            <Link class="font-medium text-blue-600 dark:text-blue-500 hover:underline me-2"
                                  :href="`pessoas/${pessoa.id}/edit`">Edit
                            </Link>
                            <button class="font-medium text-blue-600 dark:text-red-500 hover:underline"
                                    @click="deletePessoa(pessoa.id)">Delete
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";

defineProps({
    pessoas: {
        type: Array,
        default: () => [],
    },
});

const headers = ["nome", "cpf", "telefone", 'actions'];

const form = useForm({});

const deletePessoa = (id) => {
    form.delete(`pessoas/${id}`);
};
</script>
