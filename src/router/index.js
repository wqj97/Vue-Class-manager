import Vue from 'vue'
import Router from 'vue-router'
import index from '../components/index'

Vue.use(Router)

// const asyncImport = componentName => resolve => require([`../components/${componentName}`], resolve)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: index
    }
  ]
})
