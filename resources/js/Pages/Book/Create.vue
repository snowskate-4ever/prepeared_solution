<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    id:'',
    name: '',
    author_id: '',
    publisher_id: '',
});

const props = defineProps({
    authors: {
        type: Array,
        default: () => [],
    },
    publishers: {
        type: Array,
        default: () => [],
    },
});
const submit = () => {
    form.post('/books');
};
</script>

<template>
    <Head title="Добавление книги" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AuthenticatedLayout/>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавление книги</h2>
                    <div class="p-6 text-gray-900">
                        <Link :href="route('books.index')">
                            <button class="bg-amber-400 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-2xl my-3">Назад</button>
                        </Link>
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label
                                    for="name"
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Название:</label>
                                <input
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Введите название"
                                    id="name"
                                    v-model="form.name" />

                            </div>

                            <div class="mb-4">
                                <label
                                    for="author_id"
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Автор:</label>
                                <select size="3" id="author_id" v-model="form.author_id">
                                    <option v-for="author in props.authors" :key="author.id" :value="author.id">{{ author.name }}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label
                                    for="publisher_id"
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Издательство:</label>
                                <select size="3" id="publisher_id" v-model="form.publisher_id">
                                    <option v-for="publisher in props.publishers" :key="publisher.id" :value="publisher.id">{{ publisher.name }}</option>
                                </select>
                            </div>

                            <button type="submit" class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-2xl my-3 text-white">
                                Сохранить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</template>

<style scoped>

</style>
