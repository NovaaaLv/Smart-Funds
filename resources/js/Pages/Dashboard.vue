<script setup></script>

<template>
  <Head title="Dashboard" />
  <div
    class="w-screen overflow-x-hidden grid grid-cols-2 md:grid-cols-6 lg:grid-cols-12 gap-4 text-slate-800 p-4 md:p-8 lg:p-12"
  >
    <!-- Balance -->
    <div
      class="col-span-1 md:col-span-3 py-3 md:py-5 rounded-lg bg-slate-800 flex justify-center items-center row-span-1 md:row-span-2 gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-slate-500 rounded-xl">
        <i class="fa-solid fa-wallet text-base md:text-2xl"></i>
      </div>
      <div class="">
        <p class="text-xs md:text-sm">Balance</p>
        <p class="font-bold text-base md:text-xl">Rp. 1.000.000</p>
      </div>
    </div>

    <!-- Income -->
    <div
      class="col-span-1 md:col-span-3 py-3 md:py-5 rounded-lg bg-emerald-800 flex justify-center items-center row-span-1 md:row-span-2 gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-emerald-500 rounded-xl">
        <i class="fa-solid fa-hand-holding-dollar text-base md:text-2xl"></i>
      </div>
      <div class="">
        <p class="text-xs md:text-sm">Income</p>
        <p class="font-bold text-base md:text-xl">Rp. 1.000.000</p>
      </div>
    </div>

    <!-- Expenses -->
    <div
      class="col-span-1 md:col-span-3 py-3 md:py-5 rounded-lg bg-red-800 flex justify-center items-center row-span-1 md:row-span-2 gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-red-500 rounded-xl">
        <i class="fa-solid fa-coins text-base md:text-2xl"></i>
      </div>
      <div class="">
        <p class="text-xs md:text-sm">Expenses</p>
        <p class="font-bold text-base md:text-xl">Rp. 1.000.000</p>
      </div>
    </div>

    <!-- Commodity -->
    <div
      class="col-span-1 md:col-span-3 py-3 md:py-5 rounded-lg bg-cyan-800 flex justify-center items-center row-span-1 md:row-span-2 gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-cyan-500 rounded-xl">
        <i class="fa-solid fa-wind text-base md:text-2xl"></i>
      </div>
      <div class="">
        <p class="text-xs md:text-sm w-[100px] md:w-[125px]">Commodity</p>
        <p class="font-bold text-base md:text-xl">500 Items</p>
      </div>
    </div>

    <!-- Overview -->
    <div
      class="col-span-2 md:col-span-6 lg:col-span-8 py-5 bg-white shadow-xl rounded-lg row-span-2 md:row-span-6 p-5"
    >
      Overview
    </div>

    <!-- Last Month -->
    <div
      class="col-span-2 md:col-span-2 py-5 bg-white shadow-xl rounded-lg row-span-2 md:row-span-5 p-5 lg:col-span-4"
    >
      <p class="font-bold">Last Month</p>
      <div
        class="w-full h-[85%] px-5 py-1 text-white space-y-3 mt-2 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-500 scrollbar-track-gray-50"
      >
        <div class="rounded-2xl w-full bg-emerald-200 px-3 py-2 flex gap-3 items-center">
          <div class="py-1 px-2 bg-emerald-800 rounded-xl">
            <i class="fa-solid fa-hand-holding-dollar text-lg"></i>
          </div>
          <div class="">
            <p class="text-xs text-slate-800">Income</p>
            <p class="font-bold text-sm text-slate-800">Rp. 1.000.000</p>
          </div>
        </div>
        <div
          class="rounded-2xl w-full bg-red-200 px-3 py-2 flex gap-3 items-center justify-end"
        >
          <div class="">
            <p class="text-xs text-slate-800 text-end">Expenses</p>
            <p class="font-bold text-sm text-slate-800 text-end">Rp. 1.000.000</p>
          </div>
          <div class="py-1 px-2 bg-red-800 rounded-xl">
            <i class="fa-solid fa-coins text-lg"></i>
          </div>
        </div>
        <div class="rounded-2xl w-full bg-cyan-200 px-3 py-2 flex gap-3 items-center">
          <div class="py-1 px-2 bg-cyan-800 rounded-xl">
            <i class="fa-solid fa-wind text-lg"></i>
          </div>
          <div class="">
            <p class="text-xs text-slate-800">Commodity</p>
            <p class="font-bold text-sm text-slate-800">500 Items</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Latest Items Added -->
    <div
      class="col-span-2 md:col-span-4 py-5 bg-white shadow-xl rounded-lg row-span-2 md:row-span-5 p-5 flex flex-col gap-2"
    ></div>

    <!-- Additional Responsive Content -->
    <div
      class="col-span-2 md:col-span-3 py-5 bg-white shadow-xl rounded-lg row-span-2 p-5 lg:col-span-4"
    >
      Additional content 1
    </div>
    <div
      class="col-span-2 md:col-span-3 py-5 bg-white shadow-xl rounded-lg row-span-2 p-5 lg:col-span-4"
    >
      Additional content 2
    </div>
  </div>
</template>
