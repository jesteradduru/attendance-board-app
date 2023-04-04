<template>
  <Box>
    <template #header>{{ title }}</template>
    <slot />
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
defineProps({
  title: String,
})
</script>