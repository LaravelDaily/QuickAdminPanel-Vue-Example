<template>
  <div>
    <svg
      class="material-spinner"
      :width="size"
      :height="size"
      viewBox="0 0 66 66"
      xmlns="http://www.w3.org/2000/svg"
    >
      <circle
        class="path"
        fill="none"
        stroke-width="6"
        stroke-linecap="round"
        cx="33"
        cy="33"
        r="30"
      ></circle>
    </svg>
  </div>
</template>

<script>
export default {
  props: {
    size: {
      type: String,
      default: '48px'
    }
  }
}
</script>

<style lang="scss" scoped>
$offset: 187;
$duration: 1.4s;

.material-spinner {
  animation: rotator $duration linear infinite;
}

@keyframes rotator {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(270deg);
  }
}

.path {
  stroke-dasharray: $offset;
  stroke-dashoffset: 0;
  transform-origin: center;
  animation: dash $duration ease-in-out infinite,
    colors ($duration * 4) ease-in-out infinite;
}

@keyframes colors {
  0% {
    stroke: #9c27b0;
  }
  25% {
    stroke: #9c27b0;
  }
  50% {
    stroke: #9c27b0;
  }
  75% {
    stroke: #9c27b0;
  }
  100% {
    stroke: #9c27b0;
  }
}

@keyframes dash {
  0% {
    stroke-dashoffset: $offset;
  }
  50% {
    stroke-dashoffset: $offset/4;
    transform: rotate(135deg);
  }
  100% {
    stroke-dashoffset: $offset;
    transform: rotate(450deg);
  }
}
</style>
