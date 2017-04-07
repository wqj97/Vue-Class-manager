<template>
  <div class="Menu">
    <div class="user-info">
      <div class="user-head">
        <img src="../assets/c#.svg" alt="">
      </div>
      <div class="user-name">
        1511650919
        万千钧
      </div>
    </div>
    <div class="menu-list">
      <ul>
        <router-link to="/home/before"><li>课前预习</li></router-link>
        <router-link to="/home/doing" class="disable"><li>课堂试练</li></router-link>
        <router-link to="/home/after"><li>课后作业</li></router-link>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'MenuPanel'
  }
</script>

<style lang="scss" type="text/scss">
  .Menu {
    float: left;
    width: 25%;
    height:100%;
    color: #fff;
    background: #3f3f3f;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    .user-info{
      border-bottom: 1px solid #fff;
      height:80px;
      display: flex;
      justify-content: center;
      align-items:center;
      padding: 15px;
      .user-head{
        img{
          width:100%;
        }
      }
      .user-name{
        margin-left: 20px;
      }
    }
    .menu-list{
      height: calc(100% - 111px);
      ul{
        padding: 0;
        margin: 0;
        height:100%;
        list-style-type: none;
        display: flex;
        justify-content: flex-start;
        flex-direction:column;
        a{
          text-decoration: none;
          color: unset;
          display: flex;
          align-items: center;
          justify-content: center;
          width:100%;
          height:10%;
          border-bottom: 1px solid transparent;
          border-top: 1px solid transparent;
          transition: .3s ease;
          &.disable{
            cursor: not-allowed;
          }
          &:hover{
            background: #6c6c6c;
            border-bottom: 1px solid #fff;
            border-top: 1px solid #fff;
          }
          &:active{
            background: #909090;
          }
        }
      }
    }
  }
</style>
