<template>
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
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
</script>