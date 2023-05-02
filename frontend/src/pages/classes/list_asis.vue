<template>
    <main class="main-page"  id="">
        <template v-if="showHeader">
            <section class="page-section mb-3" >
                <div class="container-fluid">
                    <div class="grid justify-content-between align-items-center">
                        <div  class="col " >
                            <div class=" text-2xl text-primary font-bold" >
                                Clases
                            </div>
                        </div>
                        <div  class="col-12 md:col-3 " >
                        </div>
                        <div  class="col-12 md:col-5 lg:col-4 " >
                            <span class="p-input-icon-left w-full">
                            <i class="pi pi-search" />
                            <InputText  placeholder="Search" class="w-full" :value="searchText" @input="debounce(() => { searchText = $event.target.value })"  />
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </template>
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
                        <div class="">
                            <div class="">
                                <AssistanceListPage ref="assistanceListPage"  :limit="10" field-name="classes.name" :field-value="item.name" :show-header="true" :show-breadcrumbs="true" :show-footer="true" :paginate="true" page-store-key="SCHEDULE_NAME_VIEW_PAGE_USER-ASSISTANCE" is-sub-page>
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
	import {   toRefs, onMounted } from 'vue';
	import { usePageStore } from 'src/store/page';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { useListPage } from 'src/composables/listpage.js';
	import AssistanceListPage from "../assistance/list.vue";
	
	const props = defineProps({
		primaryKey : {
			type : String,
			default : 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'CLASSES-LIST_ASIS',
		},
		pageName: {
			type: String,
			default : 'classes',
		},
		routeName: {
			type: String,
			default: 'classeslist_asis',
		},
		apiPath: {
			type: String,
			default: 'classes/list_asis',
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
			to: `/classes/view/${data.id}`,
			icon: "pi pi-eye",
			visible: auth.canView('classes/view')
		},
		{
			label: "Edit",
			to: `/classes/edit/${data.id}`,
			icon: "pi pi-pencil",
			visible: auth.canView('classes/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('classes/delete')
		},
		{
			label: "Apartar",
			to: `/assistance/add_user_page`,
			icon: "pi pi-calendar",
			visible: auth.canView('assistance/add_user_page')
		},
		{
			label: "Lista",
			to: `/classes/list_asis`,
			icon: "pi pi-align-justify",
			visible: auth.canView('classes/list_asis')
		}
	]
	}
	
	onMounted(()=>{ 
		const pageTitle = "Clases";
		app.setPageTitle(props.routeName, pageTitle);
	});
</script>
<style scoped>
</style>
