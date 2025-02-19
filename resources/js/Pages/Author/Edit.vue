<script setup>
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    author: {
        type: Object,
        default: null,
    },
});

const form = useForm({
    name: props.author.name
});

const submit = () => {
    form.put(`/authors/${props.author.id}`);
};
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <Link :href="route('authors.index')">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Назад</button>
                    </Link>

                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-gray-700 text-sm font-bold mb-2">
                                Name:</label>
                            <input
                                type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter Name"
                                id="name"
                                v-model="form.name"/>
                        </div>

                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 text-white">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
