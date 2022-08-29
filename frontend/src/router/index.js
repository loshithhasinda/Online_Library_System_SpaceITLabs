import { createRouter, createWebHistory } from 'vue-router';
import UserLogin from '../views/UserLogin.vue';
import UserRegister from '../views/UserRegister.vue';

const routes = [
  {
    path: '/',
    name: 'UserLogin',
    component: UserLogin
  },
  {
    path: '/user/register',
    name: 'UserRegister',
    component: UserRegister
  },
]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
export default router