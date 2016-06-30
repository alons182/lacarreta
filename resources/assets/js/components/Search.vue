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
	
		  data () {
			    return {
			      items: [],
			      query: '',
			      current: -1,
			      loading: false,
			      queryParamName: 'q',
			      
			      src: 'http://201.203.229.106:90/api/v1/products/search',
			      limit: 10,
			      minChars: 3
			    }
			  },
			  computed: {
			    hasItems () {
			      return this.items.length > 0
			    },

			    isEmpty () {
			      return !this.query
			    },

			    isDirty () {
			      return !!this.query
			    }
			  },

			  methods: {
			    
			    update () {
				      if (!this.query) {
				        return this.reset()
				      }

				      if (this.minChars && this.query.length < this.minChars) {
				        return
				      }

				      this.loading = true

				      this.fetch().then((response) => {
				        if (this.query) {
				          let data = response.data
				          data = this.prepareResponseData ? this.prepareResponseData(data) : data
				          this.items = this.limit ? data.slice(0, this.limit) : data
				          this.current = -1
				          this.loading = false
				        }
				      })
				    },

				    fetch () {
				     

				      let queryParam = {
				        [this.queryParamName]: this.query
				      }

				      //return this.$http.get(this.src, Object.assign(queryParam, this.data))
				      return this.$http.get(this.src, {params: Object.assign(queryParam, this.data)}) 
				    },

				    reset () {
				      this.items = []
				      this.query = ''
				      this.loading = false
				    },

				    setActive (index) {
				      this.current = index
				    },

				    activeClass (index) {
				      return {
				        active: this.current == index
				      }
				    },

				    hit () {
				      if (this.current !== -1) {
				        this.onHit(this.items[this.current])
				      }
				    },

				    up () {
				      if (this.current > 0) {
				        this.current--
				      } else if (this.current == -1) {
				        this.current = this.items.length - 1
				      } else {
				        this.current = -1
				      }
				    },

				    down () {
				      if (this.current < this.items.length-1) {
				        this.current++
				      } else {
				        this.current = -1
				      }
				    },

				   


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