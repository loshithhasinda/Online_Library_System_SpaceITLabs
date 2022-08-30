import { createRouter, createWebHistory } from 'vue-router';
import UserLogin from '../views/UserLogin.vue';
import UserRegister from '../views/UserRegister.vue';
import BookHome from '../views/Book/Home.vue';
import MyBooks from '../views/Book/MyBooks.vue';

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
  {
    path: '/book/home',
    name: 'BookHome',
    component: BookHome
  },
  {
    path: '/book/myBook',
    name: 'MyBooks',
    component: MyBooks
  },
]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
export default router