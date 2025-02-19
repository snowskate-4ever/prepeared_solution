<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from "@inertiajs/vue3";

const form = useForm({
    id:'',
    name: '',
});

const submit = () => {
    form.post('/authors');
};
</script>

<template>
    <Head title="Добавление автора" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <AuthenticatedLayout/>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавление автора</h2>
                    <div class="p-6 text-gray-900">
                        <Link :href="route('authors.index')">
                            <button class="bg-amber-400 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-2xl my-3">Назад</button>
                        </Link>
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label
                                    for="name"
                                    class="block text-gray-700 text-sm font-bold mb-2">
                                    Имя автора:</label>
                                <input
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Введите имя"
                                    id="name"
                                    v-model="form.name" />

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
