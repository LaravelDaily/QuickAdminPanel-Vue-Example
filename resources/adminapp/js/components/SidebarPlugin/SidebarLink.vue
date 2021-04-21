<template>
  <router-link
    v-if="item.gate === undefined || $can(item.gate)"
    :to="item.path"
    v-slot="{ href, route, navigate, isActive, isExactActive }"
  >
    <li
      class="nav-item"
      :class="[isActive && 'active', isExactActive && 'active']"
    >
      <a :href="href" class="nav-link" @click="navigate">
        <template v-if="text">
          <span class="sidebar-mini">{{ textIcon }}</span>
          <span class="sidebar-normal">{{ $t(item.title) }}</span>
        </template>
        <template v-else>
          <i class="material-icons">{{ item.icon }}</i>
          <p>{{ $t(item.title) }}</p>
        </template>
      </a>
    </li>
  </router-link>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default: () => ({
        title: undefined,
        icon: undefined,
        path: {},
        gate: undefined
      })
    },
    text: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    textIcon: function () {
      return this.$i18n
        .t(this.item.title)
        .split(' ')
        .map(s => s.charAt(0).toUpperCase())
        .join('')
        .substring(0, 3)
    }
  }
}
</script>
