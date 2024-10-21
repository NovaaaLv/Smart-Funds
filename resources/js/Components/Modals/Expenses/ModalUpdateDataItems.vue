<template>
  <button
    @click="$emit('close')"
    class="absolute h-screen w-screen bg-slate-800 opacity-40"
  ></button>
  <div
    class="absolute right-0 top-1/2 transform -translate-y-1/2 w-[30vw] h-[100vh] flex justify-center flex-col rounded-lg p-8 bg-white border-2 shadow-xl"
  >
    <p class="text-xl font-bold uppercase text-slate-700 text-start">Update Your Item</p>

    <form class="mt-9 gap-3 flex w-full flex-col" @submit.prevent="handleSubmit">
      <InputModal v-model="data.item_name" label="Name Item" placeholder="Name Item" />
      <div v-if="data.errors.item_name" class="text-sm text-red-500">
        {{ data.errors.item_name }}
      </div>

      <InputModal
        v-model.number="data.amount"
        type="number"
        label="Amount"
        placeholder="Amount"
      />
      <div v-if="data.errors.amount" class="text-sm text-red-500">
        {{ data.errors.amount }}
      </div>

      <InputModal
        v-model.number="data.price"
        type="number"
        label="Price"
        placeholder="Price"
      />
      <div v-if="data.errors.price" class="text-sm text-red-500">
        {{ data.errors.price }}
      </div>

      <InputModal v-model="data.total" label="Total" placeholder="Total" />
      <div class="w-[100%]">
        <p class="font-bold text-slate-600">Date</p>
        <input
          type="date"
          v-model="data.date"
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
import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import InputModal from "@components/InputModal.vue";

// Define emits for the component
const emit = defineEmits();

// mengambil props dari features
const props = defineProps({
  selectedItem: {
    type: Object,
    required: true,
  },
});

// menginisialisasi data
const data = useForm({
  item_name: null,
  amount: null,
  price: null,
  total: 0,
  date: null,
});

// memasukan kembali data yang diambil tadi
watch(
  () => props.selectedItem,
  (newItem) => {
    if (newItem) {
      data.item_name = newItem.item_name;
      data.amount = newItem.amount;
      data.price = newItem.price;
      data.total = newItem.total;
      data.date = newItem.date;
    }
  },
  { immediate: true }
);

// Melihat secara langsung saat price dan amount diganti total akan berubah
watch(
  () => [data.amount, data.price],
  ([newAmount, newPrice]) => {
    if (newAmount && newPrice) {
      data.total = newAmount * newPrice;
    } else {
      data.total = 0;
    }
  }
);

// Handle form submission
const handleSubmit = async () => {
  await data.post(`/update-items/${props.selectedItem?.id}`, {
    onSuccess: () => {
      // Emit close event to close the modal
      emit("close");
    },
    onError: (errors) => {
      console.error("Errors:", errors);
      // Optionally handle errors here if needed
    },
  });
};
</script>
