<script setup>
import AddExpenses from "@/Components/Expenses/AddExpenses.vue";
import DeleteExpenses from "@/Components/Expenses/DeleteExpenses.vue";
import UpdateExpenses from "@/Components/Expenses/UpdateExpenses.vue";
import { onMounted, ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

const selectedItem = ref({});
const AddExpense = ref(false);
const UpdateExpense = ref(false);

// Definisikan props yang diperlukan
const props = defineProps({
  expenses: {
    type: Array,
    required: true,
  },
  selectedItem: {
    type: Object,
    default: null,
  },
  chart: Object,
});

// Ref untuk data expenses
const expenses = ref([]);

// // Fungsi untuk memuat expenses dari server
// const loadExpenses = async () => {
//   Inertia.get(
//     route("admin.expenses"),
//     {},
//     {
//       preserveState: true,
//       only: ["expenses"],
//       onSuccess: ({ props }) => {
//         expenses.value = props.expenses;
//       },
//     }
//   );
// };

// Fungsi untuk memilih item dari tabel
const selectItem = (expense) => {
  selectedItem.value = expense;
};

// Fungsi untuk menghitung total expenses
const totalExpenses = computed(() => {
  return props.expenses.reduce((sum, expense) => {
    const validTotal =
      typeof expense.total === "number" ? expense.total : parseFloat(expense.total) || 0;
    return sum + validTotal;
  }, 0);
});

// Fungsi untuk menghitung total items
const totalItems = computed(() => {
  console.log(props.expenses); // Cek data yang ada di props
  return props.expenses.reduce((sum, expense) => {
    const validItems =
      typeof expense.amount === "number"
        ? expense.amount
        : parseFloat(expense.amount) || 0;
    return sum + validItems;
  }, 0);
});

// Fungsi untuk format Rupiah
function formatRupiah(angka) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(angka);
}
</script>

<template>
  <Head title="Expenses" />
  <div
    class="w-screen overflow-x-hidden grid grid-cols-6 lg:grid-cols-12 gap-4 text-slate-800 p-4 md:p-8 lg:p-12"
  >
    <div
      class="col-span-3 lg:col-span-4 shadow-xl rounded-lg row-span-1 flex bg-red-800 text-white items-center justify-around px-5 py-2"
    >
      <div class="py-3 px-4 bg-red-500 rounded-xl">
        <i class="fa-solid fa-coins text-2xl"></i>
      </div>
      <div>
        <p class="text-sm">Total Expenditure</p>
        <p class="font-bold text-xl">
          {{ totalExpenses ? formatRupiah(totalExpenses) : "Rp 0" }}
        </p>
      </div>
    </div>
    <div
      class="col-span-3 lg:col-span-4 shadow-xl rounded-lg row-span-1 flex bg-cyan-800 text-white items-center justify-around px-5-py-2"
    >
      <div class="py-3 px-4 bg-cyan-500 rounded-xl">
        <i class="fa-brands fa-dropbox text-2xl"></i>
      </div>
      <div>
        <p class="text-sm">Total Expenditure Items</p>
        <p class="font-bold text-xl">{{ totalItems }} Item</p>
      </div>
    </div>

    <div
      class="col-span-6 lg:col-span-4 bg-white shadow-xl rounded-lg row-span-6 p-5 group"
    >
      <p class="font-bold uppercase text-slate-700">Fitur</p>
      <div class="w-full">
        <div class="mt-5 space-y-3">
          <div
            class="w-full relative opacity-95 group-hover:opacity-30 hover:!opacity-95 transition-opacity duration-300"
          >
            <input
              type="text"
              name="search"
              id="search"
              placeholder="Cari Barang"
              class="w-full rounded border-slate-400 placeholder:text-sm focus:ring-slate-200 focus:border-slate-400 text-sm text-slate-500 pl-9 focus:shadow duration-300 transition-all"
            />
            <div class="absolute text-slate-500 top-2 left-3">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
          <button
            v-if="!AddExpense"
            @click="AddExpense = true"
            class="flex items-center gap-5 px-3 py-2 text-white bg-emerald-800 border rounded w-full opacity-95 group-hover:opacity-30 hover:!opacity-95 transition-opacity duration-300"
          >
            <div><i class="fa-solid fa-plus text-xl text-white"></i></div>
            <p class="uppercase text-sm font-bold">add expenses</p>
          </button>
          <button
            v-if="!UpdateExpense"
            @click="UpdateExpense = true"
            :disabled="!selectedItem"
            :class="{
              'opacity-50 cursor-not-allowed': !selectedItem,
              'opacity-95 group-hover:opacity-30 hover:!opacity-95': selectedItem,
            }"
            class="flex items-center gap-5 px-3 py-2 text-white bg-cyan-800 border rounded w-full transition-opacity duration-300"
          >
            <div><i class="fa-solid fa-pen text-white"></i></div>
            <p class="uppercase text-sm font-bold">change expenses</p>
          </button>
          <DeleteExpenses :selected-item="selectedItem" />
        </div>
      </div>
    </div>

    <div class="col-span-6 lg:col-span-8 bg-white shadow-xl rounded-lg row-span-10 p-5">
      <p class="font-bold px-2 uppercase text-slate-700">list of expenses</p>
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
                Name Of Expenditure
              </th>
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[10%] py-[7px]"
              >
                Amount
              </th>
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[20%] py-[7px]"
              >
                Price
              </th>
              <th
                class="text-center text-xs md:text-sm font-bold text-slate-700 w-[25%] py-[7px]"
              >
                Total
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
              v-for="(expense, index) in props.expenses"
              :key="expense.id"
              class="hover:bg-teal-100 cursor-pointer transition-all duration-300 rounded border-b"
              @click="selectItem(expense)"
              :class="{ 'bg-teal-200': selectedItem && selectedItem.id === expense.id }"
            >
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ index + 1 }}
              </td>
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ expense.item_name }}
              </td>
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ expense.amount }}
              </td>
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ formatRupiah(expense.price) }}
              </td>
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ formatRupiah(expense.total) }}
              </td>
              <td class="py-[10px] px-5 text-slate-500 text-xs md:text-sm">
                {{ expense.date }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <AddExpenses v-if="AddExpense" @remove="AddExpense = false" />
    <UpdateExpenses
      v-if="UpdateExpense"
      :selected-item="selectedItem"
      @refresh="loadExpenses"
      @close="UpdateExpense = false"
    />

    <div
      :class="{
        'col-span-6 lg:col-span-4': !AddExpense,
        'col-span-6 lg:col-span-4 opacity-30': AddExpense,
      }"
    ></div>
  </div>
</template>
