<template>
  <div class="card">
    <div class="card-header card-header-primary card-header-icon">
      <div class="card-icon">
        <i class="material-icons">{{ chartData.icon }}</i>
      </div>
      <h4 class="card-title">{{ chartData.title }}</h4>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th
              v-for="(field, i) in chartData.fields"
              :key="i"
              class="text-capitalize"
            >
              {{ field.split('.')[0] }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in chartData.data" :key="item.id">
            <template v-for="(field, i) in chartData.fields">
              <td :key="i">
                <template v-if="field.split('.')[1]">
                  <badge-item :row="item" :field="field"></badge-item>
                </template>
                <span v-else>{{ item[field] }}</span>
              </td>
            </template>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import BadgeItem from '@components/Datatables/DatatableList'

export default {
  components: {
    BadgeItem
  },
  props: ['chartData']
}
</script>
