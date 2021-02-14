<template>
    <nav>
        <router-link to="/">Home</router-link>
        <div>
            <div v-if="!this.user.id">
                <router-link to="/login">Login</router-link>
                <router-link to="/register">Register</router-link>
            </div>
            <a v-else @click="logout()">Logout</a>
        </div>
    </nav>
</template>

<script>
import router from "../router";
export default {
    props: ["user"],
    methods: {
        logout() {
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios.post("/logout", this.user).then(response => {
                    localStorage.removeItem("user");
                    this.$emit("setUserDetails", {
                        name: "",
                        id: "",
                        email: ""
                    });
                    router.push("/login");
                });
            });
        }
    }
};
</script>

<style scoped>
nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    background-color: rgb(0, 0, 223);
    padding: 1rem 25rem;
    font-weight: 600;
}
a {
    color: #fff;
    margin: 0 0.4rem;
    text-decoration: underline;
    cursor: pointer;
}
</style>
