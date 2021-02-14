<template>
    <div>
        <form action="#" @submit.prevent="handleLogin">
            <input
                required
                v-model="formData.name"
                type="text"
                placeholder="Name"
            />
            <input
                required
                v-model="formData.email"
                type="email"
                placeholder="Email"
            />
            <input
                required
                v-model="formData.password"
                type="password"
                placeholder="Password"
            />
            <input
                required
                v-model="formData.password_confirmation"
                type="password"
                placeholder="Re-enter Password"
            />
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import router from "../router";

export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        handleLogin() {
            // with sanctum for csrf we need to send initial request first
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios.post("/register", this.formData).then(response => {
                    if (response.data.status_code == 200) {
                        router.push("/login");
                    }
                });
            });
        }
    }
};
</script>

<style scoped>
form {
    margin: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

form input {
    margin: 1vh 2vh;
    padding: 1vh;
}

form button {
    max-width: 30vh;
    padding: 1vh;
}
</style>
