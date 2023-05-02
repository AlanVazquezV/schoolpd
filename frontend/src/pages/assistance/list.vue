<template>
    <main class="main-page"  id="">
        <template v-if="showHeader">
            <section class="page-section mb-3" >
                <div class="container-fluid">
                    <div class="grid justify-content-between align-items-center">
                        <div  class="col " >
                            <div class=" text-2xl text-primary font-bold" >
                                Asistencia
                            </div>
                        </div>
                        <div  class="col-12 md:col-3 " >
                            <template v-if="auth.canView('/assistance/add')">
                                <router-link :to="`/assistance/add`">
                                    <Button label="Add New Assistance" icon="pi pi-plus" type="button" class="p-button bg-primary "  />
                                </router-link>
                            </template>
                        </div>
                        <div  class="col-12 md:col-5 lg:col-4 " >
                            <div :class="{ 'card ': !isSubPage }" class="">
                                <div class=" font-bold text-primary" >
                                    Filter by Date
                                </div>
                                <div class="mt-2">
                                    <Calendar :showIcon="true" :manualInput="false" :showButtonBar="true" dateFormat="yy-mm-dd" hourFormat="24" class="w-full" selectionMode="single" v-model="filters.assistance_date.value" placeholder="Select date"    />
                                </div>
                            </div>
                        </div>
                        <div  class="col-12 comp-grid" >
                        </div>
                    </div>
                </div>
            </section>
        </template>
        <section class="page-section " >
            <div class="container-fluid">
                <div class="grid ">
                    <div  class="col comp-grid" >
                        <div >
                            <template v-if="showBreadcrumbs && $route.query.tag && !isSubPage">
                                <Breadcrumb :home="{icon: 'pi pi-home', to: '/assistance'}" :model="pageBreadCrumb" />
                            </template>
                            <!-- page records template -->
                            <div class="page-records"  >
                                <DataTable :lazy="true"   :loading="loading"    v-model:selection="selectedItems"
                                     :value="records" dataKey="id" @sort="onSort($event)" class="" :showGridlines="false" :rowHover="true" responsiveLayout="stack">
                                    <Column selectionMode="multiple" headerStyle="width: 2rem" />
                                        <Column  field="id" header="Id" >
                                            <template #body="{data}">
                                                <router-link :to="`/assistance/view/${data.id}`">
                                                    {{ data.id }}
                                                </router-link>
                                            </template>
                                        </Column>
                                        <Column  field="date" header="Date" >
                                            <template #body="{data}">
                                                {{ data.date }}
                                            </template>
                                        </Column>
                                        <Column  field="classes_name" header="Classes Name" >
                                            <template #body="{data}">
                                                {{ data.classes_name }}
                                            </template>
                                        </Column>
                                        <Column  field="user_name" header="User Name" >
                                            <template #body="{data}">
                                                {{ data.user_name }}
                                            </template>
                                        </Column>
                                        <Column  field="assistance_confirmation_label" header="Assistance Confirmation Label" >
                                            <template #body="{data}">
                                                {{ data.assistance_confirmation_label }}
                                            </template>
                                        </Column>
                                        <Column  headerStyle="width: 2rem" headerClass="text-center">
                                            <template #body="{data}">
                                                <div class="flex justify-content-end">
                                                    <SplitButton dropdownIcon="pi pi-bars" class="p-button dropdown-only p-button-text p-button-plain" :model="getActionMenuModel(data)">
                                                        <i></i>
                                                    </SplitButton>
                                                </div>
                                            </template>
                                        </Column>
                                    </DataTable>
                                </div>
                                <!-- page loading indicator -->
                                <template v-if="loading">
                                </template>
                                <!-- end of page loading indicator-->
                                <!-- Empty record -->
                                <template v-if="pageReady && !records.length">
                                    <div class="p-3 my-3 text-500 text-lg font-medium text-center">
                                        No record found
                                    </div>
                                </template>
                                <!-- end of empty record-->
                                <!-- pagination component-->
                                <template v-if="showFooter && pageReady">
                                    <div class="flex justify-content-between align-items-center">
                                        <div class="flex justify-content-center flex-grow-0">
                                            <template v-if="auth.canView('assistance/delete')">
                                                <div v-if="selectedItems.length" class="m-2">
                                                    <Button @click="deleteItem(selectedItems)" icon="pi pi-trash" class="p-button-danger" title="Delete Selected" />
                                                </div>
                                            </template>
                                        </div>
                                        <div v-if="paginate && totalPages > 1" class="flex-grow-1">
                                            <Paginator class="border-none bg-transparent py-3" :first="recordsPosition - 1" @page="(event)=>{pagination.page = event.page + 1}" :rows="pagination.limit" :totalRecords="totalRecords">
                                                <template #start>
                                                    <span class="text-sm text-gray-500 px-2">
                                                    Records <b>{{ recordsPosition }} of {{ totalRecords }}</b>
                                                    </span>
                                                </template>
                                                <template #end>
                                                </template>
                                            </Paginator>
                                        </div>
                                    </div>
                                </template>
                                <!-- end of pagination component-->
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
			default: 'ASSISTANCE',
		},
		pageName: {
			type: String,
			default : 'assistance',
		},
		routeName: {
			type: String,
			default: 'assistancelist',
		},
		apiPath: {
			type: String,
			default: 'assistance/index',
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
			assistance_date: {
				value: '',
				valueType: 'single-date',
				options: [],
			}
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
	const { pageReady, loading, searchText, } = toRefs(page.state);
	
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
