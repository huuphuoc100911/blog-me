<template>
    <the-header></the-header>
    <div class="layout-page">
        <the-navbar></the-navbar>
        <router-view />
    </div>
</template>
  
<script>
import TheHeader from './components/base/TheHeader.vue';
import TheNavbar from './components/base/TheNavbar.vue';
export default {
    components: {
        TheHeader,
        TheNavbar
    },
    name: 'App'
}
</script>