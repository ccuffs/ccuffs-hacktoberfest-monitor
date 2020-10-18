import Vue from 'vue'
import Router from 'vue-router'

import Index from '@/views/Index';
import ShowRepository from '@/views/Show'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Index',
            component: Index
        },
        {
            path: '/show/:name',
            name: 'Show',
            component: ShowRepository
        }
    ]
})