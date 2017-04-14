<template>
  <div class="Default">
    <div class="default-group">
      <div class="uploader-left">
        <div class="uploader-title">
          实验教学管理系统
        </div>
        <div class="uploader-content">
          在这里上传作业
        </div>
        <div class="uploader-logo">
          <img src="../assets/rocket.svg" alt="">
        </div>
      </div>
      <div class="uploader-right">
        <div class="homework-name">
          {{classInfo.C_name}}
        </div>
        <router-link :to="{name: 'Before',params: classInfo}">
          <div class="steep-each">
            课前预习: {{isFinished(0)}}
          </div>
        </router-link>
        <router-link :to="{name: 'Doing',params: classInfo}">
          <div class="steep-each">
            课堂练习: {{isFinished(1)}}
          </div>
        </router-link>
        <router-link :to="{name: 'After',params: classInfo}">
          <div class="steep-each">
            课后习题: {{isFinished(2)}}
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Default',
    data () {
      return {
        classInfo: {
          finish_state: [false, false, false]
        }
      }
    },
    created () {
      this.$http.get('/user/classinfo').then(response => {
        this.classInfo = response.body
        this.classInfo.C_content = JSON.parse(this.classInfo.C_content)
      }, () => {
        this.$router.replace('/')
      })
    },
    methods: {
      isFinished (progress) {
        return this.classInfo.finish_state[progress] ? '已完成' : '未完成'
      }
    }
  }
</script>

<style lang="scss" type="text/scss">
  .Default {
    width: 75%;
    height: 100%;
    float: left;
    transition: transform .5s cubic-bezier(.55, 0, .1, 1), opacity .5s cubic-bezier(.55, 0, .1, 1);
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to bottom, #f47f91, #d65577);
    .default-group {
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
          padding: 15px;
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
        a {
          text-decoration: none;
          color: unset;
          width: 80%;
        }
        .steep-each {
          width: 100%;
          line-height: 50px;
          margin: 15px 0;
          border: 1px solid #fff;
          padding: 0 15px;
          box-sizing: border-box;
          transition: .3s ease;
          border-radius: 5px;
          position: relative;
          &:after {
            content: '>';
            position: absolute;
            right: 15px;
          }
          &:hover {
            background: rgba(0, 0, 0, 0.3);
          }
        }
      }
    }
  }
</style>
