<template>
    <section id="menu">
        <!-- Actions -->
        <section>
            <ul class="actions vertical" v-if="!user">
                <li><h3>Login</h3></li>
                <AuthComponent :datasend="datasend" :changeToken="changeToken"/>

                <li><h3>Registration</h3></li>
                <li>
                    <RegisterComponent :datasend="datasend" :changeToken="changeToken"/>
                </li>
            </ul>
            <ul v-else>
                <li>Добавить пост</li>
                <li>Выход</li>
            </ul>
        </section>
    </section>
</template>
<script>
import AuthComponent from './AuthComponent.vue';
import RegisterComponent from './RegisterComponent.vue'

export default {
    name: 'MenuComponent',
    components: {
        RegisterComponent,
        AuthComponent,
    },
    props: ["datasend", "changeToken", "user"]
};
</script>
