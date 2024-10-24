<template>
  <div class="col-span-6 lg:col-span-3 bg-white shadow-xl rounded-lg row-span-5 p-5">
    <div class="flex items-center justify-between pr-2">
      <p class="font-bold px-2 uppercase text-slate-700 text-sm">Add Expenses</p>

      <button
        @click="handleRemove"
        class="hover:bg-red-600 rounded-full py-[6px] px-3 transition-all duration-300 hover:text-white"
      >
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form @submit.prevent="submit">
      <div class="flex flex-col gap-2 mt-4 px-2">
        <InputLabel label="Income" placeholder="Income" v-model="form.income" />
        <InputLabel label="Date" placeholder="Date" type="date" v-model="form.date" />
        <button
          class="bg-teal-600 text-white rounded-lg w-full font-bold py-1 text-sm mt-2"
        >
          SUBMIT
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import { useForm } from "@inertiajs/vue3";

const emit = defineEmits(["remove"]);

const handleRemove = () => {
  emit("remove");
};

const form = useForm({
  income: null,
  date: null,
});

function submit() {
  form.post(route("add-deposits"));
}
</script>
