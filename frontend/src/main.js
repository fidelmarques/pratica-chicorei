import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './assets/main.css'

import { OhVueIcon, addIcons } from 'oh-vue-icons'
import { IoCart } from 'oh-vue-icons/icons'

addIcons(IoCart)

const app = createApp(App)
app.component('v-icon', OhVueIcon)
app.use(router)
app.mount('#app')
