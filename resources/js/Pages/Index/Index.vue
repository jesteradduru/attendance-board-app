<template>
  <div :class="`grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3`">
    <ColumnLayout v-for="(column, index) in columns" :key="column.id" :title="column.name" :column-id="column.id">
      <ul>
        <li v-for="attendance in column.attendances" :key="attendance.id" class="flex gap-4 justify-between hover:bg-gray-100 p-2 rounded-md">
          <div class="grid grid-cols-12 gap-4">
            <div class="col-span-2">
              <div>
                <img :src="attendance.employee.picture.src" class="rounded-lg shadow" />
              </div>
            </div>
            <div class="col-span-10">
              <div class="flex justify-between items-start">
                <div class="flex flex-col">
                  <div class="text-lg">{{ attendance.employee.full_name }}</div>
                  <div class="text-sm text-gray-500">{{ attendance.employee.position }}</div>
                  <div v-if="attendance.destination" class="mt-2">
                    <div class="text-sm text-gray-400">{{ attendance.destination.activity }}</div>
                    <div class="text-sm text-gray-400">{{ attendance.destination.destination }}</div>
                    <div v-if="attendance.destination.from " class="text-sm text-gray-400">{{ formatDateRange( attendance.destination.from, attendance.destination.to) }}</div>
                  </div>
                </div>
                <div v-if="$page.props.user" class="flex flex-col">
                  <Link
                    :href="route('settings.attendance.destroy', {attendance: attendance.id, employee: attendance.employee.id})"
                    method="delete" as="button"
                    class="text-xs cursor-pointer"
                  >
                    <span class=" text-red-500 text-lg">❎</span>
                  </Link>
                  <Link
                    v-if="!attendance.destination"
                    :href="route('settings.destination.create', {attendance: attendance.id})"
                    class="text-xs cursor-pointer"
                  >
                    <span class=" text-red-500 text-lg">📍</span>
                  </Link>
                  <Link
                    v-else
                    :href="route('settings.destination.edit', {destination: attendance.destination.id})"
                    class="text-xs cursor-pointer"
                  >
                    <span class=" text-red-500 text-lg">📍</span>
                  </Link>
                  <Link
                    v-if="index > 0"
                    :href="route('settings.attendance.update', {attendance: attendance.id, column: props.columns[index - 1].id, employee: attendance.employee.id})"
                    method="patch" as="button"
                    class="text-xs cursor-pointer"
                  >
                    <span class="inline sm:hidden text-red-500 text-lg">⬆️</span>
                    <span class="hidden sm:inline text-red-500 text-lg">⬅️</span>
                  </Link>
                  <Link
                    v-if="index >= 0 && index + 1 !== columns.length"
                    :href="route('settings.attendance.update', {attendance: attendance.id, column: props.columns[index + 1].id})"
                    method="patch" as="button"
                    class="text-xs cursor-pointer"
                  >
                    <span class="inline sm:hidden text-red-500 text-lg">⬇️</span>
                    <span class="hidden sm:inline text-red-500 text-lg">➡️</span>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </ColumnLayout>
  </div>
  <!-- {{ columns[1].attendance }} -->
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ColumnLayout from '@/Layouts/ColumnLayout.vue'
import moment from 'moment'
import Box from '@/Components/UI/Box.vue'
const props = defineProps({
  columns: Array,
})

function formatDateRange(startDate, endDate) {
  const start = moment(startDate).format('dddd, MMMM D')
  const end = moment(endDate).format('dddd, MMMM D')
  return `${start} - ${end}`
}

</script>