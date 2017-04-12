<template>
  <div class="Home">
    <menu-panel :userInfo="homeInfo.user_nfo"></menu-panel>
    <transition name="fade">
      <router-view class="Main"></router-view>
    </transition>
  </div>
</template>

<script>
  import MenuPanel from './MenuPannel.vue'
  export default {
    name: 'Home',
    data () {
      return {
        homeInfo: ''
      }
    },
    components: {
      MenuPanel
    },
    created () {
      this.$http.get('/index/home').then(response => {
        this.homeInfo = response.body
        this.homeInfo.class_info.C_content = JSON.parse(this.homeInfo.class_info.C_content)
      })
    }
  }
</script>

<style lang="scss" type="text/scss">
  .Home{
    height:100%;
  }
  .Main{
    width:75%;
    height:100%;
    float: left;
    transition: transform .5s cubic-bezier(.55, 0, .1, 1), opacity .5s cubic-bezier(.55, 0, .1, 1);
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to bottom, #f47f91, #d65577);
  }
</style>
