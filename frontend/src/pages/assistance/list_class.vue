<template>
    <main class="main-page"  id="">
        <section class="page-section " >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class="flex align-items-center justify-content-around">
                            <div v-if="searchText" :class="filterTagClass">
                                Search
                                <Chip class="font-medium px-2 py-1" removable @remove="clearSearch()">{{ searchText }}</Chip>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section " >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div class="flex align-items-center justify-content-around">
                            <div v-if="searchText" :class="filterTagClass">
                                Search
                                <Chip class="font-medium px-2 py-1" removable @remove="clearSearch()">{{ searchText }}</Chip>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script setup>
	import {   toRefs, onMounted } from 'vue';
	import { usePageStore } from 'src/store/page';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { useListPage } from 'src/composables/listpage.js';
	
	const props = defineProps({
		primaryKey : {
			type : String,
			default : 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'ASSISTANCE-LIST_CLASS',
		},
		pageName: {
			type: String,
			default : 'assistance',
		},
		routeName: {
			type: String,
			default: 'assistancelist_class',
		},
		apiPath: {
			type: String,
			default: 'assistance/list_class',
		},
		paginate: {
			type: Boolean,
			default: true,
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showFooter: {
			type: Boolean,
			default: true,
		},
		showBreadcrumbs: {
			type: Boolean,
			default: true,
		},
		exportButton: {
			type: Boolean,
			default: true,
		},
		importButton: {
			type: Boolean,
			default: false,
		},
		multiCheckbox: {
			type: Boolean,
			default: true,
		},
		emptyRecordMsg: {
			type: String,
			default: "No record found",
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
		page: {
			type: Number,
			default: 1,
		},
		limit: {
			type: Number,
			default: 10,
		},
		mergeRecords: { // for infinite loading
			type: Boolean,
			default: false,
		},
		search: {
			type: String,
			default: '',
		},
		fieldName: null,
		fieldValue: null,
		sortBy: {
			type: String,
			default: '',
		},
		sortType: {
			type: String,
			default: 'desc', //desc or asc
		},
		isSubPage: {
			type: Boolean,
			default: false,
		},
		filterTagClass: {
			type: String,
			default: 'surface-card p-2 text-500 flex-grow-1 text-center m-1 mb-3 flex-grow-1 text-center',
		}
	});
	
	const app = useApp();
	const auth = useAuth();
	
	const defaultStoreState = {
		filters: {
		},
		pagination: {
			page: props.page,
			limit: props.limit,
			sortBy: props.sortBy,
			sortType: props.sortType
		},
		searchText: props.search,
		primaryKey: props.primaryKey
	}
	const store = usePageStore(props.pageStoreKey,  defaultStoreState);
	
	// page hooks where logics resides
	const page = useListPage({ store, props });
	
	const {records, filters,  totalRecords,  selectedItems,  pagination,} = toRefs(store.state);
	const {  loading, searchText, } = toRefs(page.state);
	
	const {  pageBreadCrumb,   totalPages, recordsPosition, } = page.computedProps;
	
	const { load,    exportPage, debounce, clearSearch, onSort,  deleteItem,       } = page.methods;
	
	function getActionMenuModel(data){
		return [
		{
			label: "View",
			to: `/assistance/view/${data.id}`,
			icon: "pi pi-eye",
			visible: auth.canView('assistance/view')
		},
		{
			label: "Edit",
			to: `/assistance/edit/${data.id}`,
			icon: "pi pi-pencil",
			visible: auth.canView('assistance/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('assistance/delete')
		},
		{
			label: "Asistencia",
			command: (event) => { app.openPageDialog({ page:'assistance/confirmation_page', url: `/assistance/confirmation_page/${data.id}`, closeBtn: true }) },
			icon: "pi pi-check",
			visible: auth.canView('assistance/confirmation_page')
		},
		{
			label: "Registrar",
			to: `/assistance/add_user_page`,
			icon: "pi pi-calendar",
			visible: auth.canView('assistance/add_user_page')
		}
	]
	}
	
	onMounted(()=>{ 
		const pageTitle = "Assistance";
		app.setPageTitle(props.routeName, pageTitle);
	});
</script>
<style scoped>
</style>
