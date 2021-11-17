import { defineStore } from "pinia";
import axios from "axios";

export const useStore = defineStore("main", {
	state: () => ({
		cartCount: 0,
	}),
	actions: {
		initStore() {
			axios.get(`${process.env.MIX_API_ENDPOINT}/cart/quantity`).then(({ data }) => {
				this.cartCount = data;
			});
		},
		addItem() {
			this.cartCount++;
		},
		removeItem() {
			this.cartCount--;
		},
	},
});
