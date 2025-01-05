<template>
  <div class="col-span-6 lg:col-span-4 bg-white shadow-xl rounded-lg row-span-5 p-5">
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
        <InputLabel
          label="Name Items"
          placeholder="Name Items"
          v-model="form.item_name"
        />
        <InputLabel label="Amount" placeholder="Amount" v-model="form.amount" />
        <InputLabel label="Price" placeholder="Price" v-model="form.price" />
        <InputLabel
          label="Total"
          placeholder="Total"
          v-model="form.total"
          readonly="true"
        />
        <InputLabel label="Date" placeholder="Date" type="date" v-model="form.date" />
        <button
          class="bg-teal-600 text-white rounded-lg w-full font-bold py-1 text-sm mt-2"
          :disabled="form.processing"
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
import { watch } from "vue";

const emit = defineEmits(["remove", "refreshTable"]);

const handleRemove = () => {
  emit("remove");
};

const form = useForm({
  item_name: "",
  amount: null,
  price: null,
  total: 0,
  date: "",
});

watch(
  () => [form.amount, form.price],
  ([newAmount, newPrice]) => {
    if (newAmount && newPrice) {
      form.total = newAmount * newPrice;
    } else {
      form.total = 0;
    }
  }
);

function submit() {
  if (!isValidDate(form.date)) {
    alert("Please select a valid date.");
    return;
  }

  form.post(route("add-expenses"), {
    onSuccess: () => {
      alert("Expense added successfully!");
      form.reset();
      emit("refreshTable");
    },
    onError: (errors) => {
      const errorMessage = errors
        ? Object.values(errors).flat().join(", ")
        : "An unexpected error occurred.";
      alert(`Failed to add expense: ${errorMessage}`);
      console.error(errors);
    },
  });
}

// Function to validate date format (YYYY-MM-DD)
function isValidDate(dateString) {
  const datePattern = /^\d{4}-\d{2}-\d{2}$/; // Regex for YYYY-MM-DD
  return datePattern.test(dateString);
}
</script>
