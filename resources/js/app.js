require("./bootstrap");
import axios from "axios";

import Alpine from "alpinejs";
import Vue from "vue";

window.Alpine = Alpine;

Alpine.start();

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./components", true, /\.vue$/i);
files.keys().map((key) => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

// Vue.component("example-component", require("./components/CartButton.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: "#app",
});

// TODO Ajouter Pinia pour la gestion de la quantité du Cart

// axios.get(`${process.env.MIX_API_ENDPOINT}/cart/quantity`).then(({ data }) => {
// 	window.$cartQuantity = data;
// });
