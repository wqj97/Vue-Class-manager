import Vue from 'vue'
import Router from 'vue-router'
import Index from '../components/index.vue'
import Home from '../components/home.vue'

Vue.use(Router)

const asyncImport = componentName => resolve => require([`../components/${componentName}`], resolve)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/home',
      name: 'Home',
      component: Home,
      children: [
        {
          path: '/home/before',
          name: 'Before',
          component: asyncImport('Before')
        },
        {
          path: '/home/doing',
          name: 'Doing',
          component: asyncImport('Doing')
        },
        {
          path: '/home/after',
          name: 'After',
          component: asyncImport('Before')
        }
      ]
    }
  ]
})
