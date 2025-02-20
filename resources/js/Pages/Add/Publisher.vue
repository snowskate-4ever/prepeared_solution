<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    book: {
        type: Object,
        default: null,
    },
    publishers: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    publishers: null
});

const submit = () => {
    form.put(`/add_publishers/${props.book.id}`);
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
                    <div>Издательства:</div>
                    <div v-for="publisher in props.book.publishers" :key="publisher.id">
                        {{ publisher.name }}
                    </div>
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="publisher_id"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Издательство:</label>
                            <select size="6" multiple id="publisher_id" v-model="form.publishers">
                                <option v-for="publisher in props.publishers" :key="publisher.id" :value="publisher.id">{{ publisher.name }}</option>
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
