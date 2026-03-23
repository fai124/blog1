<template>
    <div id="main">
        <!-- Post -->
        <article class="post">
            <h1>Add Post</h1>
            <input type="text" v-model="name" placeholder="Post name" /><br />
            <input type="text" v-model="subtitle" placeholder="Subtitle" /><br />
            <input type="text" v-model="anons" placeholder="Anons" /><br />
            <textarea v-model="content" placeholder="Post content"></textarea
            ><br />
            <input type="file" id="photo" /><br /><br />
            <input type="submit" class="button big fit" value="Add Post" />
        </article>
    </div>
</template>
<script>
export default {
    name: 'PostAdd',
    data() {
        return {
            name: null,
            subtitle: null,
            anons: null,
            content: null,
        }
    },
};
</script>
