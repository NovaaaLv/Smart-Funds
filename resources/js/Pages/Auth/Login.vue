<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import BankImage from "@images/bank-image.svg";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
    onError: (errors) => {
      error.value = errors;
    },
  });
};

defineOptions({
  layout: GuestLayout,
});
</script>

<template>
  <Head title="Log in" />

  <div class="flex justify-center items-center h-screen gap-5 w-full">
    <div class="p-4 rounded-lg border-slate-200 border space-y-6 w-1/3">
      <!-- Error message if login fails -->
      <div v-if="error" class="bg-red-100 text-red-600 p-3 rounded-lg text-sm">
        {{ error }}
      </div>

      <div>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>
        <p class="text-sm text-slate-500">Login your account to manage your finance</p>
        <p class="font-bold text-blue-600 text-xl">Login</p>
      </div>

      <form @submit.prevent="submit" class="items-center flex flex-col gap-3">
        <div class="w-full space-y-2">
          <TextInput
            id="email"
            type="email"
            placeholder="Your Email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="w-full space-y-2">
          <TextInput
            id="password"
            placeholder="Your Password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            required
            autocomplete="current-password"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4 block self-start">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" />
            <span class="ms-2 text-sm text-gray-600">Remember me</span>
          </label>
        </div>

        <div class="self-end">
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-end"
          >
            Forgot your password?
          </Link>
        </div>
        <button
          class="ms-4 w-full bg-cyan-600 rounded-lg py-2 flex justify-center text-white border border-cyan-600 hover:bg-white hover:text-cyan-600 duration-300 transition-all ease-in-out"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </button>
      </form>
    </div>

    <div class="w-[500px]">
      <img :src="BankImage" alt="Banking Illustration" class="w-full" />
    </div>
  </div>
</template>
