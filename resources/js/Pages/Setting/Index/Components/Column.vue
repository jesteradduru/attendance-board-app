<template>
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
      <li v-for="column in props.columns" :key="column.id" class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
        <div class="text-md none">{{ column.name }}</div>
        <div class="flex gap-2">
          <Link :href="route('settings.column.edit', {column: column.id})" class="btn-outline">Edit</Link>
          <Link :href="route('settings.column.destroy', {column: column.id})" method="delete" as="button" class="btn-outline">Delete</Link>
        </div>
      </li>
    </ul>
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link, useForm } from '@inertiajs/vue3'
import { debounce } from 'lodash'

const form = useForm({
  name: null,
})

const props = defineProps({
  columns: Array,
})

const addColumn = () => debounce(
  form.post(route('settings.column.store'), {
    onSuccess: () => {
      form.reset()
    },
  }), 1000,
)
</script>