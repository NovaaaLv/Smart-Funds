<template>
  <Link
    :href="props.link"
    :class="[
      'group relative flex items-center px-3 py-2 rounded-lg shadow-md border-2 text-xl transition-all duration-300',
      isActiveRoute
        ? 'bg-teal-600 text-white border-white ring-2 ring-teal-600'
        : 'bg-white text-teal-600 border-transparent',
      'hover:bg-teal-600 hover:text-white hover:border-white hover:ring-2 hover:ring-teal-600 active:outline-none active:ring-2 active:ring-white',
    ]"
  >
    <i :class="props.iconClass"></i>
    <div
      class="absolute flex items-center left-14 top-[10px] opacity-0 transition-opacity duration-200 ease-in-out group-hover:opacity-100 hidden md:flex"
    >
      <div class="w-3 overflow-hidden">
        <div class="h-4 bg-teal-600 transform rotate-45 origin-bottom-right"></div>
      </div>
      <span
        class="absolute text-sm px-3 py-1 rounded-tr-2xl rounded-br-2xl rounded-tl-lg rounded-bl-lg left-[11.9px] bg-teal-600 text-white"
      >
        {{ props.label }}
      </span>
    </div>
  </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { defineProps, computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
  link: {
    type: String,
    required: true,
  },
  iconClass: {
    type: String,
    default: "fa-solid fa-seedling",
  },
  label: {
    type: String,
  },
});

const page = usePage();

const isActiveRoute = computed(() => page.url === props.link);
</script>

<style scoped>
/* Add any additional styles here */
</style>
