<template>
  <div class="row" v-if="message">
    <div class="col-md-12">
      <div class="alert" :class="'alert-' + color">
        <button
          class="close"
          type="button"
          data-dismiss="alert"
          aria-label="Close"
        >
          <i class="material-icons">close</i>
        </button>
        <span>
          <b v-show="color === 'danger'">Error -</b>
          {{ message }}
          <ul v-if="errors">
            <li v-for="(value, key) in errors" :key="key">
              {{ value[0] }}
            </li>
          </ul>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters('Alert', ['message', 'errors', 'color'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': function () {
      this.resetState()
    }
  },
  methods: {
    ...mapActions('Alert', ['resetState'])
  }
}
</script>

<style scoped></style>
