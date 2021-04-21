<template>
  <div class="checkbox-radios">
    <div v-for="option in options" :key="option[optionKey]" class="form-check">
      <label class="form-check-label">
        <input
          class="form-check-input"
          type="radio"
          :name="group"
          :value="option[optionKey]"
          :checked="option[optionKey] === value"
          @change="$emit('change', option[optionKey])"
        />
        {{ option[label] }}
        <span class="circle">
          <span class="check"></span>
        </span>
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    value: {},
    options: {
      type: Array,
      default() {
        return []
      }
    },
    label: {
      type: String,
      default: 'label'
    },
    optionKey: {
      type: String,
      default: 'value'
    }
  },
  computed: {
    group: function () {
      return 'radio-group-' + this._uid
    }
  }
}
</script>

<style scoped>
.checkbox-radios {
  padding-top: 7px;
  padding-bottom: 7px;
}
</style>
