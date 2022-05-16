function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('auth/login.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },

  { path: '/person/create', name: 'create', component: page('create.vue') },

  { path: '/persons/:id', name: 'update', component: page('update.vue') },

  { path: '*', component: page('errors/404.vue') }
]
