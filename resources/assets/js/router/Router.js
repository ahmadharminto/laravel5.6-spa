import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/auth/Login'
import Logout from '../components/auth/Logout'
import Signup from '../components/auth/Signup'
import Forum from '../components/forum/Forum'
import Read from '../components/forum/Read'
import Create from '../components/forum/Create'


Vue.use(VueRouter)

const routes = [
    { path: '/login', name: 'login', component: Login },
    { path: '/logout', name: 'logout', component: Logout },
    { path: '/signup', name: 'signup', component: Signup },

    { path: '/forum', name: 'forum', component: Forum },
    { path: '/question/:slug', name: 'read', component: Read },
    { path: '/ask', name: 'create', component: Create }
]

const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router