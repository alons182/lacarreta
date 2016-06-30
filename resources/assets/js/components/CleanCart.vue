<template>	
  <lot></lot>
</template>


<script>
	
	export default {

		props: ['cart','cartSubTotal','cartTotal', 'tax'],

		  methods: {
		  	

		    clearCart () {
		      this.cart = [];
		 
		    },

		    fetchStorage () {
				return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
			},
			saveStorage (cart) {
				localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
			},
		
		  },
		  created () {
		  	this.cart = [];
	        this.cartSubTotal = 0;
	        this.cartTotal = 0;

		  
		  }
	}
</script>