<script setup>
import fb from "@icons/social/facebook.svg";
import ig from "@icons/social/instagram.svg";
import twt from "@icons/social/twitter.svg";
</script>

<template>
    <div class="bg-teal-600 text-white py-8 mt-24 px-20 md:px-0">
        <div
            class="grid md:grid-cols-10 grid-cols-4 gap-x-9 gap-y-16 max-w-[1050px] mx-auto pb-7 border-b"
        >
            <div class="col-span-2 md:col-span-4 space-y-6 order-1">
                <p class="font-bold text-2xl">NoLvue</p>
                <p class="max-w-[300px]">
                    Our expert financial consultants provide solutions to help
                    you achieve financial wealth. Trust us to guide you toward a
                    brighter financial future.
                </p>
                <div class="flex gap-5 items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-[15px]">
                            <img :src="fb" alt="" class="w-full" />
                        </div>
                        <a href="" class="text-sm">Facebook</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-[15px]">
                            <img :src="twt" alt="" class="w-full" />
                        </div>
                        <a href="" class="text-sm">Twitter</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-[15px]">
                            <img :src="ig" alt="" class="w-full" />
                        </div>
                        <a href="" class="text-sm">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="col-span-2 space-y-6 order-4 md:order-2">
                <p class="font-bold text-2xl">Our Service</p>
                <div class="text-slate-200 flex flex-col gap-y-4">
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Insurance Planning</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Estate Planning</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Tax Optimization</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Debt Management</a
                    >
                </div>
            </div>
            <div class="col-span-2 space-y-6 order-3">
                <p class="font-bold text-2xl">Explore More</p>
                <div class="text-slate-200 flex flex-col gap-y-4">
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >About us</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Blog</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Site map</a
                    >
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >Privacy</a
                    >
                </div>
            </div>
            <div class="col-span-2 space-y-6 order-2 md:order-4">
                <p class="font-bold text-2xl">Contact Details</p>
                <div class="text-slate-200 flex flex-col gap-y-4">
                    <a
                        href="#"
                        class="hover:text-white hover:underline transition-all duration-300"
                        >nodevaaa@gmail.com</a
                    >
                </div>
            </div>
        </div>
        <div
            class="grid grid-cols-1 md:grid-cols-2 mx-auto max-w-[1050px] pt-7"
        >
            <div class="md:text-start text-center">
                <p>NovaLVue Teams 2024 © All rights reserved</p>
            </div>
            <div class="flex items-center gap-5 md:justify-end justify-center">
                <span>Teams & Conditions </span>
                <span>Privacy Policy</span>
            </div>
        </div>
    </div>
</template>
