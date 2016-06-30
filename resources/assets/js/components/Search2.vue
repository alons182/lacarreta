<template>

	 <div class="top-search">
	    <!-- optional indicators -->
	    <i class="fa fa-spinner fa-spin" v-if="loading"></i>
	    <template v-else>
	      <i class="fa fa-search" v-show="isEmpty"></i>
	      <i class="fa fa-times" v-show="isDirty" @click="reset"></i>
	    </template>

	    <!-- the input field -->
	    <input type="text"
	           placeholder="Buscar"
	           autocomplete="off"
	           v-model="query"
	           @keydown.down="down"
	           @keydown.up="up"
	           @keydown.enter="hit"
	           @keydown.esc="reset"
	           @blur="reset"
	           @input="update"/>

	    <!-- the list -->
	    <ul v-show="hasItems">
	      <li v-for="item in items" :class="activeClass($index)" @mousedown="hit" @mousemove="setActive($index)">
	        <span v-text="item.descripcion | truncate 30"></span>
	      </li>
	    </ul>
	  </div>



</template>


<script>
//import VueTypeahead from 'vue-typeahead';
	export default {
		 extends: VueTypeahead, 
		  data () {
			    return {
			      // The source url
			      // (required)
			      src: 'http://201.203.229.106:90/api/v1/products/search',

			      // The data that would be sent by request
			      // (optional)
			     // data: { },

			      // Limit the number of items which is shown at the list
			      // (optional)
			      limit: 10,

			      // The minimum character length needed before triggering
			      // (optional)
			      minChars: 3,

			      // Override the default value (`q`) of query parameter name
			      // (optional)
			      //queryParamName: 'search'
			    }
			  },

			  methods: {
			    // The callback function which is triggered when the user hits on an item
			    // (required)
			    onHit (item) {
			       console.log(item.descripcion)
			       location.href = '/products/'+item.codigo_categoria +'/'+ item.codigo_categoria2 +'/'+ item.codigo_categoria3 +'/'+ item.codigo;
			    },

			    // The callback function which is triggered when the response data are received
			    // (optional)
			    prepareResponseData (data) {
			      // data = ...
			     
			      return data.data;
			    }
			},
			filters: {
		  		truncate: function(string, value) {
			        return string.substring(0, value) + '...';
			    }

		  	}
			
		
	}
</script>