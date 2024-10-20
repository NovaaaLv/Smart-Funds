<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header> Dashboard </template>

    <div class="w-full grid grid-cols-12 gap-4 grid-rows-12 text-slate-800 p-12">
      <div
        class="col-span-3 py-5 rounded-lg bg-slate-800 flex justify-center items-center row-span-2 gap-5 text-white shadow-xl"
      >
        <div class="py-3 px-4 bg-slate-500 rounded-xl">
          <i class="fa-solid fa-wallet text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Balance</p>
          <p class="font-bold text-xl">Rp. 1.000.000</p>
        </div>
      </div>
      <div
        class="col-span-3 py-5 rounded-lg bg-emerald-800 flex justify-center items-center row-span-2 gap-5 text-white shadow-xl"
      >
        <div class="py-3 px-4 bg-emerald-500 rounded-xl">
          <i class="fa-solid fa-hand-holding-dollar text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Income</p>
          <p class="font-bold text-xl">Rp. 1.000.000</p>
        </div>
      </div>
      <div
        class="col-span-3 py-5 rounded-lg bg-red-800 flex justify-center items-center row-span-2 gap-5 text-white shadow-xl"
      >
        <div class="py-3 px-4 bg-red-500 rounded-xl">
          <i class="fa-solid fa-coins text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Expenses</p>
          <p class="font-bold text-xl">Rp. 1.000.000</p>
        </div>
      </div>
      <div
        class="col-span-3 py-5 rounded-lg bg-cyan-800 flex justify-center items-center row-span-2 gap-5 text-white shadow-xl"
      >
        <div class="py-3 px-4 bg-cyan-500 rounded-xl">
          <i class="fa-solid fa-wind text-2xl"></i>
        </div>
        <div class="">
          <p class="text-sm">Commodity</p>
          <p class="font-bold text-xl">500 Items</p>
        </div>
      </div>

      <!--  -->
      <div class="col-span-8 py-5 bg-white shadow-xl rounded-lg row-span-6 p-5">
        Overview
      </div>
      <div
        class="col-span-4 py-5 bg-white shadow-xl rounded-lg row-span-5 p-5 flex flex-col gap-2"
      >
        <p class="font-bold">Latest items added</p>

        <!--  -->
        <div class="w-full h-full overflow-y-auto scrollbar-none">
          <table class="table-auto w-full">
            <tr class="font-bold pb-1 border-b">
              <td class="border-r p-1 text-center border-b">No</td>
              <td class="border-l border-r p-1 text-center border-b">Name</td>
              <td class="border-l border-r p-1 text-center border-b">Amount</td>
              <td class="border-l border-r p-1 text-center border-b">Price</td>
              <td class="border-l p-1 text-center border-b">Total</td>
            </tr>
            <tr class="text-sm">
              <td class="border-r p-1 text-center border-t border-b">1</td>
              <td class="border-l border-r p-1 text-center border-t border-b">
                Makaroni
              </td>
              <td class="border-l border-r p-1 text-center border-t border-b">2</td>
              <td class="border-l border-r p-1 text-center border-t border-b">
                Rp. 10.000
              </td>
              <td class="border-l p-1 text-center border-t border-b">Rp. 20.000</td>
            </tr>
            <tr class="text-sm">
              <td class="border-r p-1 text-center border-t border-b">2</td>
              <td class="border-l border-r p-1 text-center border-t border-b">
                Makaroni
              </td>
              <td class="border-l border-r p-1 text-center border-t border-b">2</td>
              <td class="border-l border-r p-1 text-center border-t border-b">
                Rp. 10.000
              </td>
              <td class="border-l p-1 text-center border-t border-b">Rp. 20.000</td>
            </tr>
            <tr class="text-sm">
              <td class="border-r p-1 text-center border-t">3</td>
              <td class="border-l border-r p-1 text-center border-t">Makaroni</td>
              <td class="border-l border-r p-1 text-center border-t">2</td>
              <td class="border-l border-r p-1 text-center border-t">Rp. 10.000</td>
              <td class="border-l p-1 text-center border-t">Rp. 20.000</td>
            </tr>
            <tr class="text-sm">
              <td class="border-r p-1 text-center border-t">4</td>
              <td class="border-l border-r p-1 text-center border-t">Makaroni</td>
              <td class="border-l border-r p-1 text-center border-t">2</td>
              <td class="border-l border-r p-1 text-center border-t">Rp. 10.000</td>
              <td class="border-l p-1 text-center border-t">Rp. 20.000</td>
            </tr>
          </table>
        </div>
      </div>
      <!--  -->
      <div class="col-span-4 py-5 bg-white shadow-xl rounded-lg row-span-5 p-5">
        <p class="font-bold">Last Month</p>
        <div
          class="w-full h-[85%] px-5 py-1 text-white space-y-3 mt-2 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-500 scrollbar-track-gray-50"
        >
          <div
            class="rounded-2xl w-full bg-emerald-200 px-3 py-2 flex gap-3 items-center"
          >
            <div class="py-1 px-2 bg-emerald-800 rounded-xl">
              <i class="fa-solid fa-hand-holding-dollar text-lg"></i>
            </div>
            <div class="">
              <p class="text-xs text-slate-800">Income</p>
              <p class="font-bold text-sm text-slate-800">Rp. 1.000.000</p>
            </div>
          </div>
          <div
            class="rounded-2xl w-full bg-red-200 px-3 py-2 flex gap-3 items-center justify-end"
          >
            <div class="">
              <p class="text-xs text-slate-800 text-end">Expenses</p>
              <p class="font-bold text-sm text-slate-800 text-end">Rp. 1.000.000</p>
            </div>
            <div class="py-1 px-2 bg-red-800 rounded-xl">
              <i class="fa-solid fa-coins text-lg"></i>
            </div>
          </div>
          <div class="rounded-2xl w-full bg-cyan-200 px-3 py-2 flex gap-3 items-center">
            <div class="py-1 px-2 bg-cyan-800 rounded-xl">
              <i class="fa-solid fa-wind text-lg"></i>
            </div>
            <div class="">
              <p class="text-xs text-slate-800">Commodity</p>
              <p class="font-bold text-sm text-slate-800">500 Items</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-4 py-5 bg-white shadow-xl rounded-lg row-span-4 p-5">ror8</div>
      <div class="col-span-4 py-5 bg-white shadow-xl rounded-lg row-span-4 p-5">ror9</div>
    </div>
  </AuthenticatedLayout>
</template>
