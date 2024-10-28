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
    class="text-sm w-full rounded border-slate-300 h-8 text-slate-600 focus:border-slate-600 ring-0 focus:ring-0 duration-500 ease-in-out transition-all outline-none"
  />
</template>
