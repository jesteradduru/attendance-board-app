<template>
  <Box>
    <template #header>
      <div class="flex justify-between">
        <div class="text-md">Person</div>
        <Link :href="route('settings.employee.create')" class="btn-primary">Add Person</Link>
      </div>
    </template>
    <ul>
      <li v-for="employee in props.employees" :key="employee.id" class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
        <div class="flex">
          <div class="rounded-full bg-slate-400"><img :src="employee.picture.filename" /></div>
          <div class="flex flex-col">
            <div class="text-lg">{{ employee.full_name }}</div>
            <div class="text-sm text-gray-500">{{ employee.position }}</div>
          </div>
        </div>
        <div>
          <div class="flex gap-2">
            <button class="btn-outline">Edit</button>
            <button class="btn-outline">Delete</button>
          </div>
        </div>
      </li>
    </ul>
  </Box>
  {{ props.employees }}
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  employees: Array,
})
</script>