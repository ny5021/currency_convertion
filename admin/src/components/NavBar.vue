<script setup>
import { computed, unref } from 'vue'
import { useDisplay } from 'vuetify'
import router from '@/router'
import axiosClient from '../axios';

const display = useDisplay();

const isSmartPhone = computed(() => {
  return unref(display.xs)
});

const routes = [
  { to: '/home', text: 'Home' },
  { to: '/create', text: 'Add Devise' },
  { to: '/createPaire', text: 'Add Paire' }
]


async function logout() { 
    try {
      await axiosClient.post('/logout')
    .then(res => {
      localStorage.removeItem('token');
    })
    .catch(err => console.log(err));

    await router.push({ name: 'login' });
    } catch (err) {
      console.log(err.message);
    }
}
</script>

<template>
    <v-app-bar title="Currency Converter" color="green">
        <!-- Menu Mobile -->
      <v-menu v-if="isSmartPhone">
        <template v-slot:activator="{ props }">
          <v-app-bar-nav-icon v-bind="props" />
        </template>

        <v-list>
          <v-list-item v-for="{ to, text } in routes" :to="to" :key="to">
            <v-list-item-title>{{ text }}</v-list-item-title>
          </v-list-item>
          <v-btn @click="logout" variant="text">Logout</v-btn>
        </v-list>
        
      </v-menu>

      <!-- Menu Desktop -->
      <v-toolbar-items v-else>
        <template v-for="{ to, text } in routes" :key="to">
          <v-btn :to="to" variant="text">{{ text }}</v-btn>
          <v-divider vertical></v-divider>
        </template>
        <v-btn @click="logout" variant="text">Logout</v-btn>
      </v-toolbar-items>
    </v-app-bar>
</template>