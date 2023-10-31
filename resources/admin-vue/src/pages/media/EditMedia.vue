<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Media</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-8">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Media</h5>
                        <small class="text-muted float-end">Edit</small>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateMedia(mediaUpdate)" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Title</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-layer"></i></span>
                                    <input type="text" class="form-control" v-model="mediaUpdate.title"
                                        placeholder="Title" />
                                </div>
                                <p class="text-danger" v-if="errors && errors.title">{{
                                    errors.title[0] }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Category</label>
                                <div class="input-group input-group-merge">
                                    <select class="form-select" v-model="mediaUpdate.category_id">
                                        <option v-for="(category, index) in listCategory.data" :key="index"
                                            :value="category.id" :selected="category.id == mediaUpdate.category_id">
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
                                <div class="col-md-3 mt-3">
                                    <img v-if="image.image_preview" :src="image.image_preview" class="img-responsive"
                                        height="200" width="200">
                                    <img v-else :src="mediaUpdate.url_image" class="img-responsive" height="200"
                                        width="200">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">DESCRIPTION</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-message2" class="input-group-text"><i
                                            class="bx bx-comment"></i></span>
                                    <textarea id="basic-icon-default-message" class="form-control" placeholder="Description"
                                        v-model="mediaUpdate.description"></textarea>
                                </div>
                                <p class="text-danger" v-if="errors && errors.description">{{
                                    errors.description[0] }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">STATUS</label>
                                <select class="form-select" v-model="mediaUpdate.is_active">
                                    <option value="2" :selected="mediaUpdate.is_active == 2">Active</option>
                                    <option value="1" :selected="mediaUpdate.is_active == 1">Inactive</option>
                                </select>
                                <p class="text-danger" v-if="errors && errors.is_active">{{
                                    errors.is_active[0] }}</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger mx-3" @click="deleteMedia(mediaUpdate.id)">Delete</button>
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
import { useRoute, useRouter } from 'vue-router';

export default {
    setup() {
        const store = useStore();
        const router = useRouter();
        const route = useRoute();

        const image = reactive({
            image_preview: '',
            url_image: ''
        })

        store.dispatch('category/getListCategoryAction');
        const listCategory = computed(() => store.state.category.listCategory);

        store.dispatch('media/getMediaAction', route.params.id);
        const mediaUpdate = computed(() => store.state.media.mediaUpdate);

        const errors = computed(() => store.state.media.errors);

        function chooseImage(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;

            createImage(files[0]);
            image.url_image = e.target.files[0];
        }

        function createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                image.image_preview = e.target.result;
            };

            reader.readAsDataURL(file);
        }

        function updateMedia(mediaUpdateData) {
            let data = new FormData();

            data.append('url_image', image.url_image);
            data.append('title', mediaUpdateData.title);
            data.append('category_id', mediaUpdateData.category_id);
            data.append('description', mediaUpdateData.description);
            data.append('is_active', mediaUpdateData.is_active);
            data.append('method', 'PUT');
            data.append('media_id', route.params.id);

            store.dispatch('media/updateOrCreateMediaAction', { data, router });
        }

        function deleteMedia(mediaId) {
            confirm('Bạn có chắc chắn muốn xóa media không?')
            store.dispatch('media/deleteMediaAction', { mediaId, router });
        }

        return {
            image,
            errors,
            listCategory,
            mediaUpdate,
            deleteMedia,
            chooseImage,
            updateMedia,
        }
    }
}
</script>

<style></style>