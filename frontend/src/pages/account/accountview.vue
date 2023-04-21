<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="col comp-grid" >
                            <div >
                                <div class="mb-4 card surface-100">
                                    <div class="grid align-items-center">
                                        <div class="col-fixed" style="width:180x">
                                            <image-viewer class="border-round" style="max-width:100%;max-height:100px" width="auto" height="auto" image-size="medium" :src="auth.userPhoto" />
                                        </div>
                                        <div class="col">
                                            <div class="text-3xl font-bold text-primary"> {{ auth.userName }} </div>
                                            <div class="text-gray-500"> {{ auth.userEmail }} </div>
                                            <div class="text-sm text-500 text-capitalize py-2" v-if="auth.userRole">{{ auth.userRole}}</div>
                                        </div>
                                    </div>
                                </div>
                                <TabView v-model:activeIndex="activeTab">
                                    <TabPanel>
                                        <template #header>
                                            <i class="pi pi-user mr-2"></i>
                                            <span>Account Detail</span>
                                        </template>
                                        <div class="mb-3 grid justify-content-start">
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Id</div>
                                                        <div class="font-bold">{{ item.id }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Name</div>
                                                        <div class="font-bold">{{ item.name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Lastname</div>
                                                        <div class="font-bold">{{ item.lastname }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Type</div>
                                                        <div class="font-bold">{{ item.type }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Username</div>
                                                        <div class="font-bold">{{ item.username }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Email</div>
                                                        <div class="font-bold">{{ item.email }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Status</div>
                                                        <div class="font-bold">{{ item.status }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Schedule</div>
                                                        <div class="font-bold">{{ item.schedule }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 md:col-4">
                                                <div class="card flex gap-3 align-items-center p-3 ">
                                                    <div class="">
                                                        <div class="text-400 font-medium mb-1">Mobile</div>
                                                        <div class="font-bold">{{ item.mobile }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </TabPanel>
                                    <TabPanel>
                                        <template #header>
                                            <i class="pi pi-pencil  mr-2"></i>
                                            <span>Edit Account</span>
                                        </template>
                                        <div class="reset-grid">
                                            <account-edit-page is-sub-page></account-edit-page>
                                            </div>
                                        </TabPanel>
                                        <TabPanel>
                                            <template #header>
                                                <i class="pi pi-lock  mr-2"></i>
                                                <span>Change Password</span>
                                            </template>
                                            <div class="reset-grid">
                                                <change-password-page is-sub-page></change-password-page>
                                            </div>
                                        </TabPanel>
                                    </TabView>
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
	import {  ref, toRefs, onMounted } from 'vue';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import  AccountEditPage  from "./accountedit.vue";
	import  ChangePasswordPage  from "./changepassword.vue";
	import { useViewPage } from 'src/composables/viewpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		id: [String, Number],
		primaryKey: {
			type: String,
			default: 'id',
		},
		pageStoreKey: {
			type: String,
			default: 'ACCOUNT',
		},
		pageName: {
			type: String,
			default: 'user',
		},
		routeName: {
			type: String,
			default: 'useraccountview',
		},
		apiPath: {
			type: String,
			default: 'account',
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
		},
	});
	const store = usePageStore(props.pageStoreKey);
	const app = useApp(props);
	const auth = useAuth();
	const page = useViewPage({ store, props });
	const activeTab = ref(0);
	const { currentRecord } = toRefs(store.state);
	const { loading, pageReady } = toRefs(page.state);
	const item = currentRecord;
	const { load, deleteItem, } = page.methods;
	function getActionMenuModel(data){
		return [
		{
			label: "Edit",
			command: (event) => { app.openPageDialog({ page:'user/edit', url: `/user/edit/${data.id}`, closeBtn: true }) },
			icon: "pi pi-pencil",
			visible: auth.canView('user/edit')
		},
		{
			label: "Delete",
			command: (event) => { deleteItem(data.id) },
			icon: "pi pi-trash",
			visible: auth.canView('user/delete')
		}
	]
	}
	onMounted(()=>{
		const pageTitle = "My Account";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
</script>
<style scoped>
</style>
