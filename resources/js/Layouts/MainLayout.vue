
<template>
  <div class="font-medium mt-3 rounded-lg bg-gray-200 h-full md:h-screen pb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 justify-between p-7">
      <Link class="text-3xl font-bold" :href="route('index')">PMED Attendance Board</Link>
      <div class="flex justify-between md:justify-end items-center gap-2">
        <Clock />
        <Link :href="route('settings.index')" class="font-bold">⚙️ Settings</Link>
      </div>
    </div>
    <div class="flex justify-between mb-2 mx-8">
      <div class="flex gap-2">
        <Link class="btn-outline" :href="route('index')">Home</Link>
        <button class="btn-outline" @click="back">Back</button>
      </div>
      <div v-if="user" class="flex gap-2 items-center">
        <div class="text-gray-500">{{ user.name }}</div>
        <Link :href="route('logout')" method="DELETE" as="button">Logout</Link>
      </div>
    </div>
    <div class="mx-7">
      <div v-if="$page.props.flash.success && showNotif" class="p-2 border rounded-md border-green-500 bg-green-100 dark:bg-green-900 dark:border-green-700 shadow-md mb-2" @click="isVisible = false">
        {{ $page.props.flash.success }}
      </div>
      <slot />
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import Clock from '@/Components/UI/Clock.vue'
import { computed, ref, watch } from 'vue'

const user = computed(() => usePage().props.user)

const back = () => {
  window.history.back()
}

let showNotif = ref(false)

watch(() => usePage().props.flash.success, () => {
  showNotif.value = true
  setTimeout(() => showNotif.value = false, 1500)
})
</script>