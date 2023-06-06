import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap/dist/js/bootstrap.js'

const app = createApp(App)

app.config.globalProperties.token = "TOKEN"
app.config.globalProperties.setToken = function (value) {
    this.token=value
}
app.use(router).mount('#app')

