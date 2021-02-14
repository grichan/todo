<template>
    <div>
        <h1>Register.</h1>
        <div class="login-box">
            <RegistrationForm />
        </div>
    </div>
</template>

<script>
import RegistrationForm from "../components/RegistrationForm";
export default {
    components: {
        RegistrationForm
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
