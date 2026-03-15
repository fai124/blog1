<template>
    <section id="menu">
        <!-- Actions -->
        <section>
            <ul class="actions vertical">
                <li><h3>Login</h3></li>
                <li>
                    <form action="?" method="post">
                        <input
                            type="text"
                            name="neme"
                            placeholder="Username"
                        /><br />
                        <input
                            type="password"
                            name="neme"
                            placeholder="Password"
                        /><br />
                        <input
                            type="submit"
                            class="button big fit"
                            value="Log In"
                        />
                    </form>
                </li>

                <li><h3>Registration</h3></li>
                <li>
                    <RegisterComponent :datasend="datasend" :changeToken="changeToken"/>
                </li>
            </ul>
        </section>
    </section>
</template>
<script>
import RegisterComponent from './RegisterComponent.vue'

export default {
    name: 'MenuComponent',
    components: {
        RegisterComponent,
    },
    props: ["datasend", "changeToken"]
};
</script>
