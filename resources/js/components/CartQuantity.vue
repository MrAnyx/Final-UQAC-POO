<template>
	<div>{{ count }}</div>
</template>

<script>
import { useStore } from "../stores/main";

export default {
	data() {
		return {
			count: 0,
			store: null,
		};
	},
	mounted() {
		this.store = useStore();
	},
	watch: {
		"store.cartCount": function (newVal, oldVal) {
			this.count = this.store.cartCount;
		},
	},
};
</script>
