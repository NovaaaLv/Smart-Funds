<template>
  <div class="p-4 md:p-8 lg:p-12 w-full">
    <form class="w-[50%]" @submit.prevent="submit">
      <InputLabel label="Name" placeholder="Name" v-model="form.name" />
      <InputLabel label="Alamat" placeholder="Alamat" v-model="form.alamat" />
      <!-- <InputLabel label="date" type="date" v-model="form.date" /> -->
      <button>SUBMIT</button>
    </form>
  </div>
</template>

<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  name: null,
  alamat: null,
  //   date: null,
});

function submit() {
  form.post(route("testPost")),
    {
      onSucces() {},
    };
}
</script>
