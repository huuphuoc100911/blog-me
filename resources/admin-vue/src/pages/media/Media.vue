<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex cat-header row">
            <div class="col-10">
                <h4 class="fw-bold py-3 mb-1">Hình ảnh</h4>
            </div>
            <div class="col">
                <router-link :to="{ name: 'media-create' }" class="btn btn-info">Create</router-link>
            </div>
        </div>

        <!-- Examples -->
        <div class="row mb-5" id="sortable">
            <div class="col-md-6 col-lg-4 mb-5 media-item" v-for="(media, index) in listMedia.data" :key="index">
                <div class="card h-100">
                    <img class="card-cat-img" :src="media.url_image" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">{{ media.title }}</h5>
                        <p class="card-text">
                            {{ media.description }}
                        </p>
                        <router-link :to="{ name: 'media-edit', params: { id: media.id } }" :media="media">
                            <div class="btn btn-outline-primary">Xem chi tiết</div>
                        </router-link>
                    </div>
                </div>
            </div>
            <PaginationComponent v-if="listMedia.meta && listMedia.meta.last_page > 1" :pagination="listMedia.meta"
                :offset="3" @paginate="getMedia(listMedia.meta)" />
        </div>
    </div>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex'
import { useRouter } from 'vue-router';
import PaginationComponent from '../PaginationComponent.vue';
export default {
    name: 'CreateMedia',
    components: {
        PaginationComponent
    },
    setup() {
        const store = useStore();
        store.dispatch('media/getListMediaAction', { page: 1 });
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

<style></style>