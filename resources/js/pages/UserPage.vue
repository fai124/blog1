<template>
    <div id="main">
    <article class="post" v-for="value in posts" :key= "value">
        <header>
            <div class="title">
                <h2><a href="#" @click.prevent="changePage('SinglePage', value.id)">{{ value.name }}</a></h2>
                <p>{{ value.subtitle }}</p>
            </div>
            <div class="meta">
                <time class="published" datetime="2015-11-01"
                    >1 Ноября 2015</time
                >
                <a href="#" class="author"
                    ><span class="name">{{ value.user.username }}</span
                    ><img src="images/avatar.jpg" alt=""
                /></a>
            </div>
        </header>
        <a href="#" class="image featured"
            ><img :src="PUBLIC + value.photo" alt=""
        /></a>
        <p>
            {{ value.content }}
        </p>
        <footer>
            <ul class="actions">
                <li><a href="#" @click.prevent="changePage('SinglePage', value.id)" class="button big">Continue Reading</a></li>
            </ul>
            <ul class="stats">
                <li><a href="#" class="icon fa-heart">{{ value.likes_count }}</a></li>
                <li><a href="#" class="icon fa-comment">{{ value.comments_count }}</a></li>
            </ul>
        </footer>
    </article>
    </div>
</template>
<script>
export default {
    props: ['datasend', 'PUBLIC', 'pageId', 'changePage'],
    name: 'UserPage',
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        if (this.pageId) {
            this.getPost();
        }
    },
    methods: {
        getPost() {
            this.datasend('user/' + this.pageId).then((result) => {
                this.posts = result;
                console.log(result);
            });
        },
    },
};
</script>
