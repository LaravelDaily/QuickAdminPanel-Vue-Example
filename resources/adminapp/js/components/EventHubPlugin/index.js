import EventHub from './EventHub.vue'

const EventHubPlugin = {
  install(Vue) {
    Vue.prototype.$eventHub = new Vue()
    Vue.component('event-hub', EventHub)
  }
}

export default EventHubPlugin
