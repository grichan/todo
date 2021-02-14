<template>
    <div>
        <form action="#" @submit.prevent="handleLogin">
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
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import router from "../router";

export default {
    data() {
        return {
            formData: {
                email: "",
                password: ""
            }
        };
    },
    methods: {
        handleLogin() {
            // send login request
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios.post("/login", this.formData).then(response => {
                    if (response.data.status_code == 200) {
                        let userData = response.data.user;
                        this.$emit("loginUser", userData);
                        localStorage.setItem(
                            "user",
                            JSON.stringify(response.data.user)
                        );
                        router.push("/");
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
