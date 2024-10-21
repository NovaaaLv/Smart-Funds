<script setup>
import { ref } from "vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ModalAddDataItems from "@/Components/Modals/ModalAddDataItems.vue";
import ModalEditDataItems from "@/Components/Modals/ModalUpdateDataItems.vue";

const isModalAddOpen = ref(false);
const isModalUpdateOpen = ref(false);

// State untuk melacak baris yang dipilih
const selectedItem = ref(null);

const props = defineProps({
  expenses: {
    type: Array,
    required: true,
  },
});

// Fungsi untuk memilih item dari tabel
const selectItem = (expense) => {
  selectedItem.value = expense;
};
</script>

<template>
  <AuthenticatedLayout>
    <div class="p-12 w-full h-full grid grid-cols-8 gap-5 grid-rows-10">
      <div
        class="col-span-3 shadow-xl rounded-2xl row-span-2 bg-white flex flex-col justify-center items-center"
      >
        4
      </div>
      <div class="col-span-3 bg-white shadow-xl rounded-2xl row-span-2">5</div>

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
        <p class="font-bold px-2 uppercase text-slate-700">item list</p>
        <div class="h-full overflow-y-auto scrollbar-none">
          <table class="table-auto w-full mt-5">
            <thead>
              <tr class="bg-slate-100">
                <th class="text-center w-[5%] py-[7px] font-bold text-slate-700">No</th>
                <th class="text-center w-[20%] py-[7px] font-bold text-slate-700">
                  Name Items
                </th>
                <th class="text-center w-[10%] py-[7px] font-bold text-slate-700">
                  Amount
                </th>
                <th class="text-center w-[20%] py-[7px] font-bold text-slate-700">
                  Price
                </th>
                <th class="text-center w-[25%] py-[7px] font-bold text-slate-700">
                  Total
                </th>
                <th class="text-center w-[20%] py-[7px] font-bold text-slate-700">
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
                <td class="py-[10px] px-5 text-slate-500">{{ index + 1 }}</td>
                <td class="py-[10px] px-5 text-slate-500">{{ expense.item_name }}</td>
                <td class="py-[10px] px-5 text-slate-500">{{ expense.amount }}</td>
                <td class="py-[10px] px-5 text-slate-500">
                  Rp. {{ expense.price.toLocaleString() }}
                </td>
                <td class="py-[10px] px-5 text-slate-500">
                  Rp. {{ expense.total.toLocaleString() }}
                </td>
                <td class="py-[10px] px-5 text-slate-500">{{ expense.date }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-span-2 bg-white shadow-xl rounded-2xl row-span-5">4</div>
    </div>

    <ModalAddDataItems v-if="isModalAddOpen" @close="isModalAddOpen = false" />
    <ModalEditDataItems
      v-if="isModalUpdateOpen"
      @close="isModalUpdateOpen = false"
      :selected-item="selectedItem"
    />
  </AuthenticatedLayout>
</template>
