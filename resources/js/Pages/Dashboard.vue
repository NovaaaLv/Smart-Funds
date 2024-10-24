<script setup>
import { computed } from "vue";

const props = defineProps({
  deposits: {
    type: Array,
    required: true,
  },
  expenses: {
    type: Array,
    required: true,
  },
  chart: Object,
});

const totalIncome = computed(() => {
  return props.deposits.reduce((sum, deposit) => {
    const validTotal =
      typeof deposit.income === "number"
        ? deposit.income
        : parseFloat(deposit.income) || 0;
    return sum + validTotal;
  }, 0);
});

const totalExpenses = computed(() => {
  return props.expenses.reduce((sum, expense) => {
    const validTotal =
      typeof expense.total === "number" ? expense.total : parseFloat(expense.total) || 0;
    return sum + validTotal;
  }, 0);
});

const balance = computed(() => {
  return totalIncome.value - totalExpenses.value;
});

const totalItems = computed(() => {
  return props.expenses.reduce((sum, expense) => {
    const validItems =
      typeof expense.amount === "number"
        ? expense.amount
        : parseFloat(expense.amount) || 0;
    return sum + validItems;
  }, 0);
});

function formatRupiah(angka) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(angka);
}
</script>

<template>
  <Head title="Dashboard" />
  <div
    class="w-screen overflow-x-hidden grid grid-cols-2 md:grid-cols-6 lg:grid-cols-12 gap-4 text-slate-800 p-4 md:p-8 lg:p-12 grid-rows-[auto] auto-rows-min"
  >
    <!-- Balance -->
    <div
      class="col-span-2 md:col-span-3 py-3 md:py-5 rounded-lg bg-slate-800 flex justify-center items-center gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-slate-500 rounded-xl">
        <i class="fa-solid fa-wallet text-base md:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Balance</p>
        <p class="font-bold text-base md:text-xl">{{ formatRupiah(balance) }}</p>
      </div>
    </div>

    <!-- Income -->
    <div
      class="col-span-2 md:col-span-3 py-3 md:py-5 rounded-lg bg-emerald-800 flex justify-center items-center gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-emerald-500 rounded-xl">
        <i class="fa-solid fa-hand-holding-dollar text-base md:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Income</p>
        <p class="font-bold text-base md:text-xl">{{ formatRupiah(totalIncome) }}</p>
      </div>
    </div>

    <!-- Expenses -->
    <div
      class="col-span-2 md:col-span-3 py-3 md:py-5 rounded-lg bg-red-800 flex justify-center items-center gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-red-500 rounded-xl">
        <i class="fa-solid fa-coins text-base md:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Expenses</p>
        <p class="font-bold text-base md:text-xl">{{ formatRupiah(totalExpenses) }}</p>
      </div>
    </div>

    <!-- Commodity -->
    <div
      class="col-span-2 md:col-span-3 py-3 md:py-5 rounded-lg bg-cyan-800 flex justify-center items-center gap-5 text-white shadow-xl px-3"
    >
      <div class="py-2 md:py-3 px-3 md:px-4 bg-cyan-500 rounded-xl">
        <i class="fa-solid fa-wind text-base md:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm w-[100px] md:w-[125px]">Commodity</p>
        <p class="font-bold text-base md:text-xl">{{ totalItems }} Items</p>
      </div>
    </div>

    <!-- Overview -->
    <div
      class="col-span-2 md:col-span-6 lg:col-span-8 py-5 bg-white shadow-xl rounded-lg lg:row-span-2 p-5 font-bold"
    >
      <apexchart
        :width="chart.width"
        :height="chart.height"
        :type="chart.type"
        :options="chart.options"
        :series="chart.series"
      ></apexchart>
    </div>

    <!-- Last Month -->
    <div
      class="col-span-2 md:col-span-2 py-5 bg-white shadow-xl rounded-lg p-5 lg:col-span-4"
    >
      <p class="font-bold">Last Month</p>
    </div>

    <!-- Latest Items Added -->
    <div
      class="col-span-2 md:col-span-4 py-5 bg-white shadow-xl rounded-lg lg:row-span-2 p-5 flex flex-col gap-2"
    >
      Latest Items Added
    </div>

    <!-- Additional Responsive Content -->
    <div
      class="col-span-2 md:col-span-3 py-5 bg-white shadow-xl rounded-lg p-5 lg:col-span-4"
    >
      Additional content 1
    </div>
    <div
      class="col-span-2 md:col-span-3 py-5 bg-white shadow-xl rounded-lg p-5 lg:col-span-4"
    >
      Additional content 2
    </div>
  </div>
</template>
