require("./bootstrap");
import axios from "axios";

import Alpine from "alpinejs";
import Vue from "vue";

window.Alpine = Alpine;

Alpine.start();

window.Vue = require("vue").default;

const files = require.context("./components", true, /\.vue$/i);
files.keys().map((key) => Vue.component(key.split("/").pop().split(".")[0], files(key).default));

// TODO Ajouter Pinia pour la gestion de la quantité du Cart

import { createPinia, PiniaVuePlugin } from "pinia";

Vue.use(PiniaVuePlugin);
const pinia = createPinia();

// axios.get(`${process.env.MIX_API_ENDPOINT}/cart/quantity`).then(({ data }) => {
// 	window.$cartQuantity = data;
// });

const app = new Vue({
	el: "#app",
	pinia,
});

import { useStore } from "./stores/main";

let store = useStore();
store.initStore();
