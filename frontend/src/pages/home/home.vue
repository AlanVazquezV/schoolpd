<template>
    <main class="main-page" id="">
        <section class="page-section q-pa-md" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class=" text-lg font-bold text-primary" >
                            Home
                        </div>
                        <hr class="my-3" />
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section mb-3" >
            <div class="container-fluid">
                <div class="grid ">
                </div>
            </div>
        </section>
    </main>

</template>
<script setup>
	import {  ref } from 'vue';
	
	
	import { useApp } from 'src/composables/app.js';
	
	
	
	const props = defineProps({
		pageName: {
			type: String,
			default: 'home',
		},
		routeName: {
			type: String,
			default: 'home',
		},
		isSubPage: {
			type : Boolean,
			default : false,
		},
	});
	const app = useApp();
	
	const pageReady = ref(true);
	
</script>
<style scoped>
</style>
