<template>
  <Box>
    <template #header><div>Select employee that is {{ props.column.name }}</div></template>
    <ul>
      <li v-for="employee in props.employees" :key="employee.id" class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
        <div class="grid grid-cols-12 gap-2">
          <div class="col-span-2">
            <img class="rounded-full shadow" :src="employee.picture.src" />
          </div>
          <div class="col-span-10">
            <div class="flex flex-col">
              <div class="text-lg">{{ employee.full_name }}</div>
              <div class="text-sm text-gray-500">{{ employee.position }}</div>
            </div>
          </div>
        </div>
        <div>
          <div class="flex gap-2">
            <Link :href="route('settings.attendance.store', {employee: employee.id, column: props.column.id})" method="post" as="button" class="btn-outline">Select</Link>
          </div>
        </div>
      </li>
    </ul>
  </Box>
  <!-- {{ column }}
  {{ employees }} -->
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  column: Object,
  employees: Array,
})

const selectEmployee = (id) => console.log(id)
</script>