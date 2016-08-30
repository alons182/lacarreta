
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Vue.component('example', require('./components/Example.vue'));

import Products from './components/Products.vue';
import Cart from './components/Cart.vue';
import Product from './components/Product.vue';
import Search from './components/Search.vue';
import Menu from './components/Menu.vue';
import CleanCart from './components/CleanCart.vue';
import Order from './components/Order.vue';
import Alert from './components/Alert.vue';


const app = new Vue({
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
