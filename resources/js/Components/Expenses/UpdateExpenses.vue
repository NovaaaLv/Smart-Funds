<template>
  <div class="col-span-6 lg:col-span-4 bg-white shadow-xl rounded-lg row-span-5 p-5">
    <div class="flex items-center justify-between pr-2">
      <p class="font-bold px-2 uppercase text-slate-700 text-sm">Update the Expenses</p>

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

const emit = defineEmits(["remove"]);

const handleRemove = () => {
  emit("remove");
};

const form = useForm({
  item_name: null,
  amount: null,
  price: null,
  total: 0,
  date: null,
});

const props = defineProps({
  selectedItem: {
    type: Object,
    required: true,
  },
});

watch(
  () => props.selectedItem,
  (newItem) => {
    if (newItem) {
      form.item_name = newItem.item_name;
      form.amount = newItem.amount;
      form.price = newItem.price;
      form.total = newItem.total;
      form.date = newItem.date;
    }
  },
  { immediate: true }
);

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

const submit = async () => {
  await form.post(`/update-expenses/${props.selectedItem?.id}`, {
    onSuccess: () => {
      form.reset();
      emit("close");
      //   emit("refresh");
    },
    onError: (errors) => {
      console.error("Errors:", errors);
    },
  });
};
</script>
