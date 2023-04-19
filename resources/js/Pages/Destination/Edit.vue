<template>
  <Box class="w-3/4 mx-auto">
    <template #header>Edit Destination</template>
    <form class="flex flex-col gap-3" @submit.prevent="update">
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
      <div class="flex gap-2">
        <button type="submit" class="btn-outline">Submit</button>
        <Link
          :href="route('settings.destination.destroy', {destination: props.destination.id})"
          method="delete" as="button"
          class="btn-outline bg-red-600 text-gray-200 hover:bg-red-700"
        >
          Delete
        </Link>
      </div>
    </form>
  </Box>
</template>
    
<script setup>
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/vue3'
import moment from 'moment'
import { Link } from '@inertiajs/vue3'
    
const props = defineProps({
  destination: Object,
})

const form = useForm({
  destination: props.destination.destination,
  activity: props.destination.activity,
  from: moment(props.destination.from).format('YYYY-MM-DD'),
  to: moment(props.destination.to).format('YYYY-MM-DD'),
})
  
  
const update = () => form.patch(route('settings.destination.update', { destination: props.destination.id }), {
  onSuccess: () => {
    form.destination = null
    form.activity = null
    form.from = null
    form.to = null
  },
})
</script>