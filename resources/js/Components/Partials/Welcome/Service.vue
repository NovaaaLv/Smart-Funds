<script setup>
import service from "@images/service.png";
import dolarGreen from "@icons/dolar-green.png";
import homeBlue from "@icons/home-blue.png";
import pizzaChartRed from "@icons/pizza-char-red.png";
import prasastiYellow from "@icons/prasasti-yellow.png";
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-0 gap-9">
    <div class="justify-center md:justify-start flex md:order-1 order-2">
      <div class="w-[400px] p-3 bg-teal-100 rounded-tl-[50px] rounded-br-[50px]">
        <img :src="service" alt="" class="w-full" />
      </div>
    </div>

    <div class="space-y-6 md:order-2 order-1">
      <div class="flex gap-5">
        <span
          class="uppercase text-[14px] font-bold text-teal-600 bg-teal-100 py-[3px] px-2"
        >
          our service
        </span>
        <div class="border-t-2 border-teal-600 w-[70px] mt-3"></div>
      </div>
      <p class="font-bold text-4xl max-w-[500px]">Your All-In-One Financial Dashboard</p>
      <p class="text-sm text-secondary max-w-[500px]">
        From managing income and expenses to viewing insightful charts, everything you
        need is at your fingertips. Our platform is designed to make managing money
        stress-free, with tools that are simple, user-friendly, and powerful. Gain
        clarity, take control, and watch your financial health improve every day.
      </p>
      <div class="text-sm text-primary max-w-[500px] space-y-5">
        <div class="flex items-center gap-5">
          <div class="flex items-center gap-3">
            <div class="w-[30px]">
              <img :src="dolarGreen" alt="" class="w-full" />
            </div>
            <p class="font-semibold capitalize">income diagram</p>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-[30px]">
              <img :src="pizzaChartRed" alt="" class="w-full" />
            </div>
            <p class="font-semibold capitalize">expenditure diagram</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-3">
            <div class="w-[30px]">
              <img :src="homeBlue" alt="" class="w-full" />
            </div>
            <p class="font-semibold capitalize">financial planning</p>
          </div>
          <div class="flex items-center gap-3">
            <div class="w-[30px]">
              <img :src="prasastiYellow" alt="" class="w-full" />
            </div>
            <p class="font-semibold">Wealth Management</p>
          </div>
        </div>
      </div>
      <button
        class="py-2 px-4 border rounded-lg border-teal-600 text-teal-600 text-sm font-semibold hover:text-white hover:bg-teal-600 transition-all duration-300"
      >
        Explore Service
      </button>
    </div>
  </div>
</template>
