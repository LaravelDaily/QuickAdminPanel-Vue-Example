<template>
  <div>
    <vue-dropzone
      :id="uid"
      :ref="uid"
      :options="options"
      :use-custom-slot="true"
      @vdropzone-file-added="addTmpFile"
      @vdropzone-upload-progress="uploadProgress"
      @vdropzone-success="success"
      @vdropzone-error="error"
      @vdropzone-thumbnail="updateDataUrl"
    >
      <div class="dropzone-container" v-show="!hasFiles">
        <div class="file-selector">
          <figure>
            <svg
              width="104px"
              height="104px"
              viewBox="0 0 104 104"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
            >
              <defs>
                <circle id="path-1" cx="36" cy="36" r="36"></circle>
                <filter
                  x="-37.5%"
                  y="-29.2%"
                  width="175.0%"
                  height="175.0%"
                  filterUnits="objectBoundingBox"
                  id="filter-2"
                >
                  <feOffset
                    dx="0"
                    dy="6"
                    in="SourceAlpha"
                    result="shadowOffsetOuter1"
                  ></feOffset>
                  <feGaussianBlur
                    stdDeviation="8"
                    in="shadowOffsetOuter1"
                    result="shadowBlurOuter1"
                  ></feGaussianBlur>
                  <feColorMatrix
                    values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.08 0"
                    type="matrix"
                    in="shadowBlurOuter1"
                    result="shadowMatrixOuter1"
                  ></feColorMatrix>
                  <feOffset
                    dx="0"
                    dy="1"
                    in="SourceAlpha"
                    result="shadowOffsetOuter2"
                  ></feOffset>
                  <feGaussianBlur
                    stdDeviation="1"
                    in="shadowOffsetOuter2"
                    result="shadowBlurOuter2"
                  ></feGaussianBlur>
                  <feColorMatrix
                    values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.11 0"
                    type="matrix"
                    in="shadowBlurOuter2"
                    result="shadowMatrixOuter2"
                  ></feColorMatrix>
                  <feMerge>
                    <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                    <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                  </feMerge>
                </filter>
              </defs>
              <g
                id="Page-1"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
              >
                <g
                  id="Artboard"
                  transform="translate(-460.000000, -125.000000)"
                >
                  <g id="Group-4" transform="translate(412.000000, 129.000000)">
                    <g id="Group-2" transform="translate(58.000000, 0.000000)">
                      <circle
                        id="Oval"
                        fill="#3560FF"
                        opacity="0.100000001"
                        cx="42"
                        cy="42"
                        r="42"
                      ></circle>
                      <g id="Group" transform="translate(6.000000, 6.000000)">
                        <g id="Oval">
                          <use
                            fill="black"
                            fill-opacity="1"
                            filter="url(#filter-2)"
                            xlink:href="#path-1"
                          ></use>
                          <use
                            fill="#FFFFFF"
                            fill-rule="evenodd"
                            xlink:href="#path-1"
                          ></use>
                        </g>
                        <g
                          id="upload-cloud"
                          transform="translate(21.818182, 24.000000)"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                        >
                          <polyline
                            id="Path"
                            stroke="#000000"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                          <path
                            d="M14.3565525,12.0897285 L14.3565525,24.1794569"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <path
                            d="M25.6438239,20.7792208 C28.2965835,19.3021499 29.6312816,16.1761528 28.8860265,13.1856562 C28.1407715,10.1951596 25.5052337,8.10125672 22.4838689,8.09921935 L20.8179512,8.09921935 C19.7219904,3.76967373 16.1275086,0.577339516 11.7773112,0.0700384831 C7.42711383,-0.43726255 3.22057026,1.84535014 1.19724759,5.81113853 C-0.826075091,9.77692693 -0.247870665,14.6059952 2.6515151,17.9569414"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <polyline
                            id="Path"
                            stroke="#3560FF"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </figure>
          <span class="font-weight-bold">Drop files here to upload</span>
          <p class="separator"><span> or </span></p>
          <button type="button" class="btn btn-azure">
            Browse
          </button>
        </div>
      </div>

      <div class="file-preview-container" v-show="hasFiles">
        <button type="button" class="btn btn-azure">
          Browse
        </button>
        <component
          :is="previewComponent"
          :key="childKey"
          :tmp-attachments="tmpAttachments"
          :attachments="media"
          @tmp-file-removed="handleTmpFileRemoved"
          @file-removed="fileRemoved"
        ></component>
      </div>
    </vue-dropzone>
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import AttachmentList from './AttachmentList'
import AttachmentPictures from './AttachmentPictures'

export default {
  components: {
    vueDropzone: vue2Dropzone,
    AttachmentList,
    AttachmentPictures
  },
  props: {
    accept: {
      type: String,
      default: null
    },
    component: {
      type: String,
      default: 'list',
      validator: value => {
        return ['list', 'pictures'].indexOf(value) !== -1
      }
    },
    route: {
      type: String,
      required: true
    },
    maxFiles: {
      type: Number,
      default: null
    },
    maxFileSize: {
      type: Number,
      default: 2
    },
    collectionName: {
      type: String,
      required: true
    },
    media: {
      type: Array,
      default: function () {
        return []
      }
    },
    modelId: {
      type: [String, Number],
      default: 0
    }
  },
  data() {
    return {
      hasFiles: false,
      childKey: 1,
      tmpAttachments: [],
      options: {
        url: this.route,
        maxFiles: this.maxFiles,
        maxFilesize: this.maxFileSize,
        acceptedFiles: this.accept,
        thumbnailWidth: 120,
        addRemoveLinks: true,
        timeout: 0,
        params: {
          size: this.maxFileSize,
          collection_name: this.collectionName,
          model_id: this.modelId
        },
        previewsContainer: '.attachment-list-container',
        previewTemplate: '<div class="d-none"></div>',
        headers: {
          'X-XSRF-TOKEN': this.$getCookie('XSRF-TOKEN')
        }
      }
    }
  },
  computed: {
    uid: function () {
      return `dropzone-${this._uid}`
    },
    previewComponent: function () {
      return `attachment-${this.component}`
    }
  },
  watch: {
    tmpAttachments: {
      handler: function () {
        this.hasFiles = this.media.length + this.tmpAttachments.length
      },
      deep: true
    },
    media: {
      handler: function () {
        this.hasFiles = this.media.length + this.tmpAttachments.length
        if (this.maxFiles === null) {
          return
        }
        let dz = this.$refs[this.uid]
        let fo = this.media.filter(item => item.wasRecentlyCreated !== true)
        dz.dropzone.options.maxFiles = this.maxFiles - fo.length
      },
      deep: true
    }
  },
  methods: {
    addTmpFile(file) {
      let attachment = {}
      attachment.uuid = file.upload.uuid
      attachment.id = null
      attachment.file_name = file.name
      attachment.size = file.size
      attachment.progress = null
      attachment.errorMsg = null
      attachment.o = file
      attachment.preview_thumbnail = null
      this.tmpAttachments.push(attachment)
    },
    uploadProgress(file, progress, bytesSent) {
      this.tmpAttachments.map(attachment => {
        if (attachment.uuid === file.upload.uuid) {
          attachment.progress = `${Math.floor(progress)}`
        }
      })
    },
    success(file, response) {
      let model = response
      model.wasRecentlyCreated = true

      this.fileUploaded(model)
    },
    error(file, message, xhr) {
      this.tmpAttachments.map(attachment => {
        if (attachment.uuid === file.upload.uuid) {
          attachment.errorMsg = message
        }
      })
    },
    handleTmpFileRemoved(file) {
      console.log(file)
      if (_.includes(['canceled', 'error'], file.o.status)) {
        this.removeTmpFile(file)
        return
      }

      if (file.o.status === 'uploading') {
        this.$refs[this.uid].removeFile(file.o)

        return
      }

      if (file.o.status === 'success') {
        this.removeTmpFile(file)
        this.fileRemoved(file)
        this.$refs[this.uid].removeFile(file.o)

        return
      }

      if (file.o.status === 'queued') {
        this.cancelQueuedFile(file)
        this.$refs[this.uid].removeFile(file.o)

        return
      }
    },
    removeTmpFile(file) {
      this.tmpAttachments = this.tmpAttachments.filter(attachment => {
        return attachment.uuid !== file.o.upload.uuid
      })
    },
    cancelQueuedFile(file) {
      this.tmpAttachments.map(attachment => {
        if (attachment.uuid === file.o.upload.uuid) {
          attachment.o.status = 'canceled'
          attachment.errorMsg = 'Upload canceled.'
        }
      })
    },
    updateDataUrl(file, dataURL) {
      this.tmpAttachments.map(attachment => {
        if (attachment.uuid === file.upload.uuid) {
          attachment.preview_thumbnail = dataURL
        }
      })
    },
    fileRemoved(file) {
      this.$emit('file-removed', file)
    },
    fileUploaded(file) {
      this.$emit('file-uploaded', file)
    }
  }
}
</script>

<style scoped>
.separator {
  position: relative;
  width: 130px;
  margin: 0 auto 16px;
}

.separator:before {
  position: absolute;
  content: '';
  height: 1px;
  width: 100px;
  background: #d8d8d8;
  top: 50%;
  left: 0;
  transform: translate(-50%, -50%);
}

.separator:after {
  position: absolute;
  content: '';
  height: 1px;
  width: 100px;
  background: #d8d8d8;
  top: 50%;
  left: 130px;
  transform: translate(-50%, -50%);
}

.file-preview-container {
  text-align: left;
}

.dropzone-container {
  margin: 2em 0;
}
</style>
