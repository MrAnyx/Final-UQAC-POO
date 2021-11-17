<template>
	<div class="container">
		<button v-show="!this.inCart" class="fluid ui button teal" :class="{ loading: isLoading }" @click="addItem">
			Add to cart <i class="cart arrow down icon" style="margin-left: 5px"></i>
		</button>
		<button v-show="this.inCart" class="fluid ui button negative" :class="{ loading: isLoading }" @click="removeItem">
			Remove from cart <i class="trash alternate icon" style="margin-left: 5px"></i>
		</button>
	</div>
</template>

<script>
import axios from "axios";

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
		};
	},
	methods: {
		updateCart(type) {
			this.isLoading = true;
			axios
				.patch(`${process.env.MIX_API_ENDPOINT}/cart/${this.itemId}`, {
					type,
				})
				.then(({ data }) => {
					this.isLoading = true;
					if (data.error && data.type === "auth") {
						window.location.href = "/login";
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
