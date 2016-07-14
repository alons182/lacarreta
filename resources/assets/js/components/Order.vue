<template>
	<div class="loader-container" v-show="loader">
			<div class="loader">Loading...</div>
		</div>
	<slot></slot> <span>{{ data.N_Factura }}</span> - <span>Comprobante : {{ data.order_id }}</span>
  
</template>


<script>
	
	export default {

		props: ['request'],

		  data () {
		    return {
		     	data : {},
		     	loader: false
		    }
		  },
		 
		  methods: {
		  	 
		    
			updateOrder (order_id, numero_factura) {

				//console.log(order_id + '-' +numero_factura );
				var resource = this.$resource('orders{/id}');

			     
			      resource.update({id: order_id}, {N_Factura: numero_factura}).then((response) => {
			            console.log(response.status);
			            console.log(response.data);
						this.loader = false;
			      }, (response) => {
			          console.log('error al actualizar order con proforma')
			          this.loader = false;
			      });

				

			}
		

		  },
		  created () {
		  	this.loader = true;
		  	this.$http.post('http://201.203.229.106:90/api/v1/proformas', this.request).then((response) => {

		          this.$set('data', response.data.data)

		          if(response.status == 201)
		          {
		          	this.updateOrder(response.data.data.order_id, response.data.data.N_Factura)
		          }


		      }, (response) => {
		          console.log('error al guardar proforma')
		          this.loader = false;
		      });

		  	

		  }
	}
</script>