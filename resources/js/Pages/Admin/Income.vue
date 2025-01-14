<script setup>
import { ref, computed } from "vue";
import AddDeposit from "@/Components/Deposit/AddDeposit.vue";
import UpdateDeposit from "@/Components/Deposit/UpdateDeposit.vue";

const AddDeposits = ref(false);
const UpdateDeposits = ref(false);
const selectedItem = ref({});

const props = defineProps({
  deposits: {
    type: Array,
    required: true,
  },
  expenses: {
    type: Array,
    required: true,
  },
  userId: {
    type: Array,
    required: true,
  },
  selectedItem: {
    type: Object,
    default: null,
  },
  chart: Object,
});

// Fungsi untuk menjumlahkan semua total expenses
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

const totalTransaction = computed(() => {
  const userId = props.userId;
  console.log(userId);
  return props.deposits.filter((deposit) => deposit.user_id === userId).length;
});

const balance = computed(() => {
  return totalIncome.value - totalExpenses.value;
});

// Fungsi untuk memilih item dari tabel
const selectItem = (deposit) => {
  selectedItem.value = deposit;
};

function formatRupiah(angka) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(angka);
}
</script>

<template>
  <Head title="Income" />

  <div
    class="w-screen overflow-x-hidden grid grid-cols-6 md:grid-cols-8 lg:grid-cols-12 gap-4 text-slate-800 p-4 md:p-8 lg:p-12"
  >
    <div
      class="col-span-3 md:col-span-2 lg:col-span-3 row-span-1 shadow-xl rounded-lg flex bg-emerald-800 text-white items-center gap-3 px-5 py-2"
    >
      <div class="py-3 px-4 bg-emerald-500 rounded-xl">
        <i class="fa-solid fa-hand-holding-dollar text-lg md:text-xl lg:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Income Total</p>
        <p class="font-bold text-base md:text-lg lg:text-xl">
          {{ formatRupiah(totalIncome) }}
        </p>
      </div>
    </div>
    <div
      class="col-span-3 md:col-span-2 lg:col-span-3 shadow-xl rounded-lg row-span-1 flex bg-cyan-800 text-white items-center gap-3 px-5 py-2"
    >
      <div class="py-3 px-4 bg-cyan-500 rounded-xl">
        <i class="fa-brands fa-dropbox text-lg md:text-xl lg:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Transaction Total</p>
        <p class="font-bold text-base md:text-lg lg:text-xl">{{ totalTransaction }} X</p>
      </div>
    </div>
    <div
      class="col-span-6 md:col-span-2 lg:col-span-3 shadow-xl rounded-lg row-span-1 bg-orange-800 flex items-center gap-3 text-white px-5 py-2"
    >
      <div class="py-3 px-4 bg-orange-500 rounded-xl">
        <i class="fa-brands fa-dropbox text-lg md:text-xl lg:text-2xl"></i>
      </div>
      <div>
        <p class="text-xs md:text-sm">Balance</p>
        <p class="font-bold text-base md:text-lg lg:text-xl">
          {{ formatRupiah(balance) }}
        </p>
      </div>
    </div>

    <div
      class="col-span-2 md:col-span-2 lg:col-span-3 bg-white shadow-xl rounded-lg row-span-6 p-5 group"
    >
      <p class="font-bold uppercase text-xs md:text-sm text-slate-700">features</p>
      <div class="w-full">
        <div class="mt-5 space-y-3">
          <div
            class="w-full relative opacity-95 group-hover:opacity-30 hover:!opacity-95 transition-opacity duration-300"
          >
            <input
              type="text"
              name="search"
              id="search"
              placeholder="Search Items"
              class="w-full rounded border-slate-400 placeholder:text-xs md:placeholder:text-sm focus:ring-slate-200 focus:border-slate-400 text-xs md:text-sm text-slate-500 pl-9 focus:shadow duration-300 transition-all"
            />
            <div class="absolute text-slate-500 top-2 left-3">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
          <button
            v-if="!AddDeposits"
            @click="AddDeposits = true"
            class="flex items-center gap-5 px-3 py-2 text-white bg-emerald-800 border rounded w-full opacity-95 group-hover:opacity-30 hover:!opacity-95 transition-opacity duration-300"
          >
            <div>
              <i class="fa-solid fa-plus text-xl text-white"></i>
            </div>
            <p class="uppercase text-sm font-bold">Add Income</p>
          </button>
          <button
            v-if="!UpdateDeposits"
            @click="UpdateDeposits = true"
            :disabled="!selectedItem"
            :class="{
              'opacity-50 cursor-not-allowed': !selectedItem,
              'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
            }"
            class="flex items-center gap-5 px-3 py-2 text-white bg-cyan-800 border rounded w-full transition-opacity duration-300"
          >
            <div>
              <i class="fa-solid fa-pen text-white"></i>
            </div>
            <p class="uppercase text-sm font-bold">Update Income</p>
          </button>
          <!-- <button
            :disabled="!selectedItem"
            :class="{
              'opacity-50 cursor-not-allowed': !selectedItem,
              'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
            }"
            class="flex items-center gap-5 px-3 py-2 text-xs md:text-sm font-bold text-white bg-red-800 border rounded w-full transition-opacity duration-300"
          >
            <div>
              <i class="fa-solid fa-ban text-lg md:text-xl"></i>
            </div>
            <p class="uppercase">Delete Income</p>
          </button> -->
        </div>
      </div>
    </div>

    <div
      class="col-span-4 md:col-span-6 lg:col-span-9 bg-white shadow-xl rounded-lg row-span-10 p-5"
    >
      <p class="font-bold px-2 uppercase text-xs md:text-sm text-slate-700">
        deposit list
      </p>
      <div class="h-full overflow-y-auto scrollbar-none">
        <table class="table-auto w-full mt-5">
          <thead>
            <tr class="bg-slate-100">
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[5%] py-[7px]"
              >
                No
              </th>
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[20%] py-[7px]"
              >
                Income
              </th>
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[20%] py-[7px]"
              >
                Date
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(deposit, index) in props.deposits"
              :key="deposit.id"
              class="hover:bg-teal-100 cursor-pointer transition-all duration-300 rounded border-b text-center"
              @click="selectItem(deposit)"
              :class="{ 'bg-teal-200': selectedItem && selectedItem.id === deposit.id }"
            >
              <td class="text-xs md:text-sm py-[10px] px-5 text-slate-500">
                {{ index + 1 }}
              </td>
              <td
                class="text-xs md:text-sm py-[10px] px-5 text-slate-500 flex items-center justify-center text-start"
              >
                <div class="w-[100px] text-wrap">
                  {{ formatRupiah(deposit.income) }}
                </div>
              </td>
              <td class="text-xs md:text-sm py-[10px] px-5 text-slate-500 text-center">
                {{ deposit.date }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <AddDeposit sit v-if="AddDeposits" @remove="AddDeposits = false" />
    <UpdateDeposit
      v-if="UpdateDeposits"
      :selected-item="selectedItem"
      @close="UpdateDeposits = false"
    />

    <div
      :class="{
        'col-span-6 lg:col-span-3': !AddDeposits,
        'col-span-6 lg:col-span-12': AddDeposits,
      }"
      class="bg-white shadow-xl rounded-lg row-span-5"
    >
      <div class="py-5 px-2">
        <apexchart
          :width="chart.width"
          :height="chart.height"
          :type="chart.type"
          :options="chart.options"
          :series="chart.series"
        ></apexchart>
      </div>
    </div>
  </div>
</template>
