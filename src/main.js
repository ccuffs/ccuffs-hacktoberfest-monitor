import Vue from 'vue'
import App from './App.vue'
import router from '@/router'

import TheFooter from '@/components/TheFooter'

Vue.config.productionTip = false

Vue.component(TheFooter.name, TheFooter)

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
