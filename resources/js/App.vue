<template>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <HeaderComponent />

        <!-- Menu -->
        <MenuComponent />

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
    </div>
    <FooterComponent />
</template>

<script>
import MenuComponent from './components/MenuComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
import PostComponent from './components/PostComponent.vue';
import SideBarComponent from './components/SideBarComponent.vue';

export default {
    name: 'App',
    components: {
        MenuComponent,
        HeaderComponent,
        FooterComponent,
        PostComponent,
        SideBarComponent,
    },
};
</script>
