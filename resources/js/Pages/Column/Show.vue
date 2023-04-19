<template>
  <Box>
    <template #header><div>Select employee that is {{ props.column.name }}</div></template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x">
      <Box v-for="employee in props.employees" :key="employee.id" class="col-span-1 flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
        <div class="grid grid-cols-12 gap-2">
          <div class="col-span-2">
            <img class="rounded-lg shadow" :src="employee.picture.src" />
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
      </Box>
    </div>
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

</script>