<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    links: Object,
})
</script>

<template>
    <ul class="pagination m-0 ms-auto">
        <li class="page-item" :class="{ 'active': link.active }" v-for="link in links">
            <Link :href="link.url" class="page-link" v-html="link.label">
            </Link>
        </li>
    </ul>
</template>
