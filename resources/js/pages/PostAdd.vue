<template>
    <div id="main">
        <!-- Post -->
        <article class="post">
            <h1>Add Post</h1>
            <input type="text" v-model="name" placeholder="Post name" /><br />
            <div class="alert alert-danger" v-if="errors.name">
                {{ errors.name.join('. ') }}
            </div>
            <input
                type="text"
                v-model="subtitle"
                placeholder="Subtitle"
            /><br />
            <div class="alert alert-danger" v-if="errors.subtitle">
                {{ errors.subtitle.join('. ') }}
            </div>
            <input type="text" v-model="anons" placeholder="Anons" /><br />
            <div class="alert alert-danger" v-if="errors.anons">
                {{ errors.anons.join('. ') }}
            </div>
            <textarea v-model="content" placeholder="Post content"></textarea
            ><br />
            <div class="alert alert-danger" v-if="errors.content">
                {{ errors.content.join('. ') }}
            </div>
            <input type="file" id="photo" /><br /><br />
            <div class="alert alert-danger" v-if="errors.photo">
                {{ errors.photo.join('. ') }}
            </div>
            <button type="submit" class="button big fit" @click="postadd">
                Add Post
            </button>
        </article>
    </div>
</template>
<script>
export default {
    name: 'PostAdd',
    props: ['datasend'],
    data() {
        return {
            name: null,
            subtitle: null,
            anons: null,
            content: null,
            errors:{},
        };
    },
    methods: {
        postadd() {
            let formdata = new FormData();
            if (this.name) formdata.append('name', this.name);
            if (this.subtitle) formdata.append('subtitle', this.subtitle);
            if (this.anons) formdata.append('anons', this.anons);
            if (this.content) formdata.append('content', this.content);
            let photo = document.querySelector('#photo');
            if (photo.files[0]) {
                formdata.append('photo', photo.files[0]);
            }

            this.datasend('postadd', 'POST', formdata).then((result) => {
                console.log(result);
                if (result.errors) {
                    this.errors = result.errors;
                }
                //if(result.token) {
                //this.changeToken(result.token);
                //}
            });
            // .catch((error) => console.error(error));
        },
    },
};
</script>
