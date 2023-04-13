<template>
  <Box class="w-3/4 mx-auto">
    <template #header>Add Person</template>
    <form class="flex flex-col gap-3" @submit.prevent="addEmployee">
      <div>
        <label for="full_name" class="label">Full Name</label>
        <input id="full_name" v-model="form.full_name" type="text" name="" class="input-text" />
        <div v-if="form.errors.full_name" class="input-error">{{ form.errors.full_name }}</div>
      </div>
      <div>
        <label for="position" class="label">Position</label>
        <input id="position" v-model="form.position" type="text" name="" class="input-text" />
        <div v-if="form.errors.position" class="input-error">{{ form.errors.position }}</div>
      </div>
      <div>
        <label for="profile_picture" class="label">Profile Picture</label>
        <input id="profile_picture" type="file" name="" class="input-file w-full" @input="addProfilePicture" />
        <div v-if="form.errors['profile_picture.0']" class="input-error">{{ form.errors['profile_picture.0'] }}</div>
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
  full_name: null,
  position: null,
  profile_picture: [],
})

const addProfilePicture = (event) => {
  form.profile_picture = []
  form.profile_picture.push(event.target.files[0])
}

const addEmployee = () => form.post(route('settings.employee.store'), {
  onSuccess: () => {
    form.full_name = null,
    form.position= null,
    form.profile_picture= [],
    form.reset()
  },
})
</script>