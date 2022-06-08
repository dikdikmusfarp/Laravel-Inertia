<script setup>

import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    items: Object,
})

</script>
<template>
    <div class="grid relative" v-for="item in items" :key="item.id">
        <Link :href="route('item.show', item.id)">
        <div class="relative product-image w-[295px] drop-shadow-[0_12px_8px_rgba(195,188,188,0.15)]">
            <img :src="item.image" class="rounded-3xl height-full object-cover" alt="">
            <div class="flex items-center rounded-full px-4 py-[7px] bg-lemon-green absolute top-5 right-5">
                <img src="assets/images/ic-crypto.svg" alt="">
                <p class="text-deep-green font-bold text-sm ml-[6px]">{{ item.price }}</p>
            </div>
        </div>
        </Link>
        <div class="flex justify-between">
            <span class="font-semibold text-[22px] text-[#FEFCFD] mt-6">{{ item.name }}</span>
            <Link v-show="item.can.edit" :href="route('item.edit', item.id)" class="bg-blue-500 rounded p-4 text-white">
            Edit</Link>
            <Link v-show="item.can.delete" class="bg-red-500 rounded p-4 text-white">
            Delete</Link>
        </div>
        <p class="text-nardo-gray text-base">@{{ item.user.username }}</p>
    </div>
</template>
