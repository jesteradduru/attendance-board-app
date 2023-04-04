
<template>
  <div class="flex flex-row justify-between mt-3 mx-4">
    <Link class="text-3xl text-green-700 font-medium" :href="route('index')">PMED Attendance Board</Link>
    <div class="flex flex-col justify-center">
      <Link :href="route('settings.index')" class="text-md">Settings</Link>
    </div>
  </div>
  <div class="m-4">
    <div v-if="$page.props.flash.success" class="p-2 border rounded-md border-green-500 bg-green-100 dark:bg-green-900 dark:border-green-700 shadow-md mb-2">
      {{ $page.props.flash.success }}
    </div>
    <slot />
  </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3'

</script>