<template>
    <the-header></the-header>
    <div class="layout-page">
        <the-navbar></the-navbar>
        <div class="content-wrapper">
            <router-view />
            <the-footer></the-footer>
            <div class="content-backdrop fade"></div>
        </div>
    </div>
</template>
  
<script>
import TheFooter from './TheFooter.vue';
import TheHeader from './TheHeader.vue';
import TheNavbar from './TheNavbar.vue';

export default {
    components: {
        TheHeader,
        TheNavbar,
        TheFooter
    },
};
</script>
  