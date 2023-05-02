<template>
    <main class="main-page" id="">
        <section class="page-section q-pa-md" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class=" text-lg font-bold text-primary" >
                            Assistance_list
                        </div>
                        <hr class="my-3" />
                        <div class="">
                            <div class="">
                                <AssistanceListClassPage ref="assistanceListPage"  :limit="10" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="ASSISTANCE_LIST-ASSISTANCE-LIST_CLASS" is-sub-page>
                                    </AssistanceListClassPage>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <AssistanceListPage ref="assistanceListPage"  :limit="10" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="ASSISTANCE_LIST-ASSISTANCE" is-sub-page>
                                        </AssistanceListPage>
                                    </div>
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
	
	
	import AssistanceListClassPage from "../assistance/list_class.vue";
import AssistanceListPage from "../assistance/list.vue";
	
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
