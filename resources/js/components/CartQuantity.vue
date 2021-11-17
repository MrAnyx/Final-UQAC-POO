<template>
	<div>{{ count }}</div>
</template>

<script>
export default {
	data() {
		return {
			count: 0,
		};
	},
	mounted() {
		// console.log(window.$cartQuantity);
		// this.count = this.$cartQuantity;
	},
};
</script>
