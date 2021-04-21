<template>
  <button class="btn" :class="getBackgroundClass" :type="type">
    <span class="btn-label" v-show="!emptyStatus">
      <i class="material-icons">{{ icon }}</i>
    </span>
    <i class="fa fa-circle-o-notch fa-spin" v-show="isLoading"></i>
    <slot>Save</slot>
  </button>
</template>

<script>
export default {
  props: {
    isLoading: {
      type: Boolean,
      default: false
    },
    status: {
      type: [String, Boolean],
      default: ''
    },
    type: {
      type: String,
      default: 'submit'
    }
  },
  computed: {
    getBackgroundClass() {
      return {
        'btn-success': this.isSuccess,
        'btn-danger': this.isFailed,
        'is-loading': this.isLoading
      }
    },
    icon() {
      if (this.isSuccess) {
        return 'check'
      }

      if (this.isFailed) {
        return 'close'
      }

      return ''
    },
    isSuccess() {
      return this.status === 'success' || this.status === true
    },
    isFailed() {
      return this.status === 'failed' || this.status === false
    },
    emptyStatus() {
      return this.status === ''
    }
  }
}
</script>
