<template>
  <li class="nav-item dropdown">
    <a
      class="nav-link"
      href="#"
      id="navbarDropdownLanguage"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      <i class="material-icons">language</i>
      <div class="fixed-width">{{ locale }}</div>
    </a>
    <div
      class="dropdown-menu dropdown-menu-right"
      aria-labelledby="navbarDropdownLanguage"
    >
      <a
        class="dropdown-item"
        href="#"
        @click.prevent="setLocale(language.short_code)"
        v-for="language in languages"
        :key="language.short_code"
      >
        {{ language.title }}
        <i class="pl-1 material-icons" v-show="language.short_code === locale">
          done
        </i>
      </a>
    </div>
  </li>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {}
  },
  computed: {
    ...mapGetters('I18NStore', ['locale', 'languages'])
  },
  methods: {
    ...mapActions('I18NStore', ['setLocale'])
  }
}
</script>

<style scoped>
.fixed-width {
  width: 1.3em;
  text-align: center;
  display: inline-block;
}
</style>
