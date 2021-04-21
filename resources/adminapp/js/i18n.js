import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)

export default new VueI18n({
  locale: process.env.MIX_VUE_APP_I18N_LOCALE || 'en',
  fallbackLocale: process.env.MIX_VUE_APP_I18N_FALLBACK_LOCALE || 'en'
})
