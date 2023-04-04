<template>
  <div :class="`grid grid-cols-${props.columns.length} gap-3`">
    <ColumnLayout v-for="column in columns" :key="column.id" :title="column.name">
      Contents
    </ColumnLayout>
  </div>
</template>

<script setup>
// import { Link } from '@inertiajs/vue3'
import ColumnLayout from '@/Layouts/ColumnLayout.vue'

const props = defineProps({
  columns: Array,
})
</script>