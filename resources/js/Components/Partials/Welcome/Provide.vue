<script setup>
import app from "@icons/app.png";
import graduation from "@icons/graduation-cap.png";
import shield from "@icons/shield.png";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="flex flex-col gap-16">
        <div>
            <p class="text-4xl font-bold max-w-[700px]">
                Our Team Provides Valuable Services at Any Time in Any Situation
            </p>
        </div>
        <div
            class="flex justify-center md:justify-between items-center flex-wrap md:gap-0 gap-9"
        >
            <div class="flex flex-col gap-4 max-w-[300px]">
                <div class="">
                    <div class="w-fit bg-blue-100 p-5 rounded-full">
                        <img :src="graduation" alt="" class="w-[25px] h-auto" />
                    </div>
                </div>
                <p class="text-2xl font-bold">Expert Guidance</p>
                <p class="text-sm">
                    Rely on seasoned professionals for tailored financial advice
                    and strategic planning aligned with your unique goals
                </p>
                <Link href="#" class="text-sm text-teal-600">Read more</Link>
            </div>
            <div class="flex flex-col gap-4 max-w-[300px]">
                <div class="">
                    <div class="w-fit bg-red-100 p-5 rounded-full">
                        <img :src="shield" alt="" class="w-[25px] h-auto" />
                    </div>
                </div>
                <p class="text-2xl font-bold">Risk Management</p>
                <p class="text-sm">
                    We expertly handle and proactively mitigate financial risks,
                    ensuring the safeguard of assets and overall stability
                </p>
                <Link href="#" class="text-sm text-teal-600">Read more</Link>
            </div>
            <div class="flex flex-col gap-4 max-w-[300px]">
                <div class="">
                    <div class="w-fit bg-teal-100 p-5 rounded-full">
                        <img :src="app" alt="" class="w-[25px] h-auto" />
                    </div>
                </div>
                <p class="text-2xl font-bold">Customized Solutions</p>
                <p class="text-sm">
                    Receive and Benefit from with financial solutions that
                    tailored to your unique financial challenges and aspirations
                </p>
                <Link href="#" class="text-sm text-teal-600">Read more</Link>
            </div>
        </div>
    </div>
</template>
