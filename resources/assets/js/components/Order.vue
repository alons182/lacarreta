<template>
	<lot></lot>
  <!--<div class="cart btn btn-cart header-btn-cart {{ type == 'full' ? 'cart-full' : '' }}">  
  	<span class="cart-size" @click="showCart = !showCart"> {{ cartSize }} </span><i class="icon-shopping-cart" @click="showCart = !showCart"></i> 
  	<div class="cart-items" v-show="showCart"> 
		  <table class="cartTable {{ type == 'full' ? 'table table-bordered table-striped table-responsive' : ''}}"> 
			  <tbody> 
				  <tr class="product" v-for="product in cart"> 
					  <input type="hidden" name="prods[]" value="{{ productToPhp(product) | stringify }}" >
					  
					  <td class="align-left"><div class="cartImage" @click="removeProduct(product)" v-bind:style="{ backgroundImage: 'url( /img/product-no-image.jpg  )' }" style="background-size: cover; background-position: center;}"><i class="close fa fa-times"></i></div></td> 
					  <td class="align-center"><button class="btn" @click="quantityChange(product, 'decriment')"><i class="close fa fa-minus"></i></button></td> 
					  <td class="align-center">{{ cart[$index].quantity }}</td> 
					  <td class="align-center"><button class="btn" @click="quantityChange(product, 'incriment')"><i class="close fa fa-plus"></i></button></td> 
					  <td class="align-center">{{ cart[$index].descripcion | truncate 30  }}</td> 
					  <td>{{ product.precio  | currency '¢' }}</td> 
					</tr>
			  </tbody> 
		  </table>
		  <hr class="hr">
		  <h3 class="cartSubTotal" v-show="showCart"> {{ cartSubTotal | currency '¢' }} </h3>
  			<button class="clearCart btn" v-show="cartSize && type != 'full'" @click="clearCart()"> Limpiar Carrito </button> 
  			<button class="checkoutCart btn" v-show="cartSize && type != 'full' " @click="propagateCheckout()"> Pagar </button>
  			
  	</div> 
  	
 </div>-->
</template>


<script>
	
	export default {

		props: ['request'],

		  data () {
		    return {
		     	data : {}
		    }
		  },
		 
		  methods: {
		  	 
		    
			save(cart) {
				
			}
		

		  },
		  created () {
		  	console.log(JSON.stringify(this.request));

		  	this.$http.post('http://201.203.229.106:90/api/v1/proformas', JSON.stringify(this.request)).then((response) => {

		          // get status
		          console.log(response.status);
		          // set data on vm
		          this.$set('data', response.json())

		      }, (response) => {
		          console.log('error al guardar proforma')
		      });

		  	 /*var resource = this.$resource('http://201.203.229.106:90/api/v1/proformas{/n_factura}');

		      // GET someItem/1
		      resource.get({filter: this.filterProducts, filterByCategory: this.filterCategory, limit: this.limitProducts}).then((response) => {
		          this.productsData = response.data.data;
		           this.loader = false;
		      },(response) => {
		          console.log('error');
		      });*/

		  }
	}
</script>