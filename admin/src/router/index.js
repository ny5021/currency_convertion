import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '@/views/LoginView.vue'
import HomeView from '@/views/HomeView.vue'
import CreateDeviseView from '@/views/CreateDeviseView.vue'
import CreatePaireView from '@/views/CreatePaireView.vue'
import UpdatePaireView from '@/views/UpdatePaireView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/home',
      name: 'home',
      component: HomeView,
      meta: {requiresAuth: true}
    },
    {
      path: '/create',
      name: 'create',
      component: CreateDeviseView,
      meta: {requiresAuth: true}
    },
    {
      path: '/createPaire',
      name: 'createPaire',
      component: CreatePaireView,
      meta: {requiresAuth: true}
    },
    {
      path: '/updatePaire/:from_devise/:to_devise/:value',
      name: 'updatePaire',
      component: UpdatePaireView,
      props: true,
      meta: {requiresAuth: true}
    },
    // {
    //   path: '/update-user/:userId',
    //   name: 'update-user',
    //   component: UpdateUserView,
    //   props: true
    // }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !localStorage.getItem('token')) {
    next({name: 'login'});
  } else {
    next();
  }
});

export default router
