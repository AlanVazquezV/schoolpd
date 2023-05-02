<template>
    <main class="main-page" id="">
        <section class="page-section mb-3" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class="">
                            <div class="">
                                <ClassesListPage ref="classesListPage"  :limit="10" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="CLASSES_EDIT-CLASSES" is-sub-page>
                                </ClassesListPage>
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
	
	
	import ClassesListPage from "../classes/list.vue";
	
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
