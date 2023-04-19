<template>
  <Box class="w-full md:w-1/2 mx-auto">
    <form class="flex flex-col gap-2" @submit.prevent="updateColumn">
      <input v-model="form.name" type="text" class="input-text" placeholder="Enter column name" />
      <button type="submit" class="btn-primary">Save</button>
    </form>
  </Box>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
const props = defineProps( { 
  column: Object,
} )

const form = useForm({
  name: props.column.name,
})

const updateColumn = () => form.patch(route('settings.column.update', { column: props.column.id }))
</script>