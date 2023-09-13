<template>
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a href="#">
                            <img src="/assets/user/img/logo.png" alt="">
                        </a>
                    </div>
                    <nav class="nav-menu mobile-menu">
                        <ul>
                            <li class="{{ \Request::segment(1) === null ? 'active' : '' }}">
                                <router-link :to="{ name: 'home' }">Home</router-link>
                            </li>
                            <li class="{{ \Request::segment(1) === 'about' ? 'active' : '' }}">
                                <router-link :to="{ name: 'about' }">About</router-link>
                            </li>
                            <li class="{{ \Request::segment(1) === 'service' ? 'active' : '' }}"><a
                                    href="{{ route('service') }}">Services</a></li>
                            <li class="{{ \Request::segment(1) === 'pricing' ? 'active' : '' }}"><a
                                    href="{{ route('pricing') }}">Pricing</a></li>
                            <li class="{{ \Request::segment(1) === 'portfolio' ? 'active' : '' }}">
                                <router-link :to="{ name: 'portfolio' }">Portfolio</router-link>
                            </li>
                            <li class="{{ \Request::segment(1) === 'blog' ? 'active' : '' }}">
                                <router-link :to="{ name: 'blog' }">Blog</router-link>
                            </li>
                            <li class="{{ \Request::segment(1) === 'contact' ? 'active' : '' }}">
                                <router-link :to="{ name: 'contact' }">Contact</router-link>
                            </li>
                        </ul>
                    </nav>
                    <div class="top-search search-switch">
                        <i class="fa fa-search"></i>
                    </div>
                    <div id="mobile-menu-wrap"></div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {

}
</script>

<style></style>