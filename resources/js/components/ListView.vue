<template>
    <div>
        <div v-for="(todo, key) in todos" :key="key">
            <list-todo
                :todo="todo"
                class="todo"
                v-on:todoChange="$emit('reloadTodos')"
            />
        </div>
    </div>
</template>

<script>
import ListTodo from "./ListTodo";
export default {
    props: ["todos"],
    components: {
        ListTodo
    }
};
</script>

<style scoped></style>
