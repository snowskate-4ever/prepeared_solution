<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    publishers: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});

const deletePost = (id) => {
    form.delete(`publishers/${id}`);
};
</script>

<template>
    <Head title="Издательства" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AuthenticatedLayout/>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Издательства</h2>
                    <div class="p-6 text-gray-900">
                        <Link href="publishers/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">Добавить издательство</button></Link>
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Ид</th>
                                <th class="border px-4 py-2">Имя</th>
                                <th class="border px-4 py-2" width="250px">Редактирование</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="publisher in publishers" :key="publisher.id">
                                <td class="border px-4 py-2">{{ publisher.id }}</td>
                                <td class="border px-4 py-2">{{ publisher.name }}</td>
                                <td class="border px-4 py-2">
                                    <Link :href="`publishers/${publisher.id}/edit`">
                                        <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-2xl">Ред</button>
                                    </Link>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-2xl ml-2" @click="deletePost(publisher.id)">Удл</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



</template>

<style scoped>

</style>
