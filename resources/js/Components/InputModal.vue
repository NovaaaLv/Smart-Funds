<script setup>
import { ref, onMounted } from "vue";

// Props yang diterima oleh komponen
const props = defineProps({
  placeholder: {
    type: String,
    default: "Items",
  },
  label: {
    type: String,
    default: "Item",
  },
  type: {
    type: String,
    default: "text",
  },
  modelValue: [String, Number],
  disabled: {
    type: Boolean,
    default: false,
  },
});

// Event emit yang akan mengirim event ke parent
const emit = defineEmits(["update:modelValue"]);

const input = ref(null);

// Fokus otomatis jika input memiliki atribut "autofocus"
onMounted(() => {
  if (input.value && input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

// Mengupdate value dan mengirim event ke parent
const updateValue = (e) => {
  let value = e.target.value;

  // Konversi ke number jika tipe input adalah "number"
  if (props.type === "number") {
    value = parseFloat(value);
  }

  emit("update:modelValue", value); // Emit event untuk update nilai
};
</script>

<template>
  <div class="w-full">
    <p class="font-bold text-slate-600">{{ label }}</p>
    <input
      ref="input"
      :type="type"
      :placeholder="placeholder"
      :value="modelValue"
      :disabled="disabled"
      @input="updateValue"
      class="text-sm w-full rounded border-slate-600 h-8 text-slate-600 focus:border-slate-800 focus:shadow-xl shadow-sm focus:ring-0 duration-300 ease-in-out transition-all"
    />
  </div>
</template>
