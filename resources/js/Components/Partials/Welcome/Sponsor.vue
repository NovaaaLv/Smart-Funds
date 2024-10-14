<script setup>
import airbnb from "@images/sponsors/airbnb.png";
import amazon from "@images/sponsors/amazon.png";
import fedex from "@images/sponsors/fedex.png";
import ripple from "@images/sponsors/ripple.png";
import stripe from "@images/sponsors/stripe.png";
import walmart from "@images/sponsors/walmart.png";
</script>

<template>
    <div
        class="flex items-center justify-center gap-5 flex-wrap md:justify-between"
    >
        <div>
            <img
                :src="airbnb"
                alt="Airbnb "
                class="w-[150px] md:w-[150px] filter grayscale"
            />
        </div>
        <div>
            <img
                :src="fedex"
                alt="FedEx "
                class="w-[150px] md:w-[150px] filter grayscale"
            />
        </div>
        <div class="mt-[1rem]">
            <img
                :src="amazon"
                alt="Amazon "
                class="w-[130px] md:w-[130px] filter grayscale"
            />
        </div>
        <div>
            <img
                :src="ripple"
                alt="Ripple "
                class="w-[150px] md:w-[150px] filter grayscale"
            />
        </div>
        <div>
            <img
                :src="stripe"
                alt="Stripe "
                class="w-[100px] md:w-[100px] filter grayscale"
            />
        </div>
        <div>
            <img
                :src="walmart"
                alt="Walmart "
                class="md:w-[150px] w-[100px] filter grayscale"
            />
        </div>
    </div>
</template>
