<script setup>

import { Link, usePage } from '@inertiajs/inertia-vue3';
import { computed,ref } from '@vue/reactivity';

const authenticated = usePage().props.value.auth.user;
const showSignIn = computed(() => (route().current() !== "login" && usePage().props.value.auth.user == null))

const isShowDropdown = ref(false);
const openDropdownProfile = ref(false);


</script>


<template>
    <nav class="max-w-screen-2xl mx-auto xl:px-[120px] lg:px-[75px] px-3 lg:pt-[30px] pt-4">
        <div class="flex flex-col lg:flex-row gap-8 justify-between lg:items-center">
            <!-- App Logo & Navbar Toggler -->
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <Link :href="route('homepage')">
                <img src="/assets/images/showcase.svg" alt="">
                </Link>
                <!-- Button Toggler -->
                <button class="text-white outline-none block lg:hidden" data-target="#navbar-item" id="togglerButton">
                    <svg class="text-white w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Navigation Menu -->
            <div class="hidden lg:block" id="navbar-item">
                <div class="nav-link flex flex-col lg:flex-row lg:items-center gap-5 lg:gap-12 font-raleway">
                    <a href="index.html" class="nav-item active">Home</a>
                    <a href="#!" class="nav-item">Browse</a>
                    <a href="#!" class="nav-item">Creators</a>
                    <a href="#!" class="nav-item">Story</a>
                    <a href="#!" class="nav-item">Projects</a>
                    <div class="action-button grid lg:flex gap-4 items-center">
                        <a href="#!" class="bg-dark-purple p-[3px] rounded-full w-max">
                            <img src="assets/images/ic-search.svg" alt="">
                        </a>
                        <Link v-show="showSignIn" :href="route('login')"
                            class=" bg-dark-purple rounded-full text-center px-10 py-3">
                        <span class="text-white font-medium text-base">Sign In</span>
                        </Link>
                        <div @click="openDropdownProfile = !openDropdownProfile" v-show="authenticated !== null"
                            class="collapsible-dropdown flex flex-col gap-2 relative">
                            <a href="#!" class="rounded-full dropdown-button flex items-center"
                                data-target="#dropdown-target">
                                <img :src="authenticated ? authenticated.avatar_url : ''"
                                    class="rounded-full object-cover w-[45px]" alt="stream" />
                                <span class="text-white text-base ml-[10px] relative">{{ authenticated?.name }}</span>
                            </a>

                            <!-- Dropdown box -->
                            <div v-show="openDropdownProfile"
                                class="bg-white rounded-2xl text-dark font-medium flex flex-col gap-1 absolute z-[999] lg:right-0 top-[60px] min-w-[180px]"
                                id="dropdown-target">
                                <Link :href="route('dashboard')" class="transition-all hover:bg-sky-100 px-4 py-3">
                                Dashboard
                                </Link>
                                <!-- <Link :href="route('profile')" class="transition-all hover:bg-sky-100 px-4 py-3">My
                                Profile
                                </Link>
                                <Link :href="route('setting')" class="transition-all hover:bg-sky-100 px-4 py-3">
                                Settings
                                </Link> -->
                                <Link :href="route('logout')" method="post"
                                    class="transition-all hover:bg-sky-100 px-4 py-3">Sign Out</Link>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
