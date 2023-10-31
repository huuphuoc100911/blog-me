<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Media</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-8">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Media</h5>
                        <small class="text-muted float-end">Create</small>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="createMedia" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Title</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-layer"></i></span>
                                    <input type="text" class="form-control" v-model="media.title" placeholder="Title" />
                                </div>
                                <p class="text-danger" v-if="errors && errors.title">{{
                                    errors.title[0] }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Category</label>
                                <div class="input-group input-group-merge">
                                    <select class="form-select" v-model="media.category_id">
                                        <option value="">Chọn danh mục</option>
                                        <option v-for="(category, index) in listCategory.data" :key="index"
                                            :value="category.id">
                                            {{ category.title }}
                                        </option>
                                    </select>
                                </div>
                                <p class="text-danger" v-if="errors && errors.category">{{
                                    errors.category[0] }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">PHOTO</label>
                                <input class="form-control" type="file" @change="chooseImage" />
                                <p class="text-danger" v-if="errors && errors.url_image">{{
                                    errors.url_image[0] }}</p>
                                <div class="col-md-3" v-if="media.image_preview">
                                    <img :src="media.image_preview" class="img-responsive" height="70" width="90">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">DESCRIPTION</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i
                                            class="bx bx-comment"></i></span>
                                    <textarea id="basic-icon-default-message" class="form-control" placeholder="Description"
                                        v-model="media.description"></textarea>
                                </div>
                                <p class="text-danger" v-if="errors && errors.description">{{
                                    errors.description[0] }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">STATUS</label>
                                <select class="form-select" v-model="media.is_active">
                                    <option value="2" :selected="media.is_active == 2">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                                <p class="text-danger" v-if="errors && errors.is_active">{{
                                    errors.is_active[0] }}</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, reactive } from 'vue';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';
export default {
    name: 'CreateMedia',
    setup() {
        const store = useStore();
        const router = useRouter();
        const media = reactive({
            title: "",
            category_id: "",
            description: "",
            url_image: "",
            is_active: 2,
            image_preview: ''
        });

        const errors = computed(() => store.state.media.errors);

        function chooseImage(e) {
            console.log('-------');
            console.log(e.target);
            console.log('-------');
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            createImage(files[0]);
            media.url_image = e.target.files[0];
        }

        function createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                media.image_preview = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        function createMedia() {
            let data = new FormData();
            console.log(media.url_image);

            data.append('url_image', media.url_image);
            data.append('title', media.title);
            data.append('category_id', media.category_id);
            data.append('description', media.description);
            data.append('is_active', media.is_active);

            store.dispatch('media/updateOrCreateMediaAction', { data, router });
        }

        store.dispatch('category/getListCategoryAction');
        const listCategory = computed(() => store.state.category.listCategory);

        return {
            media,
            errors,
            listCategory,
            chooseImage,
            createMedia,
        }
    }
}
</script>

<style></style>