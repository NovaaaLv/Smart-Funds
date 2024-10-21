<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
  type: String,
  required: true,
});

const props = defineProps({
  placeholder: {
    type: String,
    default: "Placeholder",
  },
});

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <input
    ref="input"
    type="text"
    v-model="model"
    :placeholder="placeholder"
    class="text-sm w-full rounded border-slate-600 h-8 text-slate-600 focus:border-slate-800 focus:shadow-xl shadow-sm focus:ring-0 duration-300 ease-in-out transition-all"
  />
</template>
