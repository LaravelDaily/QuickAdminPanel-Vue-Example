<template>
  <div name="HeaderSettings">
    <button
      type="button"
      class="btn btn-default dropdown-toggle"
      data-toggle="dropdown"
    >
      <i class="fa fa-cog"></i>
      <span class="caret"></span>
    </button>
    <div class="dropdown-menu p-2 mr-5">
      <h5 class="ml-2 mb-1">
        {{ $t('global.datatables.colvis') }}
      </h5>
      <hr class="my-1" />
      <div v-for="(col, idx) in columns" :key="col.title + idx">
        <div
          class="dropdown-item px-2 mt-0 mb-1"
          @click.stop.prevent="handleChange(col)"
        >
          <i class="material-icons text-success mr-2" v-if="isColVisible(col)">
            done
          </i>
          <i class="material-icons text-rose mr-2" v-else>close</i>
          {{ $t(col.title) }}
        </div>
      </div>
      <hr class="my-1" />
      <button type="button" class="btn btn-default btn-sm pull-right">
        {{ $t('global.close') }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeaderSettings',
  props: ['columns'],
  methods: {
    isColVisible(col) {
      return typeof col.visible === 'undefined' || '' + col.visible === 'true'
    },
    handleChange(col) {
      this.$set(col, 'visible', !this.isColVisible(col))
    }
  }
}
</script>

<style scoped>
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus {
  box-shadow: none;
  background-color: #f4f4f4;
  color: #000;
  cursor: pointer !important;
}
</style>
