<template>
  <div class="Uploader">
    <div class="uploader-left">
      <div class="uploader-title">
        {{title}}
      </div>
      <div class="uploader-content">
        {{content}}
      </div>
      <div class="uploader-logo">
        <img src="../assets/rocket.svg" alt="">
      </div>
    </div>
    <div class="uploader-right">
      <div class="prew-step" @click="prewStep">
        <span>←</span> 上一步
      </div>
      <div class="uploader-title">
        上传作业
      </div>
      <div class="form-group" v-if="!uploadted">
        <div class="form-content">
          <div class="form-each">
            <label>作业文件(压缩文件)</label>
            <input type="text" @click="chooseFile" placeholder="点击选择文件上传">
            <input type="file" id="fileInputer" @change="fileChoosed(this)">
          </div>
        </div>
        <div class="form-footer">
          <button @click="upload">上传</button>
        </div>
      </div>
      <div class="form-group" v-else>
        <img src="../assets/smile.svg" alt="">
        上传完成!
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  import $ from 'webpack-zepto'
  export default {
    name: 'FileUpload',
    data () {
      return {
        uploadted: false
      }
    },
    props: {
      title: {
        require: true,
        default: ''
      },
      content: {
        require: true,
        default: ''
      }
    },
    methods: {
      upload () {
        console.log(1)
      },
      chooseFile () {
        $('#fileInputer').click()
      },
      fileChoosed (el) {
        console.log(el)
      },
      prewStep () {
        history.go(-1)
      }
    }
  }
</script>

<style lang="scss" type="text/scss">
  .Uploader {
    width: 90%;
    height: 60%;
    display: flex;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    .uploader-title {
      font-weight: bold;
      font-size: 30px;
    }
    .uploader-left {
      width: 50%;
      background: linear-gradient(to bottom, #74e4d2, #50c1b7);
      color: #fff;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex-wrap: wrap;
      flex-direction: column;

      .uploader-content {
        &::-webkit-scrollbar{
          width:5px;
          background: transparent;
        }
        &::-webkit-scrollbar-thumb
        {
          border-radius: 20px;
          background-color: #fff;
        }
        &::-webkit-scrollbar:horizontal{
          height:0;
          background: transparent;
        }
        padding: 15px;
        max-height: 50%;
        overflow: scroll;
      }
      .uploader-logo {
        width:50%;
        img {
          width: 100%;
        }
      }
    }
    .uploader-right {
      width: 50%;
      height: 100%;
      background: linear-gradient(to bottom, #354f62, #1f2f3e);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      flex-direction: column;
      color: #fff;
      position: relative;
      .prew-step{
        top: 15px;
        left: 15px;
        cursor: pointer;
        position: absolute;
      }
      .uploader-title {
        margin-bottom: 30px;
      }
    }
    .form-group {
      width: 80%;
      text-align: center;
      img {
        width:100%;
      }
      label {
        display: block;
      }
      input[type=file] {
        display: none;
      }
      input[type=text] {
        &::-webkit-input-placeholder {
          color: #cacaca !important;
        }
        background: transparent;
        border: none;
        outline: none;
        color: #fff;
        margin: 15px 0;
        border-bottom: 1px solid #fff;
        width: 100%;
      }
      button {
        border: 1px solid #fff;
        border-radius: 3px;
        width: 100%;
        height: 40px;
        color: #fff;
        background: transparent;
        outline: none;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
        transition: .3s ease;
        &:hover {
          background: rgba(0, 0, 0, 0.4);
        }
      }
    }
  }
</style>
