<script setup>
import { useTitle } from '@vueuse/core';
import { ref, reactive } from 'vue';
import { paireUpdate } from '../services/devises';
import NavBar from '../components/NavBar.vue';

useTitle('Update Paire - CurrencyConverter')

const props = defineProps({
  from_devise: String,
  to_devise: String,
  value: Number
})

const form = ref({
    from_devise: props.from_devise,
    to_devise: props.to_devise,
    value: props.value,
})

const loading = ref(false);
const error = ref(null);
const success = ref(null);

async function update() { 
    console.log(formState.value);
  if (formState.value) {
    loading.value = true;
    try {
      await paireUpdate(form.value.from_devise, form.value.to_devise, form.value.value);

      success.value = 'Updated Paire' 
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
    <v-sheet max-width="800" class="mx-auto">
        <v-form validate-on="blur" @submit.prevent="update" v-model="formState">
            <v-row>
                <v-col
                cols="12"
                md="4"
                >
                    <v-text-field
                        variant="outlined"
                        v-model="form.from_devise"                        
                        label="From"
                        readonly
                    ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="4"
                >
                    <v-text-field
                        variant="outlined"
                        v-model="form.to_devise"                       
                        label="To"
                        readonly
                    ></v-text-field>
                </v-col>
                <v-col
                cols="12"
                md="4"
                >
                    <v-text-field
                    variant="outlined"
                    v-model="form.value"                   
                    label="Value"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-btn
            :loading="loading"
            type="submit"
            block
            class="mt-2"
            text="Update"
            ></v-btn>
        </v-form>
        <v-alert type="error" v-if="error" :text="error" />
        <v-alert type="success" v-if="success" :text="success" />
    </v-sheet>
</template>