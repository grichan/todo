<template>
    <div class="addTodo">
        <input type="text" v-model="todo.body" name="" id="" />
        <button @click="addTodo">+</button>
    </div>
</template>

<script>
export default {
    props: ["user"],
    data: function() {
        return {
            todo: {
                body: ""
            }
        };
    },
    methods: {
        addTodo() {
            if (this.todo.body == "") {
                return;
            }

            axios
                .post("api/todo/store", {
                    todo: {
                        body: this.todo.body,
                        user_id: this.user.id
                    }
                })
                .then(response => {
                    if (response.status == 201) {
                        this.todo.body = "";
                        this.$emit("reloadTodos");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style scoped>
.addTodo {
    display: flex;
}
input {
    margin: 0 0.2rem;
    flex: 2;
}
</style>
