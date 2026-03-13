<template>
    <input
        type="text"
        name="neme"
        placeholder="Username"
        v-model="username"
    /><br />
    <input
        type="password"
        name="neme"
        placeholder="Password"
        v-model="password"
    /><br />
    <input type="file" name="file" /><br /><br />
    <button type="button" class="button big fit">Зарегистрироваться</button>
</template>
<script>
import { register } from '@/routes';
import password from '@/routes/password';

export default {
    data() {
        return {
            username: null,
            password: null,
        };
    },
    name: 'RegisterComponent',
    methods: {
        register() {

            let formdata = new FormData();
            if(this.username) formdata.append('username', this.username);
            if(this.fullname) formdata.append('fullname', this.fullname);
            if(this.password) formdata.append('password', this.password);
            let avatar = document.querySelector("#avatar");
            if(avatar.files[0]) {
                formdata.append('avatar', avatar.files[0]);
            }

            this.datasend("register", "POST", formdata)
                .then((result) => console.log(result))
                .catch((error) => console.error(error));
        },
    },
    props: ['datasend'],
};
</script>
