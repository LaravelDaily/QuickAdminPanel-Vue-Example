<template>
  <div>
    {{ row[`${field}_label`] }}
  </div>
</template>

<script>
export default {
  props: ['field', 'row']
}
</script>
