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
                    <div  class="col-12 md:col-3 comp-grid" >
                        <record-count api-path="components_data/getcount_user" max="" v-slot="record">
                        <router-link  :to="`/user`">
                            <div class="card " >
                                <div class="font-medium text-lg mb-3">User</div>
                                <div class="flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <div class="font-bold text-4xl" v-if="!record.loading">{{ record.num }}</div>
                                        <ProgressSpinner v-else style="width:20px;height:20px" />
                                    </div>
                                    <div style="width:auto;">
                                        <Avatar icon="pi pi-th-large" size="xlarge" class="" />
                                        </div>
                                    </div>
                                    <div class="text-500 text-sm">Total User</div>
                                </div>
                            </router-link>
                            </record-count>
                            <div :class="{ 'card ': !isSubPage }" class="">
                                <NiceImage class="img-fluid" src="images/logo.png"   style="max-width:100%;" />
                            </div>
                        </div>
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
