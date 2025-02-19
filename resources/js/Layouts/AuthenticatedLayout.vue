<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <NavLink :href="route('authors.index')" :active="route().current('authors.index')">
        Авторы
    </NavLink>
    <NavLink :href="route('publishers.index')" :active="route().current('publishers.index')">
        Издательства
    </NavLink>
    <NavLink :href="route('books.index')" :active="route().current('books.index')">
        Книги
    </NavLink>
</template>

<style scoped>

</style>
