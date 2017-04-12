<template>
  <div class="">
    <file-upload :title="title" :content="content" :progress="progress"></file-upload>

  </div>
</template>

<script>
  import FileUpload from './FileUpload.vue'
  export default {
    name: 'Doing',
    data () {
      return {
        content: '',
        progress: 2,
        title: ''
      }
    },
    components: {
      FileUpload
    },
    created () {
      let params = this.$route.params
      if (typeof params.C_content === 'undefined') {
        this.$router.replace('/home')
      }
      this.content = params.C_content[2]
      this.title = params.C_name
    }
  }
</script>

<style lang="scss" type="text/scss">
</style>
