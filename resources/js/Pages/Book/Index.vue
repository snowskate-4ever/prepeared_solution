<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    books: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});

const deletePost = (id) => {
    form.delete(`books/${id}`);
};
</script>

<template>
    <Head title="Книги" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AuthenticatedLayout/>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Книги</h2>
                    <div class="p-6 text-gray-900">
                        <Link href="books/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl my-3">Добавить книгу</button></Link>
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="border px-4 py-2">Ид</th>
                                <th class="border px-4 py-2">Имя</th>
                                <th class="border px-4 py-2">Автор</th>
                                <th class="border px-4 py-2">Издательство</th>
                                <th class="border px-4 py-2" width="250px">Редактирование</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="book in books" :key="book.id">
                                <td class="border px-4 py-2">{{ book.id }}</td>
                                <td class="border px-4 py-2">{{ book.name }}</td>
                                <td class="border px-4 py-2">{{ book.author_id }}</td>
                                <td class="border px-4 py-2">{{ book.publisher_id }}</td>
                                <td class="border px-4 py-2">
                                    <Link :href="`publishers/${book.id}/edit`">
                                        <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-2xl">Ред</button>
                                    </Link>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-2xl ml-2" @click="deletePost(book.id)">Удл</button>
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
