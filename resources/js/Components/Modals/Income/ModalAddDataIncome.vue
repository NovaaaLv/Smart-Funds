<template>
  <button
    @click="$emit('close')"
    class="absolute h-screen w-screen bg-slate-800 opacity-40"
  ></button>
  <div
    class="absolute right-0 top-1/2 transform -translate-y-1/2 w-[50vw] md:w-[30vw] h-[100vh] flex justify-center flex-col rounded-lg p-8 bg-white border-2 shadow-xl"
  >
    <p class="text-xl font-bold uppercase text-slate-700 text-start">Add An Item</p>

    <form
      class="mt-9 gap-3 flex w-full flex-col"
      @submit.prevent="data.post('/add-deposits')"
    >
      <InputModal
        v-model.number="data.income"
        type="number"
        label="Income"
        placeholder="Income"
      />
      <div v-if="data.errors.income" class="text-sm text-red-500">
        {{ data.errors.income }}
      </div>

      <div class="w-[100%]">
        <p class="font-bold text-slate-600">Date</p>
        <input
          type="date"
          v-model="date"
          class="text-sm w-full rounded border-slate-600 h-9 text-slate-600 focus:border-slate-800 focus:shadow-xl shadow-sm focus:ring-0 duration-300 ease-in-out transition-all"
        />
      </div>
      <div v-if="data.errors.date" class="text-sm text-red-500">
        {{ data.errors.date }}
      </div>
      <button
        class="bg-emerald-600 font-bold border border-emerald-600 hover:text-emerald-600 hover:bg-white text-white px-3 py-1 rounded-lg mt-3 transition-all duration-300 ease-in-out"
      >
        Submit
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import InputModal from "@components/InputModal.vue";

const today = new Date();
const year = today.getFullYear();
const month = String(today.getMonth() + 1).padStart(2, "0");
const day = String(today.getDate()).padStart(2, "0");

const date = ref(`${year}-${month}-${day}`); // Mengatur default value tanggal

// Data form dengan useForm dari Inertia
const data = useForm({
  income: null,
  date: date.value,
});
</script>
