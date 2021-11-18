<template>
	<a class="ui button fluid negative" :class="{ loading: loading }" @click="emptyCart" style="margin-top: 10px">Empty card</a>
</template>

<script>
import axios from "axios";
export default {
	data() {
		return {
			loading: false,
		};
	},
	methods: {
		emptyCart() {
			this.loading = true;
			axios.delete(`${process.env.MIX_API_ENDPOINT}/cart/empty`).then(() => {
				this.loading = false;
				window.location.href = "/";
			});
		},
	},
};
</script>
