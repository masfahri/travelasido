import Home from '../components/Dashboard.vue'
import Products from '../components/Products.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/products',
            name: 'products',
            component: Products,
        },
    ]
}