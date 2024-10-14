<script setup>
import startnow from "@images/startnow.png";
</script>

<template>
    <div class="md:block hidden">
        <div
            class="bg-teal-700 rounded-xl h-[400px] items-center px-11 flex justify-between"
        >
            <div class="space-y-9">
                <div class="flex gap-5">
                    <span
                        class="uppercase text-[14px] font-semibold text-teal-400 py-[3px] px-2 rounded"
                        >start now
                    </span>
                    <div class="border-t-2 border-teal-400 w-[70px] mt-3"></div>
                </div>
                <p class="text-4xl font-bold text-white max-w-[400px]">
                    Get Start For Free No Credit Card Required
                </p>
                <div class="flex gap-5">
                    <input
                        type="text"
                        name=""
                        id=""
                        placeholder="Email addres"
                        class="px-4 py-2 rounded focus:outline-slate-400 placeholder:font-semibold"
                    />
                    <button
                        class="bg-teal-500 text-white px-4 py-2 rounded font-semibold"
                    >
                        Get Started
                    </button>
                </div>
                <p class="text-sm text-white">
                    Want to contact our team and book a call?
                    <a href="" class="text-teal-500"> Try it now </a>
                </p>
            </div>
            <div class="w-[400px]">
                <img :src="startnow" alt="" class="w-full" />
            </div>
        </div>
    </div>
</template>
