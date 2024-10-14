<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
    <nav class="flex items-center justify-between py-4 text-primary">
        <!-- Logo -->
        <div class="text-3xl font-bold">SmartFuds</div>

        <div class="block md:hidden">
            <button @click="toggleMenu">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div
            :class="[
                'flex-col md:flex-row flex items-center gap-2 py-2  md:static fixed top-16 right-[80px] w-[200px] md:w-auto border rounded-lg md:hidden',
                { hidden: !isMenuOpen, 'bg-white z-10': isMenuOpen },
            ]"
        >
            <button class="text-teal-600 font-semibold">Sign in</button>
            <button
                class="bg-teal-600 text-white px-4 py-2 rounded font-semibold"
            >
                Get Started
            </button>
        </div>

        <!-- Action Buttons -->
        <div class="hidden md:flex items-center gap-3">
            <Link class="text-teal-600 font-semibold" :href="route('login')"
                >Sign in</Link
            >
            <Link
                class="bg-teal-600 text-white px-4 py-2 rounded font-semibold"
                :href="route('register')"
            >
                Get Started
            </Link>
        </div>
    </nav>
</template>
