<template lang='html'>
  <div class='Index'>
    <div class="form-group">
      <div class="form-left">
        <p>
          <img src="../assets/c#.svg" alt="">
        </p>
        <p>
          教学管理系统
        </p>
      </div>
      <div class="form-content">
        <div class="form-inputer">
          <div class="form-each">
            <input type="text" v-model="number" :class="{error : check == true && number == ''}">
            <label>学号</label>
          </div>
          <div class="form-each">
            <input type="password" v-model="pwd" :class="{error : check == true && pwd == ''}">
            <label>密码</label>
          </div>
        </div>
        <div class="form-footer">
          <button @click="signIn">SIGN UP</button>
        </div>
      </div>
    </div>
    <div class="author">
      万千钧设计-开发 版权归万千钧所有
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Index',
    data () {
      return {
        number: '',
        pwd: '',
        check: false
      }
    },
    methods: {
      signIn () {
        this.check = true
        if (this.number === '' || this.pwd === '') {
          return
        }
      }
    }
  }
</script>


<style lang="scss" type="text/scss">
  .Index {
    width: 100vw;
    height: 100vh;
    background: #adf7d6;
    display: flex;
    justify-content: center;
    align-items: center;
    .form-group {
      width: 80%;
      height: 75%;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      background: white;
      display: flex;
      .form-left {
        width: 45%;
        height: 110%;
        position: relative;
        top: -5%;
        background: linear-gradient(to bottom, #62d6b1, #00c178);
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        font-size: 26px;
        color: #fff;
        box-shadow: 0 0 20px rgba(0, 193, 120, 0.5);
        border-radius: 10px;
      }
      .form-content {
        width: 55%;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
      }

      .form-inputer {
        width: 80%;
        .form-each {
          margin-bottom: 20px;
          position: relative;
          height: 60px;
        }
        label {
          display: block;
          color: #c8c8c8;
          line-height: 40px;
          transition: .3s ease;
          position: relative;
          top: -30px;
        }
        input {
          position: absolute;
          width: 100%;
          border: none;
          height: 30px;
          outline: none;
          border-bottom: 1px solid #e3e3e3;
          transition: all .3s ease;
          &:focus {
            border-bottom: 1px solid #00c178;
          }
          &:focus + label {
            color: #00c178;
          }
          &.error{
            border-bottom: 1px solid #ff413a;
          }
        }
      }
      .form-footer {
        button {
          width: 150px;
          height: 50px;
          border: none;
          font-size: 25px;
          background: #f8ce00;
          color: #fff;
          outline: none;
          border-radius: 30px;
          box-shadow: 0 0 50px #f8ce00;
          cursor: pointer;
          transition: .3s ease;
          &:hover {
            background: #00c178;
            box-shadow: 0 0 50px #62d6b1;
          }
        }
      }
    }
    .author {
      position: absolute;
      bottom: 0;
      color: #535353;
    }
  }
</style>
