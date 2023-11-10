<script setup>

import { useTitle } from '@vueuse/core';
import { reactive, ref } from 'vue';
import axiosClient from '../axios';
import NavBar from '../components/NavBar.vue';

useTitle('Create - CurrencyConverter')

const form = reactive({
  name: ref(''),
});

const rules = {
  required: (value) => value.trim() !== '' || 'Champs obligatoire',
}

const error = ref(null);
const loading = ref(false);
const success = ref(null);

async function addDevise() { 
  if (formState.value) {
    loading.value = true;
    try {
      await axiosClient.post('/devises', {
        name: form.name,
      })
      .catch(err => console.log(err));

      success.value = 'Added devise' 
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
    <NavBar />
    <v-sheet width="200" class="mx-auto">
        <v-form validate-on="blur" @submit.prevent="addDevise" v-model="formState" >
            <v-text-field
                v-model="form.name"
                :rules="[rules.required]"
                label="Devise"
            ></v-text-field>
            <div class="text-center">
                <v-btn :loading="loading" type="submit" class="mt-2" text="Add" maxWidth="40px"></v-btn>
            </div>
            
        </v-form>
        <v-alert type="error" v-if="error" :text="error" />
        <v-alert type="success" v-if="success" :text="success" />
    </v-sheet>
</template>