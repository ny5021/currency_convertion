<script setup>
import { useTitle } from '@vueuse/core';
import { ref, reactive } from 'vue';
import { usePaires } from '@/composables/paires.js'
import { paireRemove } from '@/services/devises.js'
// import { router } from 'vue-router';
import router from '@/router'
import NavBar from '../components/NavBar.vue';

useTitle('Home - CurrencyConverter')

const errorMessage = ref(null);
const success = ref(null);

const { paires, error, loading } = usePaires()

async function deletePaire(paire) {
  errorMessage.value = null
  try {
    await paireRemove(paire)
    paires.value = paires.value.filter((p) => p !== paire)
  } catch (error) {
    errorMessage.value = error.message
  }
}

function updatePaire(paire) {
    router.push({ name: 'updatePaire', params: { from_devise: paire.from_devise, to_devise: paire.to_devise, value: paire.value } })
}

</script>

<template>
  <NavBar />
  <v-alert type="error" v-if="errorMessage" :text="errorMessage" />
  <v-sheet maxWidth="700" class="mx-auto" rounded="xl">
    <v-table v-if="paires">
    <thead>
      <tr>
        <th class="text-center">
          Paires
        </th>
        <th class="text-center">
          Ratio
        </th>
        <th class="text-center">
          Update
        </th>
        <th class="text-center">
          Delete
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="paire in paires"
        :key="paire.created_at"
        class="text-center"
      >
        <td>{{ paire.from_devise }} => {{ paire.to_devise }}</td>
        <td>{{ paire.value }} </td>
        <td>
            <v-btn
            @click="updatePaire(paire)"
            variant="outlined"
            size="x-small"
            color="teal"
            >Update</v-btn
          >
        </td>
        <td>
            <v-btn
            @click="deletePaire(paire)"
            variant="outlined"
            size="x-small"
            color="red"
            >Delete</v-btn
          >
        </td>
      </tr>
    </tbody>
  </v-table>
  <v-skeleton-loader
      type="table"
      v-else-if="loading"
      :style="{ maxWidth: '30rem' }"
      class="ma-auto"
    />
  </v-sheet>
  
</template>