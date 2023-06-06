import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import signupView from '../views/SignUpView.vue'
import smartphone from '../views/SmartphoneView.vue'
import televisori from '../views/TelevisoriView.vue'
import computer from '../views/ComputerView.vue'
import contact from '../views/ContactView.vue'
import { compile } from 'vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/signup',
      name: 'signup',
      component: signupView
    },
    {
      path: '/smartphone',
      name: 'smartphone',
      component: smartphone
    },
    {
      path: '/tv',
      name: 'tv',
      component: televisori
    },
    {
      path: '/computer',
      name:'computer',
      component:computer
    },
    {
      path:'/contact',
      name:'contact',
      component:contact
    }
  ]
})

export default router
