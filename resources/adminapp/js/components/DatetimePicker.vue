<template>
  <input
    v-bind="$attrs"
    :ref="ref"
    @focus="$emit('focus')"
    @blur="$emit('blur')"
  />
</template>

<script>
export default {
  props: {
    picker: {
      type: String,
      default: 'datetime',
      validator: value => {
        let acceptedValues = ['datetime', 'date', 'time']
        return acceptedValues.indexOf(value) !== -1
      }
    }
  },
  computed: {
    ref: function () {
      return 'datetimepicker' + this._uid
    }
  },
  mounted() {
    let el = this.$refs[this.ref]
    let format = this.$headMeta('moment_datetime_format')

    if (this.picker === 'date') {
      format = this.$headMeta('moment_date_format')
    } else if (this.picker === 'time') {
      format = this.$headMeta('moment_time_format')
    }

    this.$jquery(el).datetimepicker({
      format,
      icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-chevron-up',
        down: 'fa fa-chevron-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    })

    this.$jquery(el).on('dp.change', this.update)
  },
  beforeDestroy() {
    let el = this.$refs[this.ref]
    this.$jquery(el).off('dp.change', this.update)
  },
  methods: {
    update(event) {
      this.$emit('input', event)
    }
  }
}
</script>
