<template>
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">Chào mừng đến với Photozone</p>
                    <h1 class="display-4 mb-3 animated slideInDown">{{ infoCompany.name }}</h1>
                    <p class="animated slideInDown">{{ infoCompany.description }}</p>
                    <div class="d-flex align-items-center pt-4 animated slideInDown">
                        <router-link to="/vue/about" active-class="active" class="btn btn-primary py-3 px-4 me-5">Đọc
                            thêm</router-link>
                    </div>
                </div>
                <div class="col-lg-7 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-12 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" :src="infoCompany.url_image" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="assets/vue/img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="assets/vue/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">Thông tin của chúng tôi</p>
                        <h1 class="display-6 mb-4">{{ infoCompany.name }}</h1>
                        <p>{{ infoCompany.description }} </p>
                        <router-link to="/vue/about" active-class="active" class="btn btn-primary py-3 px-5" href="">Đọc
                            thêm</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Tại sao lại chọn chúng tôi?</p>
                <h1 class="display-6 mb-5">Công ty chúng tôi đã đạt được</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">{{ amountUser.data }}</h1>
                        <h4 class="mb-3">Người dùng</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">{{ amountMedia.data }}</h1>
                        <h4 class="mb-3">Hình ảnh</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">{{ amountBlog.data }}</h1>
                        <h4 class="mb-3">Blogs</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Service Start -->
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Dịch vụ của chúng tôi</p>
                <h1 class="display-6 mb-4">Chúng tôi sẽ đăng các hình ảnh với nhiều danh mục</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                    v-for="(category, index) in listCategory.data" :key="index">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" :src="category.url_image" alt="" style="height: 340px;">
                            <div class="service-overlay">
                                <router-link :to="{ name: 'portfolioCategory', params: { categoryId: category.id } }" class="btn btn-lg-square
                                    btn-outline-light rounded-circle" :href="category.url_image"><i
                                        class="fa fa-link text-primary"></i></router-link>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>{{ category.title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Hình ảnh của chúng tôi</p>
                <h1 class="display-6 mb-0">Những hình ảnh được đăng bởi những người dùng của chúng tôi.</h1>
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

    <!-- Team Start -->
    <div class="container-xxl px-0 py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Thành viên của Team</p>
            <h1 class="display-6 mb-0">Quản lý và đăng tải hình ảnh, blogs.</h1>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" v-for="(staff, index) in listStaff.data" :key="index">
                <div class="row g-0 flex-sm-row" v-if="index % 4 == 0 || index % 4 == 1">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" :src="staff.infoStaff ? staff.image_url : 'assets/vue/img/team-2.jpg'"
                                alt="" style="height: 400px; width: 330px">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>{{ staff.name }}</h4>
                                <span>Nhân viên</span>
                            </div>
                            <p>
                                {{ staff.infoStaff ?
                                    staff.infoStaff.description.substring(0, 100) + '...' : 'Chưa cập nhật mô tả' }}
                            </p>
                            <div class="d-flex">
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0 flex-lg-row-reverse" v-else>
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" :src="staff.infoStaff ? staff.image_url : 'assets/vue/img/team-2.jpg'"
                                alt="" style="height: 400px; width: 330px">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>{{ staff.name }}</h4>
                                <span>Nhân viên</span>
                            </div>
                            <p>{{ staff.infoStaff ?
                                staff.infoStaff.description.substring(0, 100) + '...' : 'Chưa cập nhật mô tả' }}
                            </p>
                            <div class="d-flex">
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
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
        store.dispatch("category/getListCategoryAction");
        store.dispatch("staff/getListStaffAction");
        store.dispatch("infoCompany/getInfoCompanyAction");
        store.dispatch("amount/getAmountUserAction");
        store.dispatch("amount/getAmountMediaAction");
        store.dispatch("amount/getAmountBlogAction");
        const listMedia = computed(() => store.state.media.listMedia);
        const listCategory = computed(() => store.state.category.listCategory);
        const listStaff = computed(() => store.state.staff.listStaff);
        const infoCompany = computed(() => store.state.infoCompany.infoCompany);
        const amountUser = computed(() => store.state.amount.amountUser);
        const amountMedia = computed(() => store.state.amount.amountMedia);
        const amountBlog = computed(() => store.state.amount.amountBlog);

        function getMedia(pagination) {
            store.dispatch("media/getListMediaAction", { page: pagination.current_page || 1 });
        }

        return {
            listMedia,
            listCategory,
            listStaff,
            infoCompany,
            amountUser,
            amountMedia,
            amountBlog,
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