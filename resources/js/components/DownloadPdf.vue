<template>
  <button
    @click="download"
    :disabled="downloading"
    :class="{ 'cursor-not-allowed': downloading, 'hover:bg-gray-400': !downloading }"
    class="btn btn-white inline-flex items-center"
  >
    <span
      v-if="downloading"
      class="mr-2"
    >
      <i class="fas fa-spinner"></i>
    </span>

    <span v-else>
      <svg
        class="fill-current w-4 h-4 mr-2"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
      >
      <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
    </svg>
    </span>

    <span>PDF</span>
  </button>
</template>

<script>
  export default {
    name: 'DownloadPdf',

    data () {
      return {
        downloading: false
      }
    },

    methods: {
      async download () {
        this.downloading = true

        try {
          const { data } = await axios({
            url: '/?download',
            method: 'GET',
            responseType: 'blob'
          })

          const url = window.URL.createObjectURL(new Blob([data]))

          const link = document.createElement('a')

          link.href = url

          link.setAttribute('download', 'invoices.pdf')

          document.body.appendChild(link)

          link.click()
        } catch (err) {
          console.log(err)
        }

        this.downloading = false
      }
    },
  }
</script>

<style scoped>
  @keyframes spinner {
    to {
      transform: rotate(360deg);
    }
  }

  .fa-spinner {
    animation: spinner 1s linear infinite;
  }
</style>
