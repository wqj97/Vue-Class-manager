<template>
  <div id="app">
    <transition :name="transitionName">
      <router-view class="child-view"></router-view>
    </transition>
  </div>
</template>

<script>
  export default {
    name: 'app',
    data () {
      return {
        transitionName: 'slide-left'
      }
    },
    watch: {
      '$route' (to, from) {
        const toDepth = to.path.split('/').length
        const fromDepth = from.path.split('/').length
        this.transitionName = toDepth < fromDepth ? 'slide-right' : 'slide-left'
      }
    }
  }
</script>

<style type="text/css" rel="stylesheet/scss" lang="scss">
  html, body {
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  }

  #app {
    width: 100%;
    height: 100%;
  }

  .child-view {
    transition: transform .5s cubic-bezier(.55, 0, .1, 1), opacity .5s cubic-bezier(.55, 0, .1, 1);
  }

  .slide-left-enter-active {
    height: 100%;
  }

  .slide-left-enter, .slide-right-leave-active {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100% !important;
    -webkit-transform: translate(30px, 0);
    transform: translate(30px, 0);
  }

  .slide-left-enter #newItem {
    opacity: 0 !important;
  }

  .slide-left-enter-active .empty, .slide-right-enter-active .empty {
    opacity: 0 !important;
  }

  .slide-right-enter-active {
    height: 100% !important;
  }

  .slide-left-leave-active, .slide-right-enter {
    opacity: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    -webkit-transform: translate(-30px, 0);
    transform: translate(-30px, 0);
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
    position: absolute;
    left: 25%;
  }

  .fade-enter, .fade-leave-active {
    opacity: 0.3
  }

  .grow-enter {
    height: 0 !important;
  }

  .grow-enter-active {
    transition: all .3s ease;
    height: 100px;
  }

  .grow-leave {
    height: 100px;
  }
  .grow-leave-active {
    transition: all .3s ease;
    height: 0;
  }
</style>
