<template>
  <div class="grid grid-cols-2 gap-4">
    <Column :columns="props.columns" />
    <Employees :employees="props.employees" />
  </div>
</template>

<script setup>
import Column from '@/Pages/Setting/Index/Components/Column.vue'
import Employees from '@/Pages/Setting/Index/Components/Employees.vue'

const props = defineProps({
  columns: Array,
  employees: Array,
})
</script>