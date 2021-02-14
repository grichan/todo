<template>
    <div>
        <!-- nav  -->
        <Navigation :user="user" @setUserDetails="setUserDetails" />
        <router-view
            :user="user"
            @setUserDetails="setUserDetails"
        ></router-view>
    </div>
</template>

<script>
import Navigation from "./components/Navigation.vue";
export default {
    components: { Navigation },
    data: function() {
        return {
            user: {
                name: "",
                email: "",
                id: ""
            }
        };
    },
    methods: {
        setUserDetails(data) {
            this.user.name = data.name;
            this.user.email = data.email;
            this.user.id = data.id;
        }
    },
    created() {
        if (localStorage.getItem("user")) {
            this.user = JSON.parse(localStorage.getItem("user"));
        }
    }
};
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
