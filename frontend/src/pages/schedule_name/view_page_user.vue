<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <section class="page-section mb-3" >
                <div class="container-fluid">
                    <div class="grid ">
                        <div  class="col comp-grid" >
                            <div class=" text-lg font-bold text-primary" >
                                Clases que son parte del horario
                            </div>
                            <hr class="my-3" />
                            <div :class="{ 'card ': !isSubPage }" class="">
                                <div class="">
                                    <ClassesListPage ref="classesListPage"  :limit="10" field-name="classes.schedule" :field-value="item.id" :show-header="false" :show-breadcrumbs="true" :show-footer="false" :paginate="true" page-store-key="CLASSES_EDIT-CLASSES" is-sub-page>
                                    </ClassesListPage>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <template v-if="loading">
            <div style="min-height:200px" class="flex gap-3 justify-content-center align-items-center p-3">
                <div><ProgressSpinner style="width:50px;height:50px" /> </div>
                <div class="text-500">Loading... </div>
            </div>
        </template>
    </main>
</template>
<script setup>
	import {   toRefs, onMounted } from 'vue';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { usePageStore } from 'src/store/page';
	import { useViewPage } from 'src/composables/viewpage.js';
	import ClassesListPage from "../classes/list.vue";
	const props = defineProps({
		id: [String, Number],
		primaryKey: {
			type: String,
			default: 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'SCHEDULE_NAME-VIEW_PAGE_USER',
		},
		pageName: {
			type: String,
			default: 'schedule_name',
		},
		routeName: {
			type: String,
			default: 'schedule_nameview_page_user',
		},
		apiPath: {
			type: String,
			default: 'schedule_name/view_page_user',
		},
		editButton: {
			type: Boolean,
			default: true,
		},
		deleteButton: {
			type: Boolean,
			default: true,
		},
		exportButton: {
			type: Boolean,
			default: true,
		},
		titleBeforeDelete: {
			type: String,
			default: "Delete record",
		},
		msgBeforeDelete: {
			type: String,
			default: "Are you sure you want to delete this record?",
		},
		msgAfterDelete: {
			type: String,
			default: "Record deleted successfully",
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showFooter: {
			type: Boolean,
			default: true,
		},
		isSubPage: {
			type : Boolean,
			default : false,
		}
	});
	
	const store = usePageStore(props.pageStoreKey);
	const app = useApp(props);
	const auth = useAuth();
	
	const page = useViewPage({store, props}); // where page logics resides
	
	const {  currentRecord } = toRefs(store.state);
	const { loading, pageReady } = toRefs(page.state);
	const item = currentRecord;
	
	const  { load, deleteItem, exportPage,   } = page.methods;
	
	function getActionMenuModel(data){
		return [
		{
			label: "Edit",
			command: (event) => { app.openPageDialog({ page:'schedule_name/edit', url: `/schedule_name/edit/${data.id}`, closeBtn: true }) },
			icon: "pi pi-pencil",
			visible: auth.canView('schedule_name/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('schedule_name/delete')
		}
	]
	}
	
	onMounted(()=>{ 
		const pageTitle = "Schedule Name Details";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	
</script>
<style scoped>
</style>
