<template>
  <div class="mx-auto w-1/2">
    <form @submit.prevent="login">
      <div>
        <label class="label" for="email">Email</label>
        <input id="email" v-model="form.email" autocomplete="" type="text" class="input-text" />
        <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
      </div>
      <div class="mt-4">
        <label class="label" for="password">Password</label>
        <input id="password" v-model="form.password" autocomplete="" type="password" class="input-text" />
        <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn-primary w-full">Login</button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
    
const form = useForm({
  email: null,
  password: null,
})

const login = () => form.post(route('login.store'))
</script>