<template>
	
  <div class="cart btn btn-cart header-btn-cart {{ type == 'full' ? 'cart-full' : '' }}">  
  	<span class="cart-size" @click="showCart = !showCart"> {{ cartSize }} </span><i class="icon-shopping-cart" @click="showCart = !showCart"></i> 
  	<div class="cart-items" v-show="showCart"> 
		  <table class="cartTable {{ type == 'full' ? 'table table-bordered table-striped table-responsive' : ''}}"> 
			  <tbody> 
				  <tr class="product" v-for="product in cart"> 
					  <input type="hidden" name="prods[]" value="{{ productToPhp(product) | stringify }}" >
					  
					  <td class="align-left"><div class="cartImage" @click="removeProduct(product)" v-bind:style="{ backgroundImage: 'url( /img/product-no-image.jpg  )' }" style="background-size: cover; background-position: center;}"><i class="close fa fa-times"></i></div></td> 
					  <td class="align-center"><span class="btn btn-cart" @click="quantityChange(product, 'decriment')"><i class="close fa fa-minus"></i></span></td> 
					  <td class="align-center"><input type="number"  v-show="type != 'full'" @keyup="quantityChangeFromInput(product)" v-model="cart[$index].quantity" class="cart-quantity input-number–noSpinners"  min="1" number/> <span v-show="type == 'full'">{{ cart[$index].quantity }}</span></td> 
					  <td class="align-center"><span class="btn btn-cart" @click="quantityChange(product, 'incriment')"><i class="close fa fa-plus"></i></span></td> 
					  <td class="align-center">{{ cart[$index].descripcion | truncate 30  }}</td> 
					  <td>{{ product.precio_descuento_ivi  | currency '¢' }}</td> 

					</tr>
			  </tbody> 
		  </table>
		  <hr class="hr">
		  <h3 class="cartSubTotal" v-show="showCart"> {{ cartSubTotal | currency '¢' }} </h3>
  			<button class="clearCart btn" v-show="cartSize && type != 'full'" @click="clearCart()"> Limpiar Carrito </button> 
  			<button class="checkoutCart btn" v-show="cartSize && type != 'full' " @click="propagateCheckout()"> Pagar </button>
  			
  	</div> 
  	
 </div>
</template>


<script>
	var STORAGE_KEY = 'cart';
	export default {

		props: ['cart', 'cartSubTotal', 'tax', 'cartTotal', 'type'],

		  data () {
		    return {
		      showCart: false
		      
		    }
		  },
		  computed: {
			  	 cartSize () {
			      var cartSize = 0;

			      for (var i = 0; i < this.cart.length; i++) {
			        cartSize += this.cart[i].quantity;
			      }

			      return cartSize;
			    }
			   
			    
		  },
		  filters: {
		  		truncate (string, value) {
			        return string.substring(0, value) + '...';
			    },
			    stringify(item){
			    	return JSON.stringify(item);
			    }

		  },
		  // watch todos change for localStorage persistence
			watch: {
				cart: {
					handler (cart) {
						
					  this.saveStorage(cart);
					},
					deep: true
				}
			},
		 
		  methods: {
		  	 productToPhp (product) {
			      	var datos = {
			      		codigo: product.codigo,
			      		codigo_ubicacion: product.codigo_ubicacion,
			      		descripcion: product.descripcion,
			      		precio_venta: product.precio_venta,
			      		precio_desc: product.precio_desc,
			      		precio_ivi: product.precio_ivi,
			      		precio_final: product.precio_final,
			      		quantity: product.quantity,
			      		descuento: product.descuento,
			      		paga_impuesto1: product.paga_impuesto1,
			      		paga_impuesto2: product.paga_impuesto2,
			      		paga_impuesto3: product.paga_impuesto3,
			      		impuesto: product.impuesto,
			      		impuesto2: product.impuesto2,
			      		impuesto3: product.impuesto3
			      	}

			      return datos;
			    },
		  	addProduct (product) {
			  
			      //product.precio = (product.descuento > 0 ) ? (product.precio_venta - (product.precio_venta * (product.descuento / 100))) : product.precio_venta;
			      this.cart.push(product);
			     
			      this.cartSubTotal = this.cartSubTotal + (product.precio_descuento_ivi * product.quantity);
			      this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);
			     
			},
		    removeProduct (product) {

		      this.cart.$remove(product);
		      this.cartSubTotal = this.cartSubTotal - (product.precio_descuento_ivi * product.quantity);
		      this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);

		      /*if(this.cart.length <= 0) {
		        this.checkoutBool = false;
		      }*/
		    },

		    clearCart () {
		      this.cart = [];
		      this.cartSubTotal = 0;
		      this.cartTotal = 0;
		      //this.checkoutBool = false;
		      this.showCart = false;
		    },
		    quantityChangeFromInput (product) {
		    	console.log('keyup')
		    	this.cartSubTotal = 0;
				this.cartTotal = 0;

		    	 for (var i = 0; i < this.cart.length; i++) {
		    	
					if (this.cart[i].codigo === product.codigo) {
			 
			  
			            this.cart.$set(i, product);
 						
 					}
		    	 	
		    	 	this.cartSubTotal = this.cartSubTotal + (this.cart[i].precio_descuento_ivi * this.cart[i].quantity);
				    this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);
			        
		      }

		     
		    },

		    quantityChange (product, direction) {
		      var qtyChange;

		      for (var i = 0; i < this.cart.length; i++) {
		        if (this.cart[i].codigo === product.codigo) {

		          var newProduct = this.cart[i];

		          if(direction === "incriment") {
		            newProduct.quantity = newProduct.quantity + 1;
		            this.cart.$set(i, newProduct);

		          } else {
		            newProduct.quantity = newProduct.quantity - 1;

		            if(newProduct.quantity == 0) {
		              this.cart.$remove(newProduct);

		            } else {
		              this.cart.$set(i, newProduct);
		            }
		          }
		        }
		      }

		      if(direction === "incriment") {
		        this.cartSubTotal = this.cartSubTotal + product.precio_descuento_ivi;

		      } else {
		        this.cartSubTotal = this.cartSubTotal - product.precio_descuento_ivi;
		      }

		      this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);

		      /*if(this.cart.length <= 0) {
		        this.checkoutBool = false;
		      }*/
		    },
		    fetchStorage () {
				return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
			},
			saveStorage (cart) {
				localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
			},
		

		    //send our request up the chain, to our parent
		    //our parent catches the event, and sends the request back down
		    propagateCheckout () {
		      this.$dispatch("checkoutRequest");
		    },
		    propagatePayment () {
		      this.$dispatch("paymentRequest");
		    }
		  },
		  created () {
		  	this.clearCart();
		  	var dataStorage = this.fetchStorage();
		  	for (var i = 0; i < dataStorage.length; i++) {
			       this.addProduct(dataStorage[i]);
			    }

		  }
	}
</script>