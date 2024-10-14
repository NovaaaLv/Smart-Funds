<script setup>
import hero from "@images/hero.png";
</script>

<template>
    <div class="text-primary mt-20">
        <div class="grid gap-2 grid-cols-1 md:grid-cols-2">
            <div
                class="h-full order-1 md:order-2 flex justify-center md:justify-end"
            >
                <div class="w-[300px] md:w-[400px]">
                    <img :src="hero" alt="" class="w-full" />
                </div>
            </div>
            <div class="h-full order-2 md:order-1">
                <div class="flex flex-col h-full gap-16">
                    <div class="space-y-6">
                        <p
                            class="text-4xl md:text-6xl max-w-[450px] font-semibold"
                        >
                            Navigating the
                            <span class="text-teal-600"> Global </span>
                            financial landscape
                        </p>
                        <p
                            class="max-w-full md:max-w-[350px] text-sm text-secondary"
                        >
                            Empowering Your Journey to Global Financial Success
                            Through Customized and Personalized Financial
                            Consulting for Every Client
                        </p>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-start md:items-center gap-3"
                    >
                        <input
                            type="text"
                            placeholder="Your email address"
                            class="shadow-lg px-4 py-2 placeholder:font-semibold w-full md:w-[60%] focus:outline-slate-400"
                        />
                        <button
                            class="bg-teal-600 text-white px-4 py-2 rounded font-semibold mt-3 md:mt-0"
                        >
                            Get Started
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
