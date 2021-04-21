<template>
  <div>
    <div v-for="item in row[field]" :key="item.id" class="m-1 d-inline-block">
      <a :href="item.url" :title="item.name" target="_blank">
        <img :src="item.thumbnail" :alt="item.name" :title="item.name" />
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
