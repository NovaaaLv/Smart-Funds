<script setup>
import Navigation from "@components/Partials/Navigation.vue";
import Hero from "@components/Partials/Welcome/Hero.vue";
import Sponsor from "@components/Partials/Welcome/Sponsor.vue";
import Expertise from "@components/Partials/Welcome/Expertise.vue";
import Service from "@components/Partials/Welcome/Service.vue";
import Testimonial from "@components/Partials/Welcome/Testimonial.vue";
import Provide from "@components/Partials/Welcome/Provide.vue";
import Startnow from "@components/Partials/Welcome/Startnow.vue";
import Footer from "@components/Partials/Footer.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineOptions({
  layout: GuestLayout,
});
</script>

<template>
  <Head title="Welcome" />
  <div class="max-w-[1050px] mx-auto text-primary space-y-28 px-20 md:px-0">
    <Navigation />
    <Hero />
    <Sponsor />
    <Expertise />
    <Service />
    <Testimonial />
    <Provide />
    <Startnow />
  </div>
  <Footer />
</template>
