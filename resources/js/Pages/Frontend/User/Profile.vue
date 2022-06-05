<script setup>
import FrontendLayout from '@/Layouts/Frontend/FrontendLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import ItemCard from '@/Components/Frontend/ItemCard.vue';


defineProps({
    myItems: Object
})

const form = useForm({
    name: '',
    description: '',
    price: '',
    image: ''
})

function submit() {
    form.post(route('item.store'));
}

</script>

<template>

    <Head title="Profile"></Head>
    <FrontendLayout>
        <section
            class="max-w-screen-2xl mx-auto xl:px-[140px] lg:px-[95px] px-3 pt-20 pb-[100px] relative overflow-x-clip">
            <img src="assets/images/ornament.svg" class="absolute -right-[10%] top-[20%] -z-10" alt="">

            <!-- Header Content -->
            <div
                class="flex flex-col lg:flex-row md:justify-center lg:items-center space-y-[110px] lg:space-y-0 lg:space-x-[110px] font-raleway">
                <div class="headline-content flex flex-col gap-[30px] lg:w-1/2">
                    <div class="font-bold text-white text-[55px]">{{ $page.props.auth.user.name }}</div>
                    <div class="grid text-[26px]">
                        <p class="font-bscript text-pinkly">Upload an Item</p>
                    </div>
                    <div v-show="$page.props.flash.message" class="bg-yello p-4 text-white rounded-lg">{{
                        $page.props.flash.message
                        }}</div>
                    <form @submit.prevent="submit">
                        <div class="flex flex-col space-y-[10px] my-4">
                            <label class="text-base text-nardo-gray capitalize">name</label>
                            <input type="text" v-model="form.name"
                                class="font-raleway rounded-full placeholder:placeholder-text placeholder:font-normal text-base bg-form-bg py-[18px] px-7 text-input-text font-semibold"
                                placeholder="Your name">
                            <span v-if="$page.props.errors.name" class="text-red-500 space-y-2">{{
                                $page.props.errors.name
                                }}</span>
                        </div>

                        <div class="flex flex-col space-y-[10px] my-4">
                            <label class="text-base text-nardo-gray capitalize">Description</label>
                            <input type="text" v-model="form.description"
                                class="font-raleway rounded-full placeholder:placeholder-text placeholder:font-normal text-base bg-form-bg py-[18px] px-7 text-input-text font-semibold"
                                placeholder="Fill with the Description">
                            <span v-if="$page.props.errors.description" class="text-red-500 space-y-2">{{
                                $page.props.errors.description
                                }}</span>
                        </div>

                        <div class="flex flex-col space-y-[10px] my-4">
                            <label class="text-base text-nardo-gray capitalize">Picture</label>
                            <input type="file" @input="form.image = $event.target.files[0]"
                                class="font-raleway rounded-full placeholder:placeholder-text placeholder:font-normal text-base bg-form-bg py-[18px] px-7 text-input-text font-semibold">
                            <span v-if="$page.props.errors.image" class="text-red-500 space-y-2">{{
                                $page.props.errors.image
                                }}</span>
                        </div>
                        <div class="flex flex-col space-y-[10px] my-4">
                            <label class="text-base text-nardo-gray capitalize">Price</label>
                            <input type="text" v-model="form.price"
                                class="font-raleway rounded-full placeholder:placeholder-text placeholder:font-normal text-base bg-form-bg py-[18px] px-7 text-input-text font-semibold"
                                placeholder="How much the price">
                            <span v-if="$page.props.errors.price" class="text-red-500 space-y-2">{{
                                $page.props.errors.price
                                }}</span>
                        </div>

                        <div class="mt-5">
                            <button type="submit"
                                class="py-[13px] px-[34px] bg-yello rounded-full text-center drop-shadow-[0_12px_12px_rgba(249,200,90,0.4)]">
                                <span class="font-bold text-base text-deep-yello">Save</span>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="product-preview w-full md:w-[596px]">
                    <img :src="$page.props.auth.user.avatar_url"
                        class="h-auto w-full rounded-[30px] md:rounded-[60px] object-cover" alt="">
                    <div class="mt-[30px] flex justify-between items-center">
                        <div class="product-detail">
                            <div class="text-[28px] text-white font-semibold">{{ $page.props.auth.user.name }}
                            </div>
                            <p class="text-nardo-gray text-lg">@{{ $page.props.auth.user.username }}</p>
                        </div>
                        <a href="#!"
                            class="py-[13px] px-[34px] bg-yello rounded-full text-center drop-shadow-[0_12px_12px_rgba(249,200,90,0.4)]">
                            <span class="font-bold text-base text-deep-yello">Start Bidding</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Header Content -->
        </section>
        <!-- Similar Items -->
        <section
            class="max-w-screen-2xl mx-auto xl:pr-[62px] xl:px-[120px] lg:pl-[75px] lg:pr-[55px] px-3 py-[100px] font-raleway">
            <div class="grid text-[26px] mb-[30px]">
                <p class="font-bscript text-pinkly">My Items</p>
                <div class="font-bold font-raleway text-[#FEFCFD]">Item Collections</div>
            </div>
            <!-- Card Container -->
            <div class="flex flex-nowrap gap-[50px] overflow-x-auto card-container">
                <ItemCard :items="myItems.data"></ItemCard>
            </div>
        </section>
    </FrontendLayout>
</template>
