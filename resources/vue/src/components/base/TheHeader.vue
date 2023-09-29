<template>
    <!-- Navbar Start -->
    <nav style="display: flex;" class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5"
        data-wow-delay="0.1s">
        <router-link to="/vue" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Photozone</h1>
        </router-link>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <router-link to="/vue" class="nav-item nav-link active">Home</router-link>
                <router-link to="/vue/about" class="nav-item nav-link">About</router-link>
            </div>
            <router-link to="/vue" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">Photozone</h1>
            </router-link>
            <div class="navbar-nav me-auto py-0">
                <router-link to="/vue/portfolio" class="nav-item nav-link">Projects</router-link>
                <router-link to="/vue/contact" class="nav-item nav-link">Contact</router-link>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
</template>

<script>
export default {

}
</script>

<style></style>