<script setup>
const model = defineModel({
  type: null,
});

defineProps({
  label: {
    type: String,
    required: true,
  },
  placeholder: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "text",
  },
  readonly: {
    type: String,
    required: false,
  },
});
</script>

<template>
  <div class="w-full">
    <p class="font-bold text-slate-600 text-sm">{{ label }}</p>
    <input
      :placeholder="placeholder"
      :type="type"
      v-model="model"
      :readonly="readonly"
      class="text-sm w-full rounded border-slate-600 h-8 text-slate-600 focus:border-slate-800 focus:shadow-xl shadow-sm focus:ring-0 duration-300 ease-in-out transition-all"
    />
  </div>
</template>
