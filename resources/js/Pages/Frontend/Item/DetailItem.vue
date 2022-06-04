<script setup>

import FrontendLayout from '@/Layouts/Frontend/FrontendLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ItemCard from '@/Components/Frontend/ItemCard.vue';


defineProps({
    item: Object,
    similarItems: Object,
})

</script>



<template>

    <Head :title="item.data.name"></Head>
    <FrontendLayout>
        <section
            class="max-w-screen-2xl mx-auto xl:px-[140px] lg:px-[95px] px-3 pt-20 pb-[100px] relative overflow-x-clip">
            <img src="/assets/images/ornament.svg" class="absolute -right-[10%] top-[20%] -z-10" alt="">

            <!-- Header Content -->
            <div
                class="flex flex-col lg:flex-row md:justify-center lg:items-center space-y-[110px] lg:space-y-0 lg:space-x-[110px] font-raleway">
                <div class="headline-content flex flex-col gap-[30px] lg:w-1/2">
                    <div class="font-bold text-white text-[55px]">{{ item.data.name }}</div>
                    <p class="text-[18px] text-nardo-gray leading-8 mb-0">
                        {{ item.data.description }}
                    </p>

                    <div class="flex items-center">
                        <p class="text-nardo-gray text-lg">Latest Price:</p>
                        <div class="flex items-center rounded-full px-4 py-[7px] bg-lemon-green ml-[15px]">
                            <img src="assets/images/ic-crypto.svg" alt="">
                            <p class="text-deep-green font-bold text-sm ml-[6px]">{{ item.data.price }}</p>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="flex items-center gap-4">
                        <img :src="item.data.user.avatar_url" class="w-[60px] border border-nardo-gray p-2 rounded-full"
                            alt="">
                        <div class="grid">
                            <div class="font-semibold text-white text-lg">{{ item.data.user.name }}</div>
                            <p class="text-base text-nardo-gray">@{{ item.data.user.username }}</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a href="#!"
                            class="py-[13px] px-[34px] bg-yello rounded-full text-center drop-shadow-[0_12px_12px_rgba(249,200,90,0.4)]">
                            <span class="font-bold text-base text-deep-yello">Bid Now</span>
                        </a>
                    </div>
                </div>

                <div class="product-preview w-full md:w-[596px]">
                    <img :src="item.data.image"
                        class="h-auto w-full rounded-[30px] md:rounded-[60px] object-cover drop-shadow-[0_18px_28px_rgba(25,79,155,0.45)]"
                        alt="">
                </div>
            </div>
            <!-- /Header Content -->
        </section>

        <!-- Benefits -->
        <section class="mx-auto px-3 py-[100px] max-w-[880px]">
            <div class="grid text-[26px] mb-[70px] text-center">
                <p class="font-bscript text-pinkly">Boosting Up</p>
                <div class="font-bold font-raleway text-[#FEFCFD]">Powerful Benefits</div>
            </div>

            <!-- Benefits Item -->
            <div class="grid grid-cols-6 gap-x-[90px] gap-y-[70px] justify-center mx-auto">
                <!-- Item 1 -->
                <div class="col-span-6 md:col-span-3 lg:col-span-2 text-center max-w-max group select-none mx-auto">
                    <div
                        class="bg-dark-purple group-hover:bg-lemon-green w-max p-[19px] rounded-full mx-auto text-white group-hover:text-deep-green transition ease-out duration-300">
                        <svg width="32" height="32" viewBox="0 0 32 32" stroke="currentColor" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 29.3332C23.3638 29.3332 29.3334 23.3636 29.3334 15.9998C29.3334 8.63604 23.3638 2.6665 16 2.6665C8.63622 2.6665 2.66669 8.63604 2.66669 15.9998C2.66669 23.3636 8.63622 29.3332 16 29.3332Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.66669 16H29.3334" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M16 2.6665C19.3351 6.31764 21.2304 11.0559 21.3334 15.9998C21.2304 20.9438 19.3351 25.682 16 29.3332C12.665 25.682 10.7697 20.9438 10.6667 15.9998C10.7697 11.0559 12.665 6.31764 16 2.6665V2.6665Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                        Huge Traffic
                    </div>
                    <p class="text-nardo-gray text-base font-poppins">
                        We provide millions visitor <br>
                        only for your great art
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="col-span-6 md:col-span-3 lg:col-span-2 text-center max-w-max group select-none mx-auto">
                    <div
                        class="bg-dark-purple group-hover:bg-lemon-green w-max p-[19px] rounded-full mx-auto text-white group-hover:text-deep-green transition ease-out duration-300">
                        <svg width="32" height="32" viewBox="0 0 32 32" stroke="currentColor" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28 5.3335H4.00001C2.52725 5.3335 1.33334 6.5274 1.33334 8.00016V24.0002C1.33334 25.4729 2.52725 26.6668 4.00001 26.6668H28C29.4728 26.6668 30.6667 25.4729 30.6667 24.0002V8.00016C30.6667 6.5274 29.4728 5.3335 28 5.3335Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.33334 13.3335H30.6667" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                        Cheap Price
                    </div>
                    <p class="text-nardo-gray text-base font-poppins">
                        Listing your artwork with <br> our friendly pricing
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="col-span-6 md:col-span-3 lg:col-span-2 text-center max-w-max group select-none mx-auto">
                    <div
                        class="bg-dark-purple group-hover:bg-lemon-green w-max p-[19px] rounded-full mx-auto text-white group-hover:text-deep-green transition ease-out duration-300">
                        <svg width="32" height="32" viewBox="0 0 32 32" stroke="currentColor" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 25.3332C21.1546 25.3332 25.3333 21.1545 25.3333 15.9998C25.3333 10.8452 21.1546 6.6665 16 6.6665C10.8453 6.6665 6.66666 10.8452 6.66666 15.9998C6.66666 21.1545 10.8453 25.3332 16 25.3332Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M16 12V16L18 18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M22.0133 23.1335L21.5467 28.2402C21.4866 28.905 21.1793 29.5232 20.6856 29.9725C20.1919 30.4218 19.5476 30.6696 18.88 30.6669H13.1067C12.4391 30.6696 11.7948 30.4218 11.3011 29.9725C10.8073 29.5232 10.5001 28.905 10.44 28.2402L9.97333 23.1335M9.98666 8.86685L10.4533 3.76018C10.5132 3.09762 10.8186 2.48136 11.3095 2.03239C11.8004 1.58341 12.4414 1.33414 13.1067 1.33352H18.9067C19.5742 1.33081 20.2185 1.57858 20.7123 2.02788C21.206 2.47718 21.5133 3.09533 21.5733 3.76018L22.04 8.86685"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                        No Limits
                    </div>
                    <p class="text-nardo-gray text-base font-poppins">
                        Your artwork always <br> available forever
                    </p>
                </div>

            </div>
        </section>

        <!-- Similar Items -->
        <section
            class="max-w-screen-2xl mx-auto xl:pr-[62px] xl:px-[120px] lg:pl-[75px] lg:pr-[55px] px-3 py-[100px] font-raleway">
            <div class="grid text-[26px] mb-[30px]">
                <p class="font-bscript text-pinkly">Collect Now</p>
                <div class="font-bold font-raleway text-[#FEFCFD]">Similar Items</div>
            </div>
            <!-- Card Container -->
            <div class="flex flex-nowrap gap-[50px] overflow-x-auto card-container">
                <ItemCard :items="similarItems.data"></ItemCard>
            </div>
        </section>
    </FrontendLayout>
</template>
