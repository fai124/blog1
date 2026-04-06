<template>
    <!-- Main -->
    <div id="main">
        <!-- Post -->
        <PostComponent />

        <!-- Pagination -->
        <ul class="actions pagination">
            <li>
                <a href="" class="disabled button big previous"
                    >Previous Page</a
                >
            </li>
            <li><a href="#" class="button big next">Next Page</a></li>
        </ul>
    </div>

    <!-- Sidebar -->
    <SideBarComponent />
</template>
<script>
import PostComponent from '../components/PostComponent.vue';
import SideBarComponent from '../components/SideBarComponent.vue';

export default {
    name: 'HomePage',
    props: ['datasend', 'PUBLIC', 'pageId', 'changePage'],
    components: {
        PostComponent,
        SideBarComponent,
    },
    data() {
        return {
            posts: {},
        };
    },
    mounted() {
            this.getPost();
    },
    methods: {
        getPost() {
            this.datasend('posts').then((result) => {
                this.posts = result;
                console.log(result);
            });
        },
    },
};
</script>
