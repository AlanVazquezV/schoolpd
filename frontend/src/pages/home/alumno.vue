<template>
    <main class="main-page" id="">
        <section class="page-section q-pa-md" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class=" text-lg font-bold text-primary" >
                            ALUMNO
                        </div>
                        <hr class="my-3" />
                    </div>
                    <div  class="col-12 comp-grid" >
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section mb-3" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class="">
                            <div class="">
                                <ClassesListPage ref="classesListPage"  :limit="10" field-name="classes.schedule" :field-value="auth.user.schedule" sort-by="classes.time" sort-type="ASC" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="CLASSES_EDIT-CLASSES" is-sub-page>
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
	import { useAuth } from 'src/composables/auth';
	
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
	const auth = useAuth();
	const pageReady = ref(true);
	
</script>
<style scoped>
</style>
