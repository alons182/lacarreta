<template>
	
	<div class='row-products'>
		<div class="loader" v-show="loader">Loading...</div>
  		<div v-for='product in productsData' track-by='$index' class='product-item {{ product.descripcion | slugify }}'>
			<figure class="product-img">
				<a href="/products/{{ product.codigo_categoria }}/{{ product.codigo_categoria2 }}/{{ product.codigo_categoria }}/{{ product.codigo }}"><img src="/img/product-no-image.jpg" alt="product" /></a>
			</figure>
			<div class="product-info">
				<h3 class="product-name">{{ product.descripcion }}</h3>
				<div class="product-price product-price-promo" v-show="product.descuento > 0 "> {{ product.precio_promocion | currency '¢' }}</div>
				<div :class="['product-price', product.descuento > 0 ? 'tachado' : '']"> {{ product.precio_venta | currency '¢' }}</div>
				<div class="product-button">
					<button @click='addToCart(product)' class="btn btn-addCart">Agregar a carrito</button>
				</div>
			</div>
		</div>
  	</div> 
	<nav v-show="showPagination == 1">
	  	<ul class="pagination">
	        <li v-if="pagination.current_page > 1">
	            <a href="#" aria-label="Previous"
	               @click.prevent="changePage(pagination.current_page - 1)">
	                <span aria-hidden="true">&laquo;</span>
	            </a>
	        </li>
	        <li v-for="page in pagesNumber"
	            v-bind:class="[ page == isActived ? 'active' : '']">
	            <a href="#"
	               @click.prevent="changePage(page)">{{ page }}</a>
	        </li>
	        <li v-if="pagination.current_page < pagination.last_page">
	            <a href="#" aria-label="Next"
	               @click.prevent="changePage(pagination.current_page)">
	                <span aria-hidden="true">&raquo;</span>
	            </a>
	        </li>
	    </ul>
	</nav>

</template>


<script>
	export default {
		name: 'products',
		props: [ 'cart', 'tax', 'cartSubTotal', 'cartTotal','filterProducts','filterCategory', 'limitProducts', 'showPagination'],
		data () {
			return {
				productsData: {	},
				pagination: { },
				loader: false
				
				
				
			}
		},
		 computed: {
            isActived () {
                return this.pagination.current_page;
            },
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - 4;//this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (4 * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
		methods: {

			 fetchData (page){
			 	this.loader = true;
				 var resource = this.$resource('http://201.203.229.106:90/api/v1/products{/codigo}');

			     var data = {filter: this.filterProducts, filterByCategory: this.filterCategory, limit: this.limitProducts, page: page};
			      resource.get(data).then((response) => {
			          this.productsData = response.data.data;
			          this.$set('pagination', response.data.paginator);
			           this.loader = false;
			      },(response) => {
			          console.log('error');
			      });


			
			 },
			  changePage (page) {
                this.pagination.current_page = page;
                this.fetchData(page);
            },

			 addToCart (product) {
			 		
			      var found = false;
			      product.precio = (product.descuento > 0 ) ? product.precio_promocion : product.precio_venta;
			     
			      for (var i = 0; i < this.cart.length; i++) {

			        if (this.cart[i].codigo === product.codigo) {
			          var newProduct = this.cart[i];
			          newProduct.quantity = newProduct.quantity + 1;
			          this.cart.$set(i, newProduct);
			          //console.log("DUPLICATE",  this.cart[i].product + "'s quantity is now: " + this.cart[i].quantity);
			          found = true;
			          break;
			        }
			      }

			      if(!found) {
			        product.quantity = 1;
			        this.cart.push(product);
			      }
			     
			      this.cartSubTotal = this.cartSubTotal + product.precio;
			      this.cartTotal = this.cartSubTotal + (this.tax * this.cartSubTotal);
			      //this.checkoutBool = true;
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

			    }
		},
		created() {
			this.fetchData(this.pagination.current_page); //this.pagination.current_page);

			//console.log(this.filterCategory);
			
				/*$.getJSON('http://201.203.229.106:90/api/v1/products',{ filter: this.filter, limit: this.limitProducts}, function (products) {
					
					this.productsData = products.data;
					this.loader = false;

				}.bind(this));*/
	 		/*	 var resource = this.$resource('http://201.203.229.106:90/api/v1/products{/codigo}');

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