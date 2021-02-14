<template>
    <div>
        <h1>Login to view your Todos</h1>
        <div class="login-box">
            <LoginForm @loginUser="loginUser" />
        </div>
    </div>
</template>

<script>
import LoginForm from "../components/LoginForm";
export default {
    components: {
        LoginForm
    },
    methods: {
        loginUser(userData) {
            this.$emit("setUserDetails", userData);
        }
    }
};
</script>

<style scoped>
.login-box {
    max-width: 300px;
    margin: 3em auto;
}

h1 {
    text-align: center;
}
</style>
