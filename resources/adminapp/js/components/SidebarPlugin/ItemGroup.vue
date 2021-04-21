<template>
  <router-link :to="item.path" v-slot>
    <li class="nav-item" :class="{ active: isActive }">
      <a
        :href="'#' + getAttributeTitle"
        class="nav-link collapsed"
        data-toggle="collapse"
      >
        <template v-if="text">
          <span class="sidebar-mini">{{ textIcon }}</span>
          <span class="sidebar-normal">
            {{ $t(item.title) }}
            <b class="caret"></b>
          </span>
        </template>
        <template v-else>
          <i class="material-icons">{{ item.icon }}</i>
          <p>
            {{ $t(item.title) }}
            <b class="caret"></b>
          </p>
        </template>
      </a>
      <div :id="getAttributeTitle" class="collapse" ref="tab">
        <ul class="nav">
          <template v-for="(child, i) in item.children">
            <sidebar-item-sub-group
              v-if="child.children"
              :key="`sub-group-${i}`"
              :item="child"
            >
            </sidebar-item-sub-group>

            <sidebar-link v-else :key="`sub-item-${i}`" :item="child" text>
            </sidebar-link>
          </template>
        </ul>
      </div>
    </li>
  </router-link>
</template>

<script>
export default {
  name: 'SidebarItemGroup',
  props: {
    item: {
      type: Object,
      default: () => ({
        title: undefined,
        icon: undefined,
        path: {},
        gate: undefined,
        children: []
      })
    },
    text: {
      type: Boolean,
      default: false
    },
    subGroup: {
      type: Boolean,
      default: false
    }
  },
  mounted() {
    if (this.isActive) {
      this.$refs.tab.classList.add('show')
    }
  },
  computed: {
    getAttributeTitle: function () {
      return _.kebabCase(this.item.path.name)
    },
    textIcon: function () {
      return this.$i18n
        .t(this.item.title)
        .split(' ')
        .map(s => s.charAt(0).toUpperCase())
        .join('')
        .substring(0, 3)
    },
    isActive: function () {
      let m = this.subGroup ? this.$route.matched[2] : this.$route.matched[1]

      if (m !== undefined && m.name === this.item.path.name) {
        return true
      }

      return false
    }
  }
}
</script>
