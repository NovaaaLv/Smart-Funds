<script setup>
import male from "@images/profile/male1.png";
import whitekutip from "@icons/white-kutip.svg";
import greenkutip from "@icons/green-kutip.svg";
import female1 from "@images/profile/female.png";
import female2 from "@images/profile/female-2.png";
</script>

<template>
    <div class="space-y-11">
        <div class="space-y-5">
            <div class="flex gap-5">
                <span
                    class="uppercase text-[14px] font-bold text-teal-600 bg-teal-100 py-[3px] px-2 rounded"
                    >testimonials
                </span>
                <div class="border-t-2 border-teal-600 w-[70px] mt-3"></div>
            </div>
            <p class="text-4xl font-bold">What Our Costumers Says</p>
            <p class="max-w-[500px] text-sm text-secondary">
                Discover the Success Stories and Satisfaction of Clients Who
                Have Benefited from Our Expertise and Personalized Financial
                Guidance
            </p>
        </div>

        <div
            class="flex flex-wrap md:gap-0 gap-y-7 md:justify-between justify-center"
        >
            <div
                class="flex flex-col max-w-[300px] space-y-4 p-9 border-2 border-slate-200 rounded-tl-[30px] rounded-br-[30px]"
            >
                <div class="flex items-center gap-5">
                    <div class="w-[50px]">
                        <img :src="male" alt="" class="w-full" />
                    </div>
                    <div class="">
                        <p class="font-bold">Alex Walker</p>
                        <p class="font-semibold text-gray-400 mt-[-5px]">
                            Attorney
                        </p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm text-secondary">
                        Estate planning is crucial, and they made the process
                        seamless and stress-free. I can rest assured knowing
                        family's future is secure
                    </p>
                </div>
                <div class="w-[40px] self-end">
                    <img :src="greenkutip" alt="" class="w-full" />
                </div>
            </div>
            <div
                class="flex flex-col max-w-[300px] space-y-4 p-9 border-2 border-teal-600 rounded-tl-[30px] rounded-br-[30px] bg-teal-600"
            >
                <div class="flex items-center gap-5">
                    <div class="w-[50px]">
                        <img :src="female1" alt="" class="w-full" />
                    </div>
                    <div class="">
                        <p class="font-bold text-white">Linda Carter</p>
                        <p class="font-semibold text-gray-100 mt-[-5px]">
                            Analyst
                        </p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm text-white">
                        Financial planning and investment advice I received from
                        this team completely transformed my future. I couldn't
                        be happier with the results.
                    </p>
                </div>
                <div class="w-[40px] self-end">
                    <img :src="whitekutip" alt="" class="w-full" />
                </div>
            </div>
            <div
                class="flex flex-col max-w-[300px] space-y-4 p-9 border-2 border-slate-200 rounded-tl-[30px] rounded-br-[30px]"
            >
                <div class="flex items-center gap-5">
                    <div class="w-[50px]">
                        <img :src="female2" alt="" class="w-full" />
                    </div>
                    <div class="">
                        <p class="font-bold">Grace Turner</p>
                        <p class="font-semibold text-gray-400 mt-[-5px]">
                            Director
                        </p>
                    </div>
                </div>
                <div class="">
                    <p class="text-sm text-secondary">
                        Financial expertise has made a significant impact on our
                        nonprofit financial stability, allowing us to better
                        serve our community
                    </p>
                </div>
                <div class="w-[40px] self-end">
                    <img :src="greenkutip" alt="" class="w-full" />
                </div>
            </div>
        </div>
    </div>
</template>
