import Vue from  'Vue';
import VueResource from 'vue-resource';

import Products from './components/Products.vue';
import Cart from './components/Cart.vue';
import Product from './components/Product.vue';
import Search from './components/Search.vue';
import Menu from './components/Menu.vue';
import CleanCart from './components/CleanCart.vue';
import Order from './components/Order.vue';
import Alert from './components/Alert.vue';

Vue.use(VueResource);

window.app = new Vue({
	el: 'body',
	components: {  Cart, Products, Product, Search, Menu, CleanCart, Order, Alert},
	data: {

	    cart: [],
	    cartSubTotal: 0,
	    tax: 0.065,
	    cartTotal: 0,
	    filterCategory: "",
	    messageCart: ""

	},
	
	events: {
	    checkoutRequest () {
	      var self = this;
	      location.href = "/payment";
	    },
	    paymentRequest () {
	      var self = this;
	      console.log('payment');
	      location.href = "/payment";
	    },
	    alertMessage (message) {
	    	this.messageCart = message;
	    	setTimeout(
					() => this.messageCart = false,
					3000
				)
	    }
	  }

});