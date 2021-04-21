function initialState() {
  return {
    entry: {
      id: null,
      company_id: null,
      contact_first_name: '',
      contact_last_name: '',
      contact_phone_1: '',
      contact_phone_2: '',
      contact_email: '',
      contact_skype: '',
      contact_address: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      company: []
    },
    loading: false
  }
}

const route = 'contact-contacts'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setCompany({ commit }, value) {
    commit('setCompany', value)
  },
  setContactFirstName({ commit }, value) {
    commit('setContactFirstName', value)
  },
  setContactLastName({ commit }, value) {
    commit('setContactLastName', value)
  },
  setContactPhone1({ commit }, value) {
    commit('setContactPhone1', value)
  },
  setContactPhone2({ commit }, value) {
    commit('setContactPhone2', value)
  },
  setContactEmail({ commit }, value) {
    commit('setContactEmail', value)
  },
  setContactSkype({ commit }, value) {
    commit('setContactSkype', value)
  },
  setContactAddress({ commit }, value) {
    commit('setContactAddress', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setCompany(state, value) {
    state.entry.company_id = value
  },
  setContactFirstName(state, value) {
    state.entry.contact_first_name = value
  },
  setContactLastName(state, value) {
    state.entry.contact_last_name = value
  },
  setContactPhone1(state, value) {
    state.entry.contact_phone_1 = value
  },
  setContactPhone2(state, value) {
    state.entry.contact_phone_2 = value
  },
  setContactEmail(state, value) {
    state.entry.contact_email = value
  },
  setContactSkype(state, value) {
    state.entry.contact_skype = value
  },
  setContactAddress(state, value) {
    state.entry.contact_address = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
