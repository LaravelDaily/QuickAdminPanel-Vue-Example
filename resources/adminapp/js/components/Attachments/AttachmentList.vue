<template>
  <div class="attachment-list-container" @click.stop>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th width="415">Status</th>
          <th width="140">File size</th>
          <th width="36"></th>
        </tr>
      </thead>
      <tbody>
        <template v-for="file in attachments">
          <tr v-if="!file.wasRecentlyCreated" :key="file.id">
            <td class="font-weight-bold">
              <a :href="file.url" target="_blank">
                {{ file.file_name }}
              </a>
            </td>
            <td width="415">—</td>
            <td width="140">{{ filesize(file.size) }}</td>
            <td width="36">
              <button
                type="button"
                class="btn btn-round btn-link text-rose"
                @click="$emit('file-removed', file)"
              >
                <i class="material-icons">
                  delete
                </i>
              </button>
            </td>
          </tr>
        </template>
        <tr v-for="file in tmpAttachments" :key="file.uuid">
          <td class="font-weight-bold file-name">{{ file.file_name }}</td>
          <td width="415">
            <div
              class="progress"
              v-show="checkProgress(file) && !isCanceledOrError(file.o)"
            >
              <div
                class="progress-bar progress-bar-striped"
                :class="{
                  'progress-bar-animated': file.progress < 100,
                  'bg-success': file.progress == 100
                }"
                role="progressbar"
                :aria-valuenow="file.progress"
                aria-valuemin="0"
                aria-valuemax="100"
                :style="{ width: file.progress + '%' }"
              ></div>
            </div>
            <div
              v-show="!checkProgress(file) && !isCanceledOrError(file.o)"
              class="text-capitalize"
            >
              {{ file.o.status }}
            </div>
            <div v-show="file.errorMsg" class="text-danger">
              {{ file.errorMsg }}
            </div>
          </td>
          <td width="140">{{ filesize(file.size) }}</td>
          <td width="36">
            <button
              type="button"
              class="btn btn-round btn-link text-rose"
              @click="removeTmpFile(file)"
            >
              <i
                v-show="isUploading(file.o)"
                class="material-icons"
                title="Remove"
              >
                delete
              </i>
              <i
                v-show="!isUploading(file.o)"
                class="material-icons"
                title="Cancel"
              >
                close
              </i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'AttachmentList',
  props: {
    tmpAttachments: {
      type: Array,
      default: function () {
        return []
      }
    },
    attachments: {
      type: Array
    },
    modelId: {
      type: Number,
      default: 0
    }
  },
  methods: {
    checkProgress(attachment) {
      this.tableKey += 1
      return attachment.progress === null ? false : true
    },
    isCanceledOrError(file) {
      return file.status === 'canceled' || file.status === 'error'
    },
    isUploading(file) {
      return (
        file.status === 'canceled' ||
        file.status === 'error' ||
        file.status === 'success'
      )
    },
    removeTmpFile(file) {
      this.$emit('tmp-file-removed', file)
    },
    filesize(bytes, decimals = 1) {
      if (bytes === 0) return '0 Bytes'

      const k = 1000
      const dm = decimals < 0 ? 0 : decimals
      const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

      const i = Math.floor(Math.log(bytes) / Math.log(k))

      return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i]
    }
  }
}
</script>

<style scoped>
button {
  width: 20px;
  height: 20px;
  margin: 0;
  padding: 0;
}

button .material-icons {
  line-height: 20px;
  font-size: 20px;
}

.vue-dropzone .table * {
  cursor: auto;
}

.vue-dropzone .table a,
.vue-dropzone .table button.btn,
.vue-dropzone .table button.btn i {
  cursor: pointer;
}

.table thead tr th {
  color: rgba(0, 0, 0, 0.57);
  font-weight: 500;
}

.table tbody tr td {
  color: rgba(0, 0, 0, 0.54);
  font-weight: 400;
}

.table tbody tr td.file-name,
.table tbody tr td a {
  color: #202124;
}

.table tbody tr td a:hover {
  text-decoration: underline;
}

.table thead tr th,
.table tbody tr td {
  font-size: 13px;
}

.table td > div,
.table th > div {
  position: relative;
}

.progress {
  height: 4px;
  border-radius: 0;
}
</style>
