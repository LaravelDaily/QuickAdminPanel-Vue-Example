<template>
  <transition name="fade" mode="out-in">
    <router-view :key="$route.fullPath"></router-view>
  </transition>
</template>
<script>
export default {}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.1s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
