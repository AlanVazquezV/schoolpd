<template>
    <main class="main-page" id="">
        <section class="page-section mb-3" >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                    </div>
                    <div  class="col-12 comp-grid" >
                    </div>
                    <div  class="col-12 comp-grid" >
                    </div>
                    <div  class="col-12 comp-grid" >
                        <div class="">
                            <div class="">
                                <UserListPage ref="userListPage"  :limit="10" field-name="user.username" :field-value="currentRecord.username" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="ADMINISTRADOR-USER" is-sub-page>
                                </UserListPage>
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
	
	
	import UserListPage from "../user/list.vue";
	
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
