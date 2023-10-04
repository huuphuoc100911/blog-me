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
                <p class="text-primary text-uppercase mb-2">Hình ảnh của chúng tôi</p>
                <h1 class="display-6 mb-0">Khám phá buổi chụp ảnh độc đáo và sáng tạo của chúng tôi</h1>
            </div>
            <div class="row g-3" data-wow-delay="0.5s">
                <div class="col-4" v-for="(media, index) in listMedia.data" :key="index">
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
            <div class="intro-y mt-5 col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
                <PaginationComponent v-if="listMedia.meta && listMedia.meta.last_page > 1" :pagination="listMedia.meta"
                    :offset="3" @paginate="getMedia(listMedia.meta)" />
            </div>
        </div>
    </div>
    <!-- Project End -->
</template>
<script>
import { computed, reactive } from 'vue';
import { useStore } from 'vuex';
import PaginationComponent from './PaginationComponent.vue';
export default {
    name: "Home",
    components: {
        PaginationComponent
    },
    setup() {
        const sort = reactive({
            page: 1
        });
        const store = useStore();
        store.dispatch("media/getListMediaAction", sort);
        const listMedia = computed(() => store.state.media.listMedia);

        function getMedia(pagination) {
            store.dispatch("media/getListMediaAction", { page: pagination.current_page || 1 });
        }

        return {
            listMedia,
            getMedia
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