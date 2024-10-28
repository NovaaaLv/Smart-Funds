<script setup>
import RegisterIMG from "@images/LOGREGIMG.svg";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};

defineOptions({
  layout: GuestLayout,
});
</script>

<template>
  <Head title="Register" />

  <div
    class="flex justify-center items-center h-screen gap-10 w-full flex-col md:flex-row mt-[200px] md:mt-0"
  >
    <div class="w-[300px] md:w-[450px]">
      <img :src="RegisterIMG" alt="Banking Illustration" class="w-full" />
    </div>
    <div class="p-4 rounded-lg border-slate-200 border space-y-6 md:w-1/3 w-[85%]">
      <div>
        <p class="text-sm text-slate-500">Make account to manage your financex</p>
        <p class="font-bold text-teal-600 text-xl">Sign Up</p>
      </div>
      <form @submit.prevent="submit" class="items-center flex flex-col gap-3">
        <div class="w-full space-y-2">
          <TextInput
            id="name"
            type="text"
            class=""
            placeholder="Your Name"
            v-model="form.name"
            required
            autofocus
            autocomplete="name"
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="w-full space-y-2">
          <TextInput
            id="email"
            type="email"
            placeholder="Your Email"
            class=""
            v-model="form.email"
            required
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div class="w-full space-y-2">
          <TextInput
            id="password"
            type="password"
            placeholder="Your Password"
            class=""
            v-model="form.password"
            required
            autocomplete="new-password"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <div class="w-full space-y-2">
          <TextInput
            id="password_confirmation"
            type="password"
            placeholder="Confirm Password"
            class=""
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />
          <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>
        <div class="w-full flex justify-end">
          <Link
            :href="route('login')"
            class="text-sm text-slate-500 hover:text-slate-700 hover:underline transition-all duration-300"
          >
            Have an account? Sign In
          </Link>
        </div>
        <div class="w-full flex justify-end">
          <button
            type="submit"
            class="rounded-lg px-7 py-1 border hover:bg-teal-600 hover:text-white bg-white text-teal-600 border-teal-600 transition-all duration-300 font-semibold"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
