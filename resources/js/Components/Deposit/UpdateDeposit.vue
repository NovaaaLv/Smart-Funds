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
        <InputLabel label="income" placeholder="income" v-model="form.income" />
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
  income: null,
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
      form.income = newItem.income;
      form.date = newItem.date;
    }
  },
  { immediate: true }
);

const submit = async () => {
  await form.post(`/update-deposits/${props.selectedItem?.id}`, {
    onSuccess: () => {
      form.reset();
      emit("close");
    },
    onError: (errors) => {
      console.error("Errors:", errors);
    },
  });
};
</script>
