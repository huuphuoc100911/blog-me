<template>
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Our Projects</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Projects</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100" src="/assets/vue/img/hero-1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="/assets/vue/img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Danh mục hình ảnh</p>
                <h1 class="display-6 mb-0">{{ categoryInfo.data ? categoryInfo.data.title : null }}</h1>
            </div>
            <div class="row g-3" data-wow-delay="0.5s">
                <div class="col-4" v-for="(media, index) in listMediaCategory.data" :key="index">
                    <div class="project-item">
                        <img class="img-fluid" :src="media.url_image" alt="" style="width: 100%; height: 500px">
                        <a class="project-title h5 mb-0" :href="media.url_image" data-lightbox="project">
                            {{ media.title }}
                        </a>
                        <p class="project-category h5 mb-0" data-lightbox="project">
                            {{ media.category.title }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->
</template>
<script>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from 'vuex'
export default {
    name: "Home",
    setup() {
        const store = useStore();
        const route = useRoute();
        store.dispatch('media/getListMediaCategoryAction', route.params.categoryId);
        store.dispatch('category/getCategoryInfoAction', route.params.categoryId);
        const listMediaCategory = computed(() => store.state.media.listMediaCategory);
        const categoryInfo = computed(() => store.state.category.categoryInfo);

        return {
            listMediaCategory,
            categoryInfo
        }
    }
}
</script>

<style scoped>
.project-item .project-category {
    position: absolute;
    top: auto;
    right: 1rem;
    bottom: 0rem;
    left: 1rem;
    padding: 0.2rem;
    text-align: center;
    background: #ffc107;
    color: #003687;
    transition: .5s;
}
</style>