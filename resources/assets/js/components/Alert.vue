<template>
	<div class="alert alert-{{ type }}" v-show="show"transition="fade">
		<slot></slot>
		<span class="alert-close" v-show="important" @click="show= false">x</span>
	</div>
</template>

<script>
	export default {
		props: {
			type: { default:'info'},
			timeout: { default: 3000},
			important:{
				type: Boolean,
				default: false
			}

		},
		data() {
			return {show: true}
		},
		ready(){
			if(! this.important){
				setTimeout(
					() => this.show = false,
					this.timeout
				)
			}
		}
	}
</script>