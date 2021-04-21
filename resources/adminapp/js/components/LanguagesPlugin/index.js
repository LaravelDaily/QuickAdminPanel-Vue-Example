import TopNavbarLanguages from './TopNavbarLanguages.vue'
import MobileLanguages from './MobileLanguages.vue'

const LanguagesPlugin = {
  install(Vue) {
    Vue.component('top-navbar-languages', TopNavbarLanguages)
    Vue.component('mobile-languages', MobileLanguages)
  }
}

export default LanguagesPlugin
