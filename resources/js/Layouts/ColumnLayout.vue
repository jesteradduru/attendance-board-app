<template>
  <Box>
    <template #header>
      <div class="flex justify-between">
        <div>{{ title }}</div>
        <div>
          <Link :href="route('settings.column.show', {column: props.columnId})" class="btn-outline">+</Link>
        </div>
      </div>
    </template>
    <slot />
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
const props  = defineProps({
  title: String,
  columnId: Number,
})
</script>