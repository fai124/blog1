<template>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <HeaderComponent />

        <!-- Menu -->
        <MenuComponent />
        <HomePage v-if="page == 'HomePage'" />
    </div>
    <FooterComponent />
</template>

<script>
import MenuComponent from './components/MenuComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
import HomePage from './pages/HomePage.vue';

export default {
    name: 'App',
    data() {
        return {
            page: 'HomePage',
        };
    },
    components: {
        MenuComponent,
        HeaderComponent,
        FooterComponent,
        HomePage,
    },
};
</script>
