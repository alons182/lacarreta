<template>
	
	<div class='product-details'>
		<div class="loader-container" v-show="loader">
			<div class="loader">Loading...</div>
		</div>
		<div class="product-media">
			<figure class="product-img">
				<a href="#"><img src="/img/products/{{ product.codigo | removeZeros }}.jpg" alt="product" /></a>
			</figure>
		</div>
  		<div class='product-info' sku='{{ $codigo }}'>
			
			
				<h3 class="product-name">{{ product.descripcion }}</h3>
				<div class="product-categories"></div>
				<hr>
				<div class="product-prices">
					<span class="product-price product-price-promo" v-show="product.descuento > 0 "> {{ product.precio_descuento_ivi | currency '¢' }} </span> - 
					<span :class="['product-price', product.descuento > 0 ? 'tachado' : '']"> {{ product.precio_venta | currency '¢' }}</span> <span class="ivi">I.V.I</span>

				</div>
				
				<div class="product-button">
					<input type="number" v-model="cant" class="product-quantity"  min="1" number/><button @click='addToCart(product)' class="btn btn-addCart">Agregar a carrito</button>
				</div>
				<hr>
				<div class="product-notes">
					<p>Las fotografías de este sitio web son con carácter ilustrativo y podrían incluir o excluir accesorios que no están incluidos en el precio del producto. Si no está seguro, por favor contacte a nuestro departamento de Servicio al Cliente o a su Agente Vendedor.</p>
				</div>
			
		</div>
  	</div>
			
</template>


<script>
   
	export default {
		
		props: ['cart', 'tax', 'cartSubTotal', 'cartTotal', 'codigo'],
		
		data () {
			return {
				product: {},
				loader:false,
				cant: 1,
			
				
			}
		},
		methods: {

			 addToCart (product) {
			 		
			      var found = false;
			       //product.precio = (product.descuento > 0 ) ? (product.precio_venta - (product.precio_venta * (product.descuento / 100))) : product.precio_venta;

			      for (var i = 0; i < this.cart.length; i++) {

			        if (this.cart[i].codigo === product.codigo) {
			          var newProduct = this.cart[i];
			          newProduct.quantity = newProduct.quantity + ((this.cant <= 0) ? 1 : this.cant);
			          this.cart.$set(i, newProduct);
			          //console.log("DUPLICATE",  this.cart[i].product + "'s quantity is now: " + this.cart[i].quantity);
			          found = true;
			          break;
			        }
			      }

			      if(!found) {
			      	
			        product.quantity = (this.cant <= 0) ? 1 : this.cant;
			        this.cart.push(product);
			      }

			      this.cartSubTotal = this.cartSubTotal + (product.precio_descuento_ivi * ((this.cant <= 0) ? 1 : this.cant));
			      this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);
			      this.cant = 1;

			      this.$dispatch("alertMessage", 'Producto Agregado al carrito!!');
			}

		},
		 filters: {
			slugify (value) {      
			    	
			    	 value = value.replace(/^\s+|\s+$/g, ''); // trim
					  value = value.toLowerCase();

					  // remove accents, swap ñ for n, etc
					  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
					  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
					  for (var i=0, l=from.length ; i<l ; i++) {
					    value = value.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
					  }

					  value = value.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
					    .replace(/\s+/g, '-') // collapse whitespace and replace by -
					    .replace(/-+/g, '-'); // collapse dashes

					  return value;

			    },
			    removeZeros(value){
						value = value.replace(/^[0|\D]*/,'');//replaceAll("^0*", "");
				return value;//.replaceFirst("^0+(?!$)", "")
			}
		},
		created () {
			 this.loader = true;
			 var resource = this.$resource('http://201.203.229.106:90/api/v1/products{/codigo}');

		      // GET someItem/1
		      resource.get({codigo: this.codigo}).then((response) => {
		          this.product = response.data.data;
				  this.loader = false;
		      });


			/*$.getJSON('http://201.203.229.106:90/api/v1/products/'+ this.codigo, function (product) {
				
				this.product = product.data;
				this.loader = false;

			}.bind(this));*/
		}
	}
</script>