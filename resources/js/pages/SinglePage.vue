<template>
    <!-- Main -->
    <div id="main">
        <!-- Post -->

        <article class="post" v-if="post">
            <header>
                <div class="title">
                    <h2>
                        <a href="#">{{ post.name }}</a>
                    </h2>
                    <p>{{ post.subtitle }}</p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01"
                        >1 ноября 2015</time
                    >
                    <a href="#" class="author"
                        ><span class="name">{{ post.user.username }}</span
                        ><img :src="PUBLIC + post.user.avatar" alt=""
                    /></a>
                </div>
            </header>
            <span class="image featured"
                ><img :src="PUBLIC + post.photo" alt=""
            /></span>
            <p></p>
            <p>
                {{ post.content }}
            </p>
            <footer>
                <ul class="stats">
                    <li><a href="#">Edit</a></li>
                    <li><a href="#" class="red">Delete</a></li>
                    <li><a href="#" class="red">Blocked</a></li>
                    <li><a href="#" class="icon fa-heart heart">28</a></li>
                    <li><a href="#" class="icon fa-comment">128</a></li>
                </ul>
            </footer>
        </article>

        <!-- Comments -->
        <div class="post">
            <section class="comments">
                <h3>Comments</h3>
                <div>
                    <textarea v-model="comment"></textarea><br />
                    <div class="alert alert-danger" v-if="errors.comment">
                        {{ errors.comment.join('. ') }}
                    </div>
                    <button type="button" class="button big fit" @click="addComment">
                        Add Comment
                    </button>
                </div>
            </section>
            {{ post.comments }}
            <article class="comment">
                <div class="comment-autor">
                    <a href="#"><img src="images/avatar.jpg" /></a>
                    <a href="#">User</a>
                </div>
                <p>
                    Mauris neque quam, fermentum ut nisl vitae, convallis
                    maximus nisl. Sed mattis nunc id lorem euismod placerat.
                </p>
            </article>
        </div>
    </div>
</template>
<script>
export default {
    name: 'SinglePage',
    props: ['datasend', 'PUBLIC', 'pageId'],
    data() {
        return {
            post: null,
            comment: null,
            errors: {},
        };
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost() {
            this.datasend('post/' + this.pageId).then((result) => {
                this.post = result;
                console.log(result);
            });
        },
        addComment() {
            let formdata = new FormData();
            if (this.comment) formdata.append('comment', this.comment);
            this.datasend('comment/' + this.pageId, 'POST', formdata).then(
                (result) => {
                    if (result.errors) {
                        this.errors = result.errors;
                    } else {
                        this.getPost();
                    }
                },
            );
        },
    },
};
</script>
