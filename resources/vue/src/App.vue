<template>
    <the-header></the-header>
    <router-view />
    <the-footer></the-footer>
</template>
  
<script>
import TheFooter from './components/base/TheFooter.vue';
import TheHeader from './components/base/TheHeader.vue';
export default {
    components: {
        TheHeader,
        TheFooter
    },
    name: 'App'
}
</script>