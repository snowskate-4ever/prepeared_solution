<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    book: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    name: props.book.name
});

const submit = () => {
    form.put(`/books/${props.book.id}`);
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

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Название книги:</label>
                            <input
                                type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Введите название"
                                id="name"
                                v-model="form.name"/>
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
