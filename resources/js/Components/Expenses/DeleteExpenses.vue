<template>
  <button
    :disabled="!selectedItem"
    :class="{
      'opacity-50 cursor-not-allowed': !selectedItem,
      'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
    }"
    class="flex items-center gap-5 px-3 py-2 text-white bg-red-800 border rounded w-full transition-opacity duration-300"
  >
    <div>
      <i class="fa-solid fa-ban text-white"></i>
    </div>
    <p class="uppercase text-sm font-bold">Hapus Barang</p>
  </button>
</template>

<script setup>
const props = defineProps({
  selectedItem: {
    type: Object,
    required: true,
  },
});
</script>
