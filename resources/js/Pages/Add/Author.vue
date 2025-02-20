<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    book: {
        type: Object,
        default: null,
    },
    authors: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    authors: null
});

const submit = () => {
    form.put(`/add_authors/${props.book.id}`);
};
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <AuthenticatedLayout/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <Link :href="route('books.index')">
                        <button class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-2xl my-3">Назад</button>
                    </Link>
                    <div>Название книги:</div>
                    <div>{{ book.name }}</div>
                    <div>Авторы:</div>
                    <div v-for="author in props.book.authors" :key="author.id">
                        {{ author.name }}
                    </div>
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="author_id"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Авторы:</label>
                            <select size="6" multiple id="author_id" v-model="form.authors">
                                <option v-for="author in props.authors" :key="author.id" :value="author.id">{{ author.name }}</option>
                            </select>
                        </div>
                        <button type="submit"
                                class="bg-blue-300 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded-2xl my-3 text-white">
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
