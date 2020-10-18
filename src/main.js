import Vue from 'vue'
import App from './App.vue'

import TheFooter from '@/components/TheFooter'

Vue.config.productionTip = false

Vue.component(TheFooter.name, TheFooter)

new Vue({
  render: h => h(App),
}).$mount('#app')
