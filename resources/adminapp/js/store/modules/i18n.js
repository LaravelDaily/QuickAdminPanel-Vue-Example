import i18n from '../../i18n'

function getDefaultState() {
  return {
    languages: [],
    availableLocales: []
  }
}

const getters = {
  locale: () => i18n.locale,
  languages: state => state.languages,
  availableLocales: state => state.availableLocales
}

const actions = {
  fetchLanguages({ commit, dispatch }) {
    axios.get('locales/languages').then(response => {
      commit('setLanguages', response.data.languages)
      dispatch('setLocale', localStorage.locale ?? response.data.locale)
    })
  },
  fetchLocaleMessages({ commit, getters }, locale) {
    if (getters.availableLocales.indexOf(locale) !== -1) {
      return Promise.resolve()
    }

    commit('setAcceptLanguage', locale)

    return axios.get('locales/messages').then(response => {
      commit('setMessages', { locale, messages: response.data })
      commit('addAvailableLocale', locale)
    })
  },
  setLocale({ commit, dispatch }, locale) {
    dispatch('fetchLocaleMessages', locale).then(() => {
      commit('setLocale', locale)
    })
  }
}

const mutations = {
  setLanguages(state, languages) {
    state.languages = languages
  },
  setLocale(state, locale) {
    i18n.locale = locale
    localStorage.locale = locale

    // If you are using moment in your project, now is a good time
    // to set its locale also
    //moment.locale(locale)
  },
  setMessages(state, { locale, messages }) {
    i18n.setLocaleMessage(locale, messages)
  },
  addAvailableLocale(state, locale) {
    state.availableLocales.push(locale)
  },
  setAcceptLanguage(state, locale) {
    axios.defaults.headers.common['Accept-Language'] = locale
  }
}

export default {
  namespaced: true,
  state: getDefaultState,
  getters,
  actions,
  mutations
}
