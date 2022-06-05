<script setup>

import { Head, Link } from '@inertiajs/inertia-vue3';
import ItemCard from '@/Components/Frontend/ItemCard.vue';


defineProps({
    todayItems: Object,
    randomItem: Object,
    itemCount: Number,
    userCount: Number,
    totalViews: Number,
})

</script>



<template>

    <Head title="Homepage"></Head>
    <section class="max-w-screen-2xl mx-auto xl:px-[140px] lg:px-[95px] px-3 pt-20 pb-[100px] relative overflow-x-clip">
        <img src="assets/images/ornament.svg" class="absolute -right-[10%] top-[20%] -z-10" alt="">

        <!-- Header Content -->
        <div
            class="flex flex-col lg:flex-row md:justify-center lg:items-center space-y-[110px] lg:space-y-0 lg:space-x-[110px] font-raleway">
            <div class="headline-content flex flex-col gap-10 lg:w-1/2">
                <img src="assets/images/header-text.svg" alt="">
                <p class="text-[18px] text-nardo-gray leading-8 mb-0">
                    Temukan karya buatan lokal dan koleksi untuk <br class="hidden md:block">
                    mendapatkan angka yang tinggi dikemudian hari
                </p>

                <div class="brand">
                    <p class="text-sm text-nardo-gray mb-3">Supported by</p>
                    <div class="flex after:hidden before:hidden items-center gap-[50px] flex-wrap">
                        <img src="assets/images/brand-apple.svg" alt="">
                        <img src="assets/images/brand-adobe.svg" alt="">
                        <img src="assets/images/brand-google.svg" class="mt-2" alt="">
                    </div>
                </div>
            </div>

            <div class="product-preview w-full md:w-[596px]">
                <img :src="randomItem.data.image" class="h-auto w-full rounded-[30px] md:rounded-[60px] object-cover"
                    alt="">
                <div class="mt-[30px] flex justify-between items-center">
                    <div class="product-detail">
                        <div class="text-[28px] text-white font-semibold">{{ randomItem.data.name }}</div>
                        <p class="text-nardo-gray text-lg">{{ randomItem.data.price }}</p>
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

    <!-- Statistics -->
    <section class="px-3">
        <div
            class="flex flex-wrap bg-white rounded-[28px] md:px-[83px] py-[26px] justify-evenly lg:justify-center font-poppins md:w-max mx-auto gap-8 md:gap-20 lg:gap-[100px]">
            <div class="grid text-center">
                <div class="text-xl md:text-[28px] font-semibold text-dark">{{ itemCount }}</div>
                <p class="text-gray-400 md:text-lg">Artworks</p>
            </div>
            <div class="grid text-center">
                <div class="text-xl md:text-[28px] font-semibold text-dark">{{ userCount }}</div>
                <p class="text-gray-400 md:text-lg">Creators</p>
            </div>
            <div class="grid text-center">
                <div class="text-xl md:text-[28px] font-semibold text-dark">{{ totalViews }}</div>
                <p class="text-gray-400 md:text-lg">Views</p>
            </div>
            <div class="grid text-center">
                <div class="text-xl md:text-[28px] font-semibold text-dark">12M</div>
                <p class="text-gray-400 md:text-lg">NFT Sold</p>
            </div>
        </div>
    </section>

    <!-- Featured -->
    <section
        class="max-w-screen-2xl mx-auto xl:pr-[62px] xl:px-[120px] lg:pl-[75px] lg:pr-[55px] px-3 py-[100px] font-raleway">
        <div class="grid text-[26px] mb-[30px]">
            <p class="font-bscript text-pinkly">Featured</p>
            <div class="font-bold font-raleway text-[#FEFCFD]">Today's Bidding</div>
        </div>
        <!-- Card Container -->
        <div class="flex flex-nowrap gap-[50px] overflow-x-auto card-container">
            <!-- Card -->
            <ItemCard :items="todayItems.data"></ItemCard>
        </div>
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
                        <path d="M2.66669 16H29.3334" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                        <path d="M29.3334 16H2.66669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.26669 6.8135L2.66669 16.0002V24.0002C2.66669 24.7074 2.94764 25.3857 3.44774 25.8858C3.94783 26.3859 4.62611 26.6668 5.33335 26.6668H26.6667C27.3739 26.6668 28.0522 26.3859 28.5523 25.8858C29.0524 25.3857 29.3334 24.7074 29.3334 24.0002V16.0002L24.7334 6.8135C24.5126 6.36921 24.1723 5.99532 23.7506 5.73387C23.329 5.47241 22.8428 5.33376 22.3467 5.3335H9.65335C9.15724 5.33376 8.67104 5.47241 8.24941 5.73387C7.82779 5.99532 7.48746 6.36921 7.26669 6.8135V6.8135Z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M13.3333 21.3335H13.3466" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8 21.3335H8.01333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                    Data Secured
                </div>
                <p class="text-nardo-gray text-base font-poppins">
                    No hacker is able to get <br> your privacy, it's safe
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

            <!-- Item 4 -->
            <div class="col-span-6 md:col-span-3 lg:col-span-2 text-center max-w-max group select-none mx-auto">
                <div
                    class="bg-dark-purple group-hover:bg-lemon-green w-max p-[19px] rounded-full mx-auto text-white group-hover:text-deep-green transition ease-out duration-300">
                    <svg width="32" height="32" viewBox="0 0 32 32" stroke="currentColor" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 5.3335H7.99998C6.52722 5.3335 5.33331 6.5274 5.33331 8.00016V24.0002C5.33331 25.4729 6.52722 26.6668 7.99998 26.6668H24C25.4727 26.6668 26.6666 25.4729 26.6666 24.0002V8.00016C26.6666 6.5274 25.4727 5.3335 24 5.3335Z"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20 12H12V20H20V12Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 1.3335V5.3335" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20 1.3335V5.3335" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 26.6665V30.6665" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M20 26.6665V30.6665" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M26.6667 12H30.6667" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M26.6667 18.6665H30.6667" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1.33331 12H5.33331" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.33331 18.6665H5.33331" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                    Super Fast
                </div>
                <p class="text-nardo-gray text-base font-poppins">
                    Upload your thousands <br> artworks, really fast
                </p>
            </div>

            <!-- Item 5 -->
            <div class="col-span-6 md:col-span-3 lg:col-span-2 text-center max-w-max group select-none mx-auto">
                <div
                    class="bg-dark-purple group-hover:bg-lemon-green w-max p-[19px] rounded-full mx-auto text-white group-hover:text-deep-green transition ease-out duration-300">
                    <svg width="32" height="32" viewBox="0 0 32 32" stroke="currentColor" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.66669 22.6665L16 29.3332L29.3334 22.6665" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M2.66669 16L16 22.6667L29.3334 16" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M16 2.6665L2.66669 9.33317L16 15.9998L29.3334 9.33317L16 2.6665Z" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="mt-6 mb-3 text-[#FEFCFD] text-xl font-semibold font-raleway">
                    Reliable System
                </div>
                <p class="text-nardo-gray text-base font-poppins">
                    We are using blockchain <br> latest technology
                </p>
            </div>

            <!-- Item 6 -->
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
        </div>
    </section>
</template>
