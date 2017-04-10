<template>
  <div class="Before">
    <file-upload title="课前预习" :content="content"></file-upload>
  </div>
</template>

<script>
  import FileUpload from './FileUpload.vue'
  export default {
    name: 'Before',
    data () {
      return {
        content: ''
      }
    },
    components: {
      FileUpload
    }
  }
</script>

<style lang="scss" type="text/scss">
  .Before{
  }
</style>
