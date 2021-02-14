<template>
    <div class="todoListContainer">
        <div class="heading">
            <h1 id="title">Todo list</h1>
            <add-todo-form :user="user" v-on:reloadTodos="getList()" />
        </div>
        <ListView :todos="todos" v-on:reloadTodos="getList()" />
        <span>
            {{ this.user.id ? "" : "Please login to view todos." }}
        </span>
    </div>
</template>

<script>
import AddTodoForm from "../components/AddTodoForm";
import ListView from "../components/ListView";
import LoginForm from "../components/LoginForm";

export default {
    components: {
        AddTodoForm,
        ListView,
        LoginForm
    },
    props: ["user"],
    data: function() {
        return {
            todos: []
        };
    },
    methods: {
        getList() {
            axios
                .post("api/user/todos", { user: this.user })
                .then(response => {
                    console.log("response :>> ", response);
                    this.todos = response.data;
                })
                .catch(error => {
                    console.log("error :>> ", error);
                });
        }
    },
    created() {
        this.getList();
    }
};
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

#title {
    text-align: center;
}

span {
    display: flex;
    justify-content: center;
    padding: 1rem;
    color: red;
    font-weight: 600;
}
</style>
