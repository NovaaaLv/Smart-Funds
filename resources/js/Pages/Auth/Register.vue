<script setup>
import Bank from "@images/bank-image.svg";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
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

  <div class="flex justify-center items-center h-screen gap-5 w-full">
    <div class="w-[500px]">
      <img :src="Bank" alt="Banking Illustration" class="w-full" />
    </div>
    <div class="p-4 rounded-lg border-slate-200 border space-y-6 w-1/3">
      <div>
        <p class="text-sm text-slate-500">Make account to manage your financex</p>
        <p class="font-bold text-blue-600 text-xl">Register</p>
      </div>
      <form @submit.prevent="submit" class="items-center flex flex-col gap-3">
        <div class="w-full space-y-2">
          <InputLabel for="name" value="Name" />
          <TextInput
            id="name"
            type="text"
            class="rounded-lg px-4 py-[3px] border transition-all duration-300 outline-none w-full"
            placeholder="Your Name"
            v-model="form.name"
            required
            autofocus
            autocomplete="name"
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="w-full space-y-2">
          <InputLabel for="email" value="Email" />
          <TextInput
            id="email"
            type="email"
            placeholder="Your Email"
            class="rounded-lg px-4 py-[3px] border focus:border-slate-500 transition-all duration-300 outline-none w-full"
            v-model="form.email"
            required
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div class="w-full space-y-2">
          <InputLabel for="password" value="Password" />
          <TextInput
            id="password"
            type="password"
            placeholder="Your Password"
            class="rounded-lg px-4 py-[3px] border focus:border-slate-500 transition-all duration-300 outline-none w-full"
            v-model="form.password"
            required
            autocomplete="new-password"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <div class="w-full space-y-2">
          <InputLabel for="password_confirmation" value="Confirm Password" />
          <TextInput
            id="password_confirmation"
            type="password"
            placeholder="Confirm Password"
            class="rounded-lg px-4 py-[3px] border focus:border-slate-500 transition-all duration-300 outline-none w-full"
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
            Have an account? Login
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
