<template>
  <div class="Home">
    <menu-panel></menu-panel>
    <transition name="fade">
      <router-view class="Main"></router-view>
    </transition>
  </div>
</template>

<script>
  import MenuPanel from './MenuPannel.vue'
  export default {
    name: 'Home',
    components: {
      MenuPanel
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
