<template>
    <div class="todo">
        <input
            type="checkbox"
            name=""
            id=""
            @change="updateCheck()"
            v-model="todo.completed"
        />
        <input
            class="todoBody"
            v-bind:class="{ completed: todo.completed }"
            v-model="todo.body"
            @change="updateCheck()"
        />
        <button @click="removeTodo" class="delete">x</button>
    </div>
</template>

<script>
export default {
    props: ["todo"],
    data: function() {
        return {
            editing: true
        };
    },
    methods: {
        updateCheck() {
            axios
                .put("api/todo/" + this.todo.id, {
                    todo: this.todo
                })
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("todoChange");
                    }
                })
                .catch(error => {
                    console.log("error");
                });
        },
        removeTodo() {
            axios
                .delete("api/todo/" + this.todo.id)
                .then(response => {
                    if (response.status == 200) {
                        this.$emit("todoChange");
                    }
                })
                .catch(error => {
                    console.log("error :>> ", error);
                });
        }
    }
};
</script>
<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}

.todo {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
}
.todoBody {
    width: 100%;
    min-block-size: 30px;
    margin-left: 0.1rem;
    cursor: pointer;
    border: none;
}

.delete {
    background-color: rgba(255, 0, 0, 0.651);
    margin-left: 0.4rem;
}
</style>
