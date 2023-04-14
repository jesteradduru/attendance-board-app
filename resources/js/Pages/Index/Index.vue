<template>
  <div :class="`grid grid-cols-3 gap-3`">
    <ColumnLayout v-for="column in columns" :key="column.id" :title="column.name" :column-id="column.id">
      <ul>
        <li class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
          <div class="grid grid-cols-12 gap-2">
            <div class="col-span-2">
              <img class="rounded-full shadow" />
            </div>
            <div class="col-span-10">
              <div class="flex flex-col">
                <div class="text-lg">Jester Adduru</div>
                <div class="text-sm text-gray-500">ISA 1</div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </ColumnLayout>
  </div>
  {{ columns }}
</template>

<script setup>
// import { Link } from '@inertiajs/vue3'
import ColumnLayout from '@/Layouts/ColumnLayout.vue'

const props = defineProps({
  columns: Array,
})

</script>