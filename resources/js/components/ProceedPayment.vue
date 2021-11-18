<template>
	<a class="ui primary button" :class="{ loading: loading }" @click="proceed"><i class="credit card outline icon"></i> Proceed</a>
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
		proceed() {
			this.loading = true;

			axios.post(`${process.env.MIX_API_ENDPOINT}/cart/validate`).then(() => {
				this.loading = false;
				$("#payment-validation").dimmer("show");
				setTimeout(() => {
					$("#payment-validation").dimmer("hide");
					window.location.href = "/payment/validation";
				}, 2000);
			});
		},
	},
};
</script>
