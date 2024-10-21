<script setup>
import { ref, computed } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ModalAddDataIncome from "@/Components/Modals/Income/ModalAddDataIncome.vue";
import ModalUpdateDataIncome from "@/Components/Modals/Income/ModalUpdateDataIncome.vue";

const isModalAddOpen = ref(false);
const isModalUpdateOpen = ref(false);

// State untuk melacak baris yang dipilih
const selectedItem = ref(null);

const props = defineProps({
  deposits: {
    type: Array,
    required: true,
  },
  expenses: {
    type: Array,
    required: true,
  },
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
  <AuthenticatedLayout>
    <div class="p-12 w-full h-full grid grid-cols-8 gap-5 grid-rows-10">
      <div
        class="col-span-2 shadow-xl rounded-2xl row-span-2 flex bg-emerald-800 text-white items-center justify-around"
      >
        <div class="py-3 px-4 bg-emerald-500 rounded-xl">
          <i class="fa-solid fa-hand-holding-dollar text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Incomee Total</p>
          <p class="font-bold text-xl">{{ formatRupiah(totalIncome) }}</p>
        </div>
      </div>
      <div
        class="col-span-2 shadow-xl rounded-2xl row-span-2 flex bg-cyan-800 text-white items-center justify-around"
      >
        <div class="py-3 px-4 bg-cyan-500 rounded-xl">
          <i class="fa-brands fa-dropbox text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Transaction Total</p>
          <p class="font-bold text-xl">X</p>
        </div>
      </div>
      <div
        class="col-span-2 shadow-xl rounded-2xl row-span-2 bg-orange-800 flex items-center justify-around text-white"
      >
        <div class="py-3 px-4 bg-orange-500 rounded-xl">
          <i class="fa-brands fa-dropbox text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Balance</p>
          <p class="font-bold text-xl">{{ formatRupiah(balance) }}</p>
        </div>
      </div>

      <div class="col-span-2 bg-white shadow-xl rounded-2xl row-span-6 p-5 group">
        <p class="font-bold uppercase text-slate-700">features</p>
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
                class="w-full rounded border-slate-400 placeholder:text-sm focus:ring-slate-200 focus:border-slate-400 text-sm text-slate-500 pl-9 focus:shadow duration-300 transition-all"
              />
              <div class="absolute text-slate-500 top-2 left-3">
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
            <button
              @click="isModalAddOpen = true"
              class="flex items-center gap-5 px-3 py-2 text-white bg-emerald-800 border rounded w-full opacity-95 group-hover:opacity-30 hover:!opacity-95 transition-opacity duration-300"
            >
              <div>
                <i class="fa-solid fa-plus text-xl text-white"></i>
              </div>
              <p class="uppercase text-sm font-bold">Add Items</p>
            </button>
            <button
              @click="isModalUpdateOpen = true"
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
              <p class="uppercase text-sm font-bold">Update Items</p>
            </button>
            <button
              :disabled="!selectedItem"
              :class="{
                'opacity-50 cursor-not-allowed': !selectedItem,
                'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
              }"
              class="flex items-center gap-5 px-3 py-2 text-white bg-red-800 border rounded w-full transition-opacity duration-300"
            >
              <div>
                <i class="fa-solid fa-ban text-white"></i>
              </div>
              <p class="uppercase text-sm font-bold">Delete Items</p>
            </button>
          </div>
        </div>
      </div>

      <div class="col-span-6 bg-white shadow-xl rounded-2xl row-span-9 p-5">
        <p class="font-bold px-2 uppercase text-slate-700">deposit list</p>
        <div class="h-full overflow-y-auto scrollbar-none">
          <table class="table-auto w-full mt-5">
            <thead>
              <tr class="bg-slate-100">
                <th class="text-center w-[5%] py-[7px] font-bold text-slate-700">No</th>
                <th class="text-center w-[20%] py-[7px] font-bold text-slate-700">
                  Income
                </th>
                <th class="text-center w-[20%] py-[7px] font-bold text-slate-700">
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
                <td class="py-[10px] px-5 text-slate-500">{{ index + 1 }}</td>
                <td
                  class="py-[10px] px-5 text-slate-500 flex items-center justify-center text-start"
                >
                  <div class="w-[100px] text-wrap">
                    {{ formatRupiah(deposit.income) }}
                  </div>
                </td>
                <td class="py-[10px] px-5 text-slate-500 text-center">
                  {{ deposit.date }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-span-2 bg-white shadow-xl rounded-2xl row-span-5">4</div>
    </div>

    <ModalAddDataIncome v-if="isModalAddOpen" @close="isModalAddOpen = false" />
    <ModalUpdateDataIncome
      v-if="isModalUpdateOpen"
      @close="isModalUpdateOpen = false"
      :selected-item="selectedItem"
    />
  </AuthenticatedLayout>
</template>
