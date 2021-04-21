<template>
  <div>
    <div v-for="item in row[field]" :key="item.id" class="mb-1">
      <a :href="item.url" :title="item.name" target="_blank">
        <i class="material-icons mr-1">link</i>{{ item.file_name }}
      </a>
    </div>
  </div>
</template>

<script>
export default {
  props: ['field', 'row']
}
</script>

<style scoped>
a {
  font-size: 13px;
  font-weight: 500;
  color: #202124;
}
a:hover {
  color: #9c27b0;
  text-decoration: underline;
}
</style>
