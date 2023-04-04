<template>
  <div class="grid grid-cols-2 gap-4">
    <Box>
      <template #header>
        <div class="flex justify-between">
          <div class="text-md">Columns</div>
          <!-- <Link :href="route('settings.column.create')" class="btn-primary">Add Column</Link> -->
        </div>
      </template>
      <div>
        <form class="flex gap-2" @submit.prevent="addColumn">
          <input v-model="form.name" type="text" class="input-text" placeholder="Enter column name" />
          <button type="submit" class="btn-primary">Add</button>
        </form>
        <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
      </div>
      <ul class="mt-2">
        <li v-for="column in columns" :key="column.id" class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
          <div class="text-md none">{{ column.name }}</div>
          <div class="flex gap-2">
            <button class="btn-outline">Edit</button>
            <Link :href="route('settings.column.destroy', {column: column.id})" method="delete" as="button" class="btn-outline">Delete</Link>
          </div>
        </li>
      </ul>
    </Box>
    <Box>
      <template #header>
        <div class="flex justify-between">
          <div class="text-md">Person</div>
          <button class="btn-primary">Add Person</button>
        </div>
      </template>
      <ul>
        <li class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
          <div class="flex">
            <div class="rounded-full bg-slate-400">x</div>
            <div class="flex flex-col">
              <div class="text-lg">Jester Adduru</div>
              <div class="text-sm text-gray-500">Information Systems Analyts I</div>
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
  </div>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: null,
})

const props = defineProps({
  columns: Array,
})

const addColumn = () => form.post(route('settings.column.store'), {
  onSuccess: () => {
    form.reset()
  },
})


</script>