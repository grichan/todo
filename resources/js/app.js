require("./bootstrap");

import Components from "laravel-mix/src/components/Components";
import Vue from "vue";
import router from "./router/index";
import App from "./App";

const app = new Vue({
    router,
    el: "#app",
    components: { App }
});
