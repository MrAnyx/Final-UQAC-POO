<template>
	<div class="container">
		<button v-show="!displayInCart" :disabled="isLoading" class="fluid ui button teal" :class="{ loading: isLoading }" @click="addItem">
			Add to cart <i class="cart arrow down icon" style="margin-left: 5px"></i>
		</button>
		<button v-show="displayInCart" :disabled="isLoading" class="fluid ui button negative" :class="{ loading: isLoading }" @click="removeItem">
			Remove from cart <i class="trash alternate icon" style="margin-left: 5px"></i>
		</button>
	</div>
</template>

<script>
import axios from "axios";
import { useStore } from "../stores/main";

export default {
	props: {
		inCart: {
			type: Boolean,
			default: false,
			required: false,
		},
		itemId: {
			type: Number,
			required: true,
		},
	},
	data() {
		return {
			isLoading: false,
			displayInCart: true,
			store: null,
		};
	},
	mounted() {
		this.displayInCart = this.inCart;
		this.store = useStore();
	},
	methods: {
		updateCart(type) {
			this.isLoading = true;
			axios
				.patch(`${process.env.MIX_API_ENDPOINT}/cart/${this.itemId}`, {
					type,
				})
				.then((data) => {
					this.isLoading = false;
					let json = data.data;
					if (json.error && json.type === "unauthorized") {
						window.location.href = "/login";
					} else {
						if (type === "add") {
							this.store.addItem();
							this.displayInCart = true;
						} else {
							this.store.removeItem();
							this.displayInCart = false;
						}
					}
				});
		},
		addItem() {
			this.updateCart("add");
		},
		removeItem() {
			this.updateCart("remove");
		},
	},
};
</script>
