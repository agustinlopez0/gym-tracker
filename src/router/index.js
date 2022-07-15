import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import RegistrosView from '../views/RegistrosView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/registros',
    name: 'registros',
    component: RegistrosView
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
