<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.contactContact.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_id !== null,
                      'is-focused': activeField == 'company'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.contactContact.fields.company')
                    }}</label>
                    <v-select
                      name="company"
                      label="company_name"
                      :key="'company-field'"
                      :value="entry.company_id"
                      :options="lists.company"
                      :reduce="entry => entry.id"
                      @input="updateCompany"
                      @search.focus="focusField('company')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_first_name,
                      'is-focused': activeField == 'contact_first_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_first_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_first_name"
                      @input="updateContactFirstName"
                      @focus="focusField('contact_first_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_last_name,
                      'is-focused': activeField == 'contact_last_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_last_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_last_name"
                      @input="updateContactLastName"
                      @focus="focusField('contact_last_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_phone_1,
                      'is-focused': activeField == 'contact_phone_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_phone_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_phone_1"
                      @input="updateContactPhone1"
                      @focus="focusField('contact_phone_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_phone_2,
                      'is-focused': activeField == 'contact_phone_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_phone_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_phone_2"
                      @input="updateContactPhone2"
                      @focus="focusField('contact_phone_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_email,
                      'is-focused': activeField == 'contact_email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_email"
                      @input="updateContactEmail"
                      @focus="focusField('contact_email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_skype,
                      'is-focused': activeField == 'contact_skype'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_skype')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_skype"
                      @input="updateContactSkype"
                      @focus="focusField('contact_skype')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.contact_address,
                      'is-focused': activeField == 'contact_address'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.contactContact.fields.contact_address')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.contact_address"
                      @input="updateContactAddress"
                      @focus="focusField('contact_address')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('ContactContactsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('ContactContactsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCompany',
      'setContactFirstName',
      'setContactLastName',
      'setContactPhone1',
      'setContactPhone2',
      'setContactEmail',
      'setContactSkype',
      'setContactAddress'
    ]),
    updateCompany(value) {
      this.setCompany(value)
    },
    updateContactFirstName(e) {
      this.setContactFirstName(e.target.value)
    },
    updateContactLastName(e) {
      this.setContactLastName(e.target.value)
    },
    updateContactPhone1(e) {
      this.setContactPhone1(e.target.value)
    },
    updateContactPhone2(e) {
      this.setContactPhone2(e.target.value)
    },
    updateContactEmail(e) {
      this.setContactEmail(e.target.value)
    },
    updateContactSkype(e) {
      this.setContactSkype(e.target.value)
    },
    updateContactAddress(e) {
      this.setContactAddress(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'contact_contacts.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
