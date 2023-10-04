<template>
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Về chúng tôi</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><router-link to="/vue" active-class="active">Trang chủ</router-link>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
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


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid bg-light p-3" src="/assets/vue/img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="/assets/vue/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">Thông tin của chúng tôi</p>
                        <h1 class="display-6 mb-4">{{ infoCompany.name }}</h1>
                        <p>{{ infoCompany.description }} </p>
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
import { computed } from 'vue';
import { useStore } from 'vuex'
export default {
    name: "About",
    setup() {
        const store = useStore();
        store.dispatch("amount/getAmountUserAction");
        store.dispatch("amount/getAmountMediaAction");
        store.dispatch("amount/getAmountBlogAction");
        store.dispatch("staff/getListStaffAction");
        store.dispatch("infoCompany/getInfoCompanyAction");
        const amountUser = computed(() => store.state.amount.amountUser);
        const amountMedia = computed(() => store.state.amount.amountMedia);
        const amountBlog = computed(() => store.state.amount.amountBlog);
        const listStaff = computed(() => store.state.staff.listStaff);
        const infoCompany = computed(() => store.state.infoCompany.infoCompany);

        return {
            amountUser,
            amountMedia,
            amountBlog,
            listStaff,
            infoCompany
        }
    }
}
</script>

<style scoped></style>