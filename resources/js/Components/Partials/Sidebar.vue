<template>
  <div
    class="h-full hidden items-center flex-col py-14 shadow-[0_4px_20px_rgba(0,0,0,0.2)] rounded-tr-[30px] rounded-br-[30px] w-[80px] justify-between md:flex bg-white fixed left-0 top-0 bottom-0"
  >
    <div class="flex items-center flex-col gap-7">
      <div class="w-[50px]">
        <img :src="logo" alt="" class="w-full" />
      </div>
      <div class="flex gap-3 flex-col">
        <IconLink link="/dashboard" iconClass="fa-solid fa-seedling" label="Dashboard" />
        <IconLink link="/expenses" iconClass="fa-solid fa-sitemap" label="Expenses" />
        <IconLink
          link="/income"
          iconClass="fa-solid fa-circle-dollar-to-slot"
          label="Income"
        />
        <IconLink link="/settings" iconClass="fa-solid fa-gear" label="Settings" />
      </div>
    </div>
    <!-- <div class="w-full px-2">
      <button
        @click="signOut"
        class="bg-teal-600 rounded text-white text-xs w-full h-full border border-teal-600 transition-all duration-300 hover:bg-white hover:text-teal-600"
      >
        Sign Out
      </button>
    </div> -->
  </div>

  <div
    class="flex md:hidden justify-around items-center py-5 shadow-[0_4px_20px_rgba(0,0,0,0.2)] rounded-tr-[30px] rounded-tl-[30px] fixed bottom-0 left-4 right-8 bg-white px-7"
  >
    <div class="w-[50px]">
      <img :src="logo" alt="" class="w-full" />
    </div>

    <div class="flex gap-3">
      <IconLink link="/dashboard" iconClass="fa-solid fa-seedling" />
      <IconLink link="/expenses" iconClass="fa-solid fa-sitemap" />
      <IconLink link="/income" iconClass="fa-solid fa-circle-dollar-to-slot" />
      <IconLink link="/settings" iconClass="fa-solid fa-gear" />
    </div>

    <!-- <div class="w-full px-2">
      <button
        @click="signOut"
        class="bg-teal-600 rounded text-white text-xs w-full h-full border border-teal-600 transition-all duration-300 hover:bg-white hover:text-teal-600"
      >
        Sign Out
      </button>
    </div> -->
  </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import IconLink from "@components/IconLink.vue";
import logo from "@icons/SmartFunds.svg";

const signOut = () => {
  Inertia.post("/logout");
};
</script>
