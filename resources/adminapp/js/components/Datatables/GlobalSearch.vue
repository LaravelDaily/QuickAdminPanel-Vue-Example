<template>
  <div
    class="form-group bmd-form-group"
    :class="{
      'has-items': query.s,
      'is-focused': focus
    }"
  >
    <label class="bmd-label-floating">
      {{ $t('global.search') }}
    </label>
    <div class="input-group">
      <input
        class="form-control"
        type="text"
        name="search"
        :value="query.s"
        @input="debounceSearch($event.target.value)"
        @focus="focus = true"
        @blur="focus = false"
      />
      <div
        class="btn btn-just-icon btn-round btn-link text-dark d-inline-block input-group-append m-0"
        style="height: 36px;"
        v-if="query.s.length !== 0"
        @click="query.s = ''"
      >
        <i class="material-icons">clear</i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    query: { type: Object, require: true }
  },
  data() {
    return {
      focus: false
    }
  },
  methods: {
    debounceSearch: _.debounce(function (value) {
      this.query.s = value
      this.query.offset = 0
    }, 300)
  }
}
</script>
