<template>
  <div class="form-check">
    <label class="form-check-label">
      <input
        class="form-check-input"
        type="checkbox"
        disabled
        :checked="value"
      />
      <span class="form-check-sign">
        <span class="check"></span>
      </span>
    </label>
  </div>
</template>

<script>
export default {
  props: ['value']
}
</script>

<style scoped>
.check {
  opacity: 1 !important;
}

.form-check .form-check-label {
  cursor: default !important;
}
</style>
