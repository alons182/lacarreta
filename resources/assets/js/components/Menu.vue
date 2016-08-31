<template>
	
	
				<ul class="header-menu-ul">
                        <li class="header-menu-item">
                            <a href="/" class="header-menu-link">Inicio</a>
                        </li>
                        <li class="header-menu-item parent menu-item-has-children" v-for='category in categories' >
                            <a href="/products/{{category.Codigo_Clasifica01}}" class="header-menu-link">{{ category.Descripcion }}
                            </a>
                            <ul class="sub-menu">
                            	 <li class="sub-menu-item menu-item-has-children" v-for='subcategory in category.categories2'>
		                            <a href="/products/{{subcategory.Codigo_Clasifica01}}/{{subcategory.Codigo_Clasifica02}}" class="sub-menu-link">{{ subcategory.Descripcion }}</a>
		                             <ul class="sub-menu">
		                            	 <li class="sub-menu-item menu-item-has-children" v-for='subcategory2 in subcategory.categories3'>
				                            <a href="/products/{{subcategory2.Codigo_Clasifica01}}/{{subcategory2.Codigo_Clasifica02}}/{{subcategory2.Codigo_Clasifica03}}" class="sub-menu-link">{{ subcategory2.Descripcion }}</a>
				                            
				                        </li>
				                       
		                            </ul>
		                        </li>
		                       
                            </ul>
                        </li>
                         <li class="header-menu-item">
                            <a href="/cotizar" class="header-menu-link">Cotizaciones</a>
                        </li>
                        <!--<li class="header-menu-item menu-item-has-children">
                            <a href="#" class="header-menu-link">Otros</a>
                            <ul class="sub-menu">
                            	 <li class="sub-menu-item menu-item-has-children" v-for='category in categories' v-if="category.Codigo_Clasifica01 == '0010' || category.Codigo_Clasifica01 == '0011'" >
		                            
		                            <a href="/products/{{category.Codigo_Clasifica01}}" class="sub-menu-link">{{ category.Descripcion }}</a>

		                            <ul class="sub-menu">
		                            	 <li class="sub-menu-item menu-item-has-children" v-for='subcategory in category.categories2'>
				                            <a href="/products/{{subcategory.Codigo_Clasifica01}}/{{subcategory.Codigo_Clasifica02}}" class="sub-menu-link">{{ subcategory.Descripcion }}</a>
				                             <ul class="sub-menu">
				                            	 <li class="sub-menu-item menu-item-has-children" v-for='subcategory2 in subcategory.categories3'>
						                            <a href="/products/{{subcategory2.Codigo_Clasifica01}}/{{subcategory2.Codigo_Clasifica02}}/{{subcategory2.Codigo_Clasifica03}}" class="sub-menu-link">{{ subcategory2.Descripcion }}</a>
						                            
						                        </li>
						                       
				                            </ul>
				                        </li>
				                       
		                            </ul>
		                            
		                        </li>
		                       
                            </ul>
                        </li>-->
                       
                        
                    </ul>
			


	
  	 

</template>


<script>
	export default {
	
		data (){
			return {
				categories: {},
				loader: false
				
				
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
		created () {

			this.loader = true;
			
	 	     var resource = this.$resource('http://201.203.229.106:90/api/v1/menu');

		      
		      resource.get().then((response) => {
		          var categories = response.data;
		         
		            categories = categories.filter(function (item) {
					  return item.Codigo_Clasifica01 != '0016' && item.Codigo_Clasifica01 != '0023' && item.Codigo_Clasifica01 != '0008';
					  
					});

		            var newCategories = categories.filter(function (item) {
					  
					  if(item.Codigo_Clasifica01 == '0007')
							item.Descripcion = 'Jardineria'
					  /*if(item.Codigo_Clasifica01 == '0012')
							item.Descripcion = 'Cerrajeria'*/
					 
					  
					  return true;
					});

		           this.categories = newCategories;
		           
		           this.loader = false;
		      },(response) => {
		          console.log('error');
		      });
			

			
		}
	}
</script>