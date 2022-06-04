<script setup>

import FrontendLayout from '@/Layouts/Frontend/FrontendLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in"></Head>
    <FrontendLayout>
        <section
            class="max-w-screen-2xl mx-auto xl:px-[140px] lg:px-[95px] px-3 pt-20 pb-[100px] relative overflow-x-clip">
            <img src="assets/images/ornament.svg" class="absolute -right-[10%] top-[20%] -z-10" alt="">

            <div class="text-white font-raleway font-bold text-[32px] leading-[50px] max-w-[278px]">
                Sign In & <br> Promote Your NFT
            </div>
            <p class="text-lg leading-8 text-nardo-gray mt-5 font-poppins">
                Lorem ipsum product awesome that <br class="hidden md:block">
                listing more traffic in our network
            </p>

            <form @submit.prevent="submit" class="mt-[50px] font-poppins max-w-[400px] space-y-5">
                <div class="flex flex-col space-y-[10px]">
                    <label class="text-base text-nardo-gray capitalize">Email Address</label>
                    <input v-model="form.email" type="email" name="email" class="font-raleway rounded-full placeholder:placeholder-text text-base bg-form-bg py-[18px] px-7
                    text-input-text font-semibold placeholder:font-normal" placeholder="your email address...">
                </div>
                <div class="flex flex-col space-y-[10px]">
                    <label class="text-base text-nardo-gray capitalize">Password</label>
                    <input v-model="form.password" type="password" name="password" class="font-raleway rounded-full placeholder:placeholder-text text-base bg-form-bg py-[18px] px-7
                    text-input-text font-semibold placeholder:font-normal" placeholder="your password...">
                </div>

                <div class="grid gap-6 pt-[30px]">
                    <!-- <button type="submit"
                    class="py-[13px] px-[34px] w-full bg-yello rounded-full text-center drop-shadow-[0_12px_12px_rgba(249,200,90,0.4)]">
                    <span class="font-bold text-lg text-deep-yello font-raleway">
                        Sign In to My Account
                    </span>
                </button> -->
                    <button type="submit"
                        class="py-[13px] px-[34px] w-full bg-yello rounded-full text-center drop-shadow-[0_12px_12px_rgba(249,200,90,0.4)]">
                        <span class="font-bold text-lg text-deep-yello font-raleway">
                            Sign In to My Account
                        </span>
                    </button>
                    <a href="sign-up.html" class="py-[13px] px-[34px] w-full bg-dark-purple rounded-full text-center">
                        <span class="font-medium text-lg text-white font-raleway">
                            Sign Up
                        </span>
                    </a>
                </div>
            </form>
        </section>
    </FrontendLayout>
</template>
