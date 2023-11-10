<script setup>
import { reactive, ref } from 'vue';
import { useTitle } from '@vueuse/core'
import axios from 'axios'
import { useRouter } from 'vue-router';
import GuestNavBar from '../components/GuestNavBar.vue';

useTitle('Login - CurrencyConverter')

const router = useRouter();

const form = reactive({
  username: ref(''),
  password: ref(''),
});

const loading = ref(false);
const error = ref(null);

const rules = {
  required: (value) => value.trim() !== '' || 'Champs obligatoire',
}

async function submit() { 
  if (formState.value) {
    loading.value = true;
    try {
      await axios.post('/login', {
        username: form.username,
        password: form.password,
    })
    .then(res => {
      localStorage.setItem('token', res.data.token);
    })
    .catch(err => console.log(err));

    await router.push({ name: 'home' });
    } catch (err) {
      error.value = err.message
    } finally {
      loading.value = false
    }   
  }
}

const formState = ref();
</script>

<template>
  <GuestNavBar />
    <v-sheet max-width="300" class="mx-auto">
      <v-form validate-on="blur" @submit.prevent="submit" v-model="formState">
        <v-text-field
          variant="outlined"
          v-model="form.username"
          :rules="[rules.required]"
          label="User name"
        ></v-text-field>
        <v-text-field
          variant="outlined"
          v-model="form.password"
          :rules="[rules.required]"
          label="Password"
          type="password"
        ></v-text-field>
  
        <v-btn
          :loading="loading"
          type="submit"
          block
          class="mt-2"
          text="Login"
        ></v-btn>
      </v-form>
      <v-alert type="error" v-if="error" :text="error" />
    </v-sheet>
  </template>
