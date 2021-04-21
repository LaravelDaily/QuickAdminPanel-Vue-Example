import { abilitiesPlugin } from '@casl/vue'
import ability from './services/ability'
import Datatable from '@laraveldaily/vue2-datatable'
import VueSweetalert2 from 'vue-sweetalert2'
import MaterialSpinner from '@components/MaterialSpinner.vue'
import VueButtonSpinner from '@components/VueButtonSpinner.vue'
import BootstrapAlert from '@components/BootstrapAlert.vue'
import SideBar from '@components/SidebarPlugin'
import LanguagesPlugin from '@components/LanguagesPlugin'
import EventHub from '@components/EventHubPlugin'
import BackButton from '@components/BackButton.vue'
import DatetimePicker from '@components/DatetimePicker.vue'
import VueRadio from '@components/VueRadio.vue'
import vSelect from 'vue-select'

const GlobalComponents = {
  install(Vue) {
    Vue.use(abilitiesPlugin, ability)
    Vue.use(SideBar)
    Vue.use(LanguagesPlugin)
    Vue.use(EventHub)
    Vue.use(Datatable)
    Vue.use(VueSweetalert2)
    Vue.component('datetime-picker', DatetimePicker)
    Vue.component('back-button', BackButton)
    Vue.component('material-spinner', MaterialSpinner)
    Vue.component('vue-button-spinner', VueButtonSpinner)
    Vue.component('bootstrap-alert', BootstrapAlert)
    Vue.component('v-radio', VueRadio)
    Vue.component('v-select', vSelect)
  }
}

export default GlobalComponents
