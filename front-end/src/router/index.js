import Vue from 'vue'
import Router from 'vue-router'
import Index from '../components/Index.vue'
import Home from '../components/Home.vue'
import Default from '../components/Default.vue'

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
          path: '/home/',
          name: 'Default',
          component: Default
        },
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
          component: asyncImport('After')
        }
      ]
    }
  ]
})
