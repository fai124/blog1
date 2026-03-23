<template>
    <header id="header">
        <h1><a href="#" @click="changePage('HomePage')">Blog</a></h1>
        <nav class="main">
            <ul>
                <li class="menu" v-if="userInfo.avatar">
                    <a class="fa-user" href="#menu">Menu</a>
                </li>
                <li class="menu user" v-else="userInfo.avatar">
                    <a href="#menu"
                        ><img :src="PUBLIC + userInfo.avatar" alt=""
                    /></a>
                </li>
            </ul>
        </nav>
    </header>
</template>
<script>
export default {
    name: 'HeaderComponent',
    props: ['userInfo', 'PUBLIC', "changePage"],
};
</script>
