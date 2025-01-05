<template>
  <button
    :disabled="!selectedItem"
    :class="{
      'opacity-50 cursor-not-allowed': !selectedItem,
      'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
    }"
    class="flex items-center gap-5 px-3 py-2 text-white bg-red-800 border rounded w-full transition-opacity duration-300"
    @click="deleteItem"
  >
    <div>
      <i class="fa-solid fa-ban text-white"></i>
    </div>
    <p class="uppercase text-sm font-bold">delete expenses</p>
  </button>
</template>

<script setup>
import { router } from "@inertiajs/vue3";

const props = defineProps({
  selectedItem: {
    type: Object,
    required: true,
  },
});

const deleteItem = () => {
  if (props.selectedItem) {
    router.visit(route("destroy-expenses", props.selectedItem.id), {
      method: "delete",
      replace: true, // Menghindari caching state
      preserveState: false, // Hindari menyimpan state yang mungkin menyebabkan error
      onSuccess: () => {
        alert("Item berhasil dihapus");
      },
      onError: () => {
        alert("Gagal menghapus item");
      },
    });
  }
};
</script>
