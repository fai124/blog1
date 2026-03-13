<template>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <HeaderComponent />

        <!-- Menu -->
        <MenuComponent :datasend="datasend"/>
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
            API: 'http://127.0.0.1:8000/',
        };
    },
    components: {
        MenuComponent,
        HeaderComponent,
        FooterComponent,
        HomePage,
    },
    methods: {
        async datasend(route, method = 'GET', formdata = null) {
            let myHeaders = new Headers();
            myHeaders.append('Accept', 'application/json');
            if (localStorage.getItem('token')) {
                myHeaders.append(
                    'Autorization',
                    'Bearer ' + localStorage.getItem('token'),
                );
            }

            //let formdata = new FormData();
            //formdata.append('email', 'asd@student.com');

            let requestOptions = {
                method: 'method',
                headers: myHeaders,
                redirect: 'follow',
            };

            if (method != 'GET') {
                requestOptions.body = formdata;
            }

            return await fetch(api + route, requestOptions)
                .then((response) => response.json())
        },
        changeToken(token){
            localStorage.setItem("token", token);
            this.user = true;
            this.getUser();
        },
    },
};
//.then((result) => console.log(result))
//.catch((error) => console.error(error));
</script>
