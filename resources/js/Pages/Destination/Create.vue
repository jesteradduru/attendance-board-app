<template>
  <Box class="w-3/4 mx-auto">
    <template #header>Add Destination</template>
    <form class="flex flex-col gap-3" @submit.prevent="addDestination">
      <div>
        <label for="activity" class="label">Activity</label>
        <input id="activity" v-model="form.activity" type="text" name="" class="input-text" />
        <div v-if="form.errors.activity" class="input-error">{{ form.errors.activity }}</div>
      </div>
      <div>
        <label for="destination" class="label">Destination</label>
        <input id="destination" v-model="form.destination" type="text" name="" class="input-text" />
        <div v-if="form.errors.destination" class="input-error">{{ form.errors.destination }}</div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label for="from" class="label">From</label>
          <input id="from" v-model="form.from" type="date" name="" class="input-text" />
          <div v-if="form.errors.from" class="input-error">{{ form.errors.from }}</div>
        </div>
        <div>
          <label for="to" class="label">To</label>
          <input id="to" v-model="form.to" type="date" name="" class="input-text" />
          <div v-if="form.errors.to" class="input-error">{{ form.errors.to }}</div>
        </div>
      </div>
      <div>
        <button type="submit" class="btn-outline">Submit</button>
      </div>
    </form>
  </Box>
</template>
  
<script setup>
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/vue3'
  
const form = useForm({
  destination: null,
  activity: null,
  from: null,
  to: null,
})

const props = defineProps({
  attendance: Number,
})

const addDestination = () => form.post(route('settings.destination.store', { attendance: props.attendance }), {
  onSuccess: () => {
    form.destination = null
    form.activity = null
    form.from = null
    form.to = null
  },
})
</script>