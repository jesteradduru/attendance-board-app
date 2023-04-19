<template>
  <Box>
    <template #header>
      <div class="flex justify-between">
        <div class="text-md">Employees</div>
        <Link :href="route('settings.employee.create')" class="btn-primary">Add Employee</Link>
      </div>
    </template>
    <div class="flex flex-col gap-2">
      <Box v-for="employee in props.employees" :key="employee.id" class="flex gap-4 flex-col md:flex-row justify-between hover:bg-gray-100 p-2 rounded-md">
        <div class="grid grid-cols-12 gap-2">
          <div class="col-span-2">
            <img v-if="employee.picture" class="shadow rounded-lg" :src="employee.picture.src" />
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
            <Link class="btn-outline" :href="route('settings.employee.edit', {employee: employee.id})">Edit</Link>
            <Link class="btn-outline" :href="route('settings.employee.destroy', {employee: employee.id})" method="delete" as="button">Delete</Link>
          </div>
        </div>
      </Box>
    </div>
  </Box>
  <!-- {{ props.employees }} -->
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  employees: Array,
})
</script>