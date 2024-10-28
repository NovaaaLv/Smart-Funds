<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import logIMG from "@images/LOGREGIMG.svg";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import imgSignUp from "@icons/resume.png";
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

  <div
    class="flex justify-center items-center h-screen gap-24 w-full flex-col-reverse md:flex-row"
  >
    <div
      class="p-4 rounded-lg border-slate-200 border space-y-6 w-[60%] md:w-1/3 relative"
    >
      <!-- Error message if login fails -->
      <div v-if="error" class="bg-red-100 text-red-600 p-3 rounded-lg text-sm">
        {{ error }}
      </div>

      <div>
        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>
        <p class="text-sm text-slate-500">Sign In your account to manage your finance</p>
        <p class="font-bold text-teal-600 text-xl">Sign In</p>
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
          class="ms-4 w-full bg-teal-600 rounded-lg py-2 flex justify-center text-white border border-teal-600 hover:bg-white hover:text-teal-600 duration-300 transition-all ease-in-out"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </button>
      </form>

      <!-- Register -->
      <Link
        :href="route('register')"
        class="absolute w-[70px] h-[60px] bg-teal-600 top-[78px] opacity-50 left-[-70px] rounded-tl-3xl rounded-bl-3xl items-center justify-start pl-7 cursor-pointer hover:opacity-95 hover:w-[100px] md:hover:w-[150px] hover:left-[-100px] md:hover:left-[-150px] transition-all duration-300 ease-in-out container-sign-up gap-4 hidden md:flex"
      >
        <img :src="imgSignUp" alt="" class="w-[30px] h-[30px]" />
        <span class="sign-up">Sign Up</span>
      </Link>
    </div>

    <div class="w-[300px] md:w-[450px]">
      <img :src="logIMG" alt="Banking Illustration" class="w-full block" />
    </div>
  </div>
</template>

<style scoped>
@keyframes slideInText {
  0% {
    opacity: 0;
    display: none;
    transform: translateX(80px);
  }
  100% {
    opacity: 1;
    display: block;
    transform: translateX(0);
  }
}

.sign-up {
  color: white;
  font-weight: bold;
  opacity: 0;
  visibility: hidden;
  transform: translateX(-40px);
  transition: visibility 0s linear 0.3s;
}

.container-sign-up:hover .sign-up {
  visibility: visible;
  display: block;
  opacity: 1;
  animation: slideInText 0.3s ease-in forwards;
}
</style>
