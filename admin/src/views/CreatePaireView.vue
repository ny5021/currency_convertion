<script setup>
import { useTitle } from '@vueuse/core';
import { ref, reactive } from 'vue';
import { useDevises } from '@/composables/devises.js'
import { paireCreate } from '@/services/devises.js'
import NavBar from '../components/NavBar.vue';

useTitle('Add Paire - CurrencyConverter')

const form = reactive({
  from_devise: ref(''),
  to_devise: ref(''),
  value: ref(''),
});

const error = ref(null);
const success = ref(null);

const { devises, loading } = useDevises()


const rules = {
  required: (value) => value.trim() !== '' || 'Champs obligatoire',
  required_select: (value) => value !== '' || 'Champs obligatoire',
}

const isLoading = ref(false);

async function addPaire() { 
  if (formState.value) {
    isLoading.value = true;
    try {
      await paireCreate(form.from_devise, form.to_devise, form.value);

      success.value = 'Added Paire' 
    } catch (err) {
      error.value = err.message
    } finally {
      isLoading.value = false
    }   
  }
}

const formState = ref();
</script>

<template>
    <NavBar />
    <v-sheet max-width="800" class="mx-auto">
        <v-form validate-on="blur" @submit.prevent="addPaire" v-model="formState">
            <v-row>
                <v-col
                cols="12"
                md="4"
                >
                    <v-select v-if="devises"
                    v-model="form.from_devise"
                    :items="devises"
                    :rules="[rules.required_select]"
                    label="Devise"
                    item-title="name"
                    item-value="name"
                    required
                    ></v-select>
                    <v-skeleton-loader
                        type="button"
                        v-else-if="loading"
                        :style="{ maxWidth: '30rem' }"
                        class="ma-auto"
                    />
                </v-col>
                <v-col
                cols="12"
                md="4"
                >
                    <v-select v-if="devises"
                    v-model="form.to_devise"
                    :items="devises"
                    :rules="[rules.required_select]"
                    label="Devise"
                    item-title="name"
                    item-value="name"
                    required
                    ></v-select>
                    <v-skeleton-loader
                        type="button"
                        v-else-if="loading"
                        :style="{ maxWidth: '30rem' }"
                        class="ma-auto"
                    />
                </v-col>
                <v-col
                cols="12"
                md="4"
                >
                    <v-text-field
                    variant="outlined"
                    v-model="form.value"
                    :rules="[rules.required]"
                    label="Value"
                    ></v-text-field>
                </v-col>
            </v-row>
            <div class="text-center">
                <v-btn
                :loading="isLoading"
                type="submit"
                text="Add"
                maxWidth="50px"
                ></v-btn>
            </div>
            
        </v-form>
        <v-alert type="error" v-if="error" :text="error" />
        <v-alert type="success" v-if="success" :text="success" />
    </v-sheet>
</template>