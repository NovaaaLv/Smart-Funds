<script setup>
import invesment from "@images/investment.png";
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-0">
    <div class="space-y-6">
      <div class="flex gap-5">
        <span
          class="uppercase text-[14px] font-bold text-teal-600 bg-teal-100 py-[3px] px-2 rounded"
          >our benefit
        </span>
        <div class="border-t-2 border-teal-600 w-[70px] mt-3"></div>
      </div>
      <p class="font-bold text-4xl max-w-[500px] capitalize">
        Unlock the Full Potential of Your Finances
      </p>
      <p class="text-sm text-secondary max-w-[500px]">
        Discover how our platform simplifies managing your finances. From tracking daily
        expenses to generating detailed reports, our website empowers you to take control
        of your financial journey with ease. Gain valuable insights, improve budgeting,
        and make better decisions—all in one place.
      </p>
      <p class="text-sm text-secondary max-w-[500px]">
        Everything is designed to make financial management easier and more efficient for
        you.
      </p>
      <button
        class="py-2 px-4 border rounded-lg border-teal-600 text-teal-600 text-sm font-semibold hover:text-white hover:bg-teal-600 transition-all duration-300"
      >
        Explore Service
      </button>
    </div>
    <div class="justify-center md:justify-end flex">
      <div class="w-[400px] p-3 bg-teal-100 rounded-tl-[50px] rounded-br-[50px]">
        <img :src="invesment" alt="" class="w-full" />
      </div>
    </div>
  </div>
</template>
