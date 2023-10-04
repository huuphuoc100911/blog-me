<template>
    <ul class="pagination pagination-md justify-content-center">
        <li>
            <a class="page-link" :class="{ disabled: pagination.current_page <= 1 }" @click.prevent="changePage(1)"
                disabled><i class="fas fa-angle-double-left"></i></a>
        </li>
        <li>
            <a class="page-link" :class="{ disabled: pagination.current_page <= 1 }"
                @click.prevent="changePage(pagination.current_page - 1)"><i class="fas fa-angle-left"></i></a>
        </li>

        <li :class="{ dnone: pagination.current_page <= 1 }" v-if="pagination.current_page > this.offset">
            <a class="page-link" @click.prevent="changePage(pagination.current_page - 1)">...</a>
        </li>
        <li v-for="page in pages" :key="page" class="page-item" :class="isCurrentPage(page) ? 'active' : ''">
            <a class="page-link" @click.prevent="changePage(page)">
                {{ page }}
            </a>
        </li>
        <li :class="{ dnone: pagination.current_page >= pagination.last_page }" v-if="pagination.last_page > this.offset">
            <a class="page-link" @click.prevent="changePage(pagination.current_page + 1)">...</a>
        </li>
        <li>
            <a class="page-link" :class="{ disabled: pagination.current_page >= pagination.last_page }"
                @click.prevent="changePage(pagination.current_page + 1)"><i class="fas fa-angle-right"></i></a>
        </li>
        <li>
            <a class="page-link" :class="{ disabled: pagination.current_page >= pagination.last_page }"
                @click.prevent="changePage(pagination.last_page)"><i class="fas fa-angle-double-right"></i></a>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['pagination', 'offset'],
    methods: {
        isCurrentPage(page) {
            return this.pagination.current_page === page
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.$emit('paginate');
        }
    },
    computed: {
        pages() {
            let pages = []
            let from = this.pagination.current_page - Math.floor(this.offset / 2)
            if (from < 1) {
                from = 1
            }
            let to = from + this.offset - 1
            if (to > this.pagination.last_page) {
                to = this.pagination.last_page
            }
            while (from <= to) {
                pages.push(from)
                from++
            }
            return pages
        }
    }
}
</script>

<style scoped>
a.disabled {
    pointer-events: none;
    cursor: default;
}

.dnone {
    display: none;
}
</style>
