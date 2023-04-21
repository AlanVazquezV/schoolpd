<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <template v-if="showHeader">
                <section class="page-section mb-3" >
                    <div class="container">
                        <div class="grid align-items-center">
                            <div  v-if="!isSubPage"  class="col-fixed " >
                                <Button @click="$router.go(-1)" label=""  class="p-button p-button-text " icon="pi pi-arrow-left"  />
                            </div>
                            <div  class="col " >
                                <div class=" text-2xl text-primary font-bold" >
                                    Add New User
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </template>
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="md:col-9 sm:col-12 comp-grid" >
                            <div >
                                <form ref="observer"  tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <div>
                                        <table cellpadding="3" class="p-datatable-table w-full">
                                            <thead class="p-table-head text-left">
                                                <tr>
                                                    <th>Lastname</th>
                                                    <th>Type</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Schedule</th>
                                                    <th>Mobile</th>
                                                    <th>Password</th>
                                                    <th>Confirm Password</th>
                                                    <th>Image</th>
                                                    <td style="width:30px"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(formData, row) in arrFormData" :key="row" class="input-row">
                                                    <td id="ctrl-lastname-holder">
                                                        <InputText  ref="ctrllastname" v-model.trim="formData.lastname"  label="Lastname" type="text" placeholder="Enter Lastname"      
                                                        class=" w-full" :class="getErrorClass('lastname', row)">
                                                        </InputText>
                                                        <small v-if="isFieldValid('lastname', row)" class="p-error">{{ getFieldError('lastname', row) }}</small> 
                                                    </td>
                                                    <td id="ctrl-type-holder">
                                                        <api-data-source   api-path="components_data/type_option_list" >
                                                            <template v-slot="req">
                                                                <Dropdown  class="w-full" :class="getErrorClass('type', row)"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrltype"  v-model="formData.type" :options="req.response" label="Type"  placeholder="Select a value ..." >
                                                                </Dropdown> 
                                                                <small v-if="isFieldValid('type', row)" class="p-error">{{ getFieldError('type', row) }}</small> 
                                                            </template>
                                                        </api-data-source>
                                                    </td>
                                                    <td id="ctrl-username-holder">
                                                        <check-duplicate v-model="formData.username" check-path="components_data/user_username_exist/" v-slot="checker">
                                                        <InputText  ref="ctrlusername" @blur="checker.check" :loading="checker.loading" v-model.trim="formData.username"  label="Username" type="text" placeholder="Enter Username"      
                                                        class=" w-full" :class="getErrorClass('username', row)">
                                                        </InputText>
                                                        <small v-if="isFieldValid('username', row)" class="p-error">{{ getFieldError('username', row) }}</small> 
                                                        <small v-if="!checker.loading && checker.exist" class="p-error"> Not available</small>
                                                        <small v-if="checker.loading" class="text-500">Checking...</small>
                                                        </check-duplicate>
                                                    </td>
                                                    <td id="ctrl-email-holder">
                                                        <check-duplicate v-model="formData.email" check-path="components_data/user_email_exist/" v-slot="checker">
                                                        <InputText  ref="ctrlemail" @blur="checker.check" :loading="checker.loading" v-model.trim="formData.email"  label="Email" type="email" placeholder="Enter Email"      
                                                        class=" w-full" :class="getErrorClass('email', row)">
                                                        </InputText>
                                                        <small v-if="isFieldValid('email', row)" class="p-error">{{ getFieldError('email', row) }}</small> 
                                                        <small v-if="!checker.loading && checker.exist" class="p-error"> Not available</small>
                                                        <small v-if="checker.loading" class="text-500">Checking...</small>
                                                        </check-duplicate>
                                                    </td>
                                                    <td id="ctrl-status-holder">
                                                        <api-data-source   api-path="components_data/status_option_list_2" >
                                                            <template v-slot="req">
                                                                <Dropdown  class="w-full" :class="getErrorClass('status', row)"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlstatus"  v-model="formData.status" :options="req.response" label="Status"  placeholder="Select a value ..." >
                                                                </Dropdown> 
                                                                <small v-if="isFieldValid('status', row)" class="p-error">{{ getFieldError('status', row) }}</small> 
                                                            </template>
                                                        </api-data-source>
                                                    </td>
                                                    <td id="ctrl-schedule-holder">
                                                        <api-data-source   api-path="components_data/schedule_option_list" >
                                                            <template v-slot="req">
                                                                <Dropdown  class="w-full" :class="getErrorClass('schedule', row)"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlschedule"  v-model="formData.schedule" :options="req.response" label="Schedule"  placeholder="Select a value ..." >
                                                                </Dropdown> 
                                                                <small v-if="isFieldValid('schedule', row)" class="p-error">{{ getFieldError('schedule', row) }}</small> 
                                                            </template>
                                                        </api-data-source>
                                                    </td>
                                                    <td id="ctrl-mobile-holder">
                                                        <InputText  ref="ctrlmobile" v-model.trim="formData.mobile"  label="Mobile" type="text" placeholder="Enter Mobile"      
                                                        class=" w-full" :class="getErrorClass('mobile', row)">
                                                        </InputText>
                                                        <small v-if="isFieldValid('mobile', row)" class="p-error">{{ getFieldError('mobile', row) }}</small> 
                                                    </td>
                                                    <td id="ctrl-password-holder">
                                                        <Password ref="ctrlpassword" v-model="formData.password" label="Password" placeholder="Enter Password"   
                                                        class="w-full" inputClass="w-full" toggleMask :feedback="true" :class="getErrorClass('password', row)" />
                                                        <small v-if="isFieldValid('password', row)" class="p-error">{{ getFieldError('password', row) }}</small> 
                                                    </td>
                                                    <td id="ctrl-password-holder">
                                                        <Password  class="w-full" :class="getErrorClass('confirm_password', row)" inputClass="w-full" :feedback="false" toggleMask ref="ctrlconfirmpassword" v-model="formData.confirm_password" label="Confirm Password" placeholder="Confirm Password"  />
                                                        <small v-if="isFieldValid('confirm_password', row)" class="p-error">{{ getFieldError('confirm_password', row) }}</small> 
                                                    </td>
                                                    <td id="ctrl-image-holder">
                                                        <div class="mb-3">
                                                            <Uploader :class="getErrorClass('image', row)" upload-path="fileuploader/upload/image" v-model="formData.image" :fileLimit="1" :maxFileSize="3000000" accept=".jpg,.png,.gif,.jpeg" :multiple="false" label="Choose files or drop files here" />
                                                        </div>
                                                        <small v-if="isFieldValid('image', row)" class="p-error">{{ getFieldError('image', row) }}</small> 
                                                    </td>
                                                    <th>
                                                    <Button class="p-button-outlined p-button-sm p-button-danger" v-if="arrFormData.length > minRowCount" @click="removeFormRow(row)" icon="pi pi-times" />
                                                    </th>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="100" class="text-right">
                                                    <Button v-if="arrFormData.length < maxRowCount" @click="addFormRow()" icon="pi pi-plus" class=" p-button-outlined p-button-sm" />
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div v-if="showSubmitButton" class="text-center q-my-md">
                                        <Button type="submit" label="Submit" icon="pi pi-send" :loading="saving" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </template>
    </main>
</template>
<script setup>
	import {  computed,  reactive, toRefs, onMounted } from 'vue';
	import { helpers, required, email, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useAddPage } from 'src/composables/addpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		pageStoreKey : {
			type : String,
			default : 'USER',
		},
		pageName : {
			type : String,
			default : 'user',
		},
		routeName : {
			type : String,
			default : 'useradd',
		},
		apiPath : {
			type : String,
			default : 'user/add',
		},
		submitButtonLabel: {
			type: String,
			default: "Submit",
		},
		formValidationError: {
			type: String,
			default: "Form is invalid",
		},
		formValidationMsg: {
			type: String,
			default: "Please complete the form",
		},
		msgTitle: {
			type: String,
			default: "Create Record",
		},
		msgAfterSave: {
			type: String,
			default: "Record added successfully",
		},
		msgBeforeSave: {
			type: String,
			default: "",
		},
		showHeader: {
			type: Boolean,
			default: true,
		},
		showSubmitButton: {
			type: Boolean,
			default: true,
		},
		redirect: {
			type : Boolean,
			default : true,
		},
		isSubPage: {
			type : Boolean,
			default : false,
		},
		maxRowCount: {
			type : Number,
			default: 10,
		},
		minRowCount: {
			type : Number,
			default: 1,
		},
	});
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	const formDefaultValues = {
		lastname: "NULL", 
		type: "", 
		username: "NULL", 
		email: "", 
		status: "", 
		schedule: "", 
		mobile: "NULL", 
		password: "", 
		confirm_password: "", 
		image: "", 
	};
	let arrFormData = reactive([{ ...formDefaultValues }]);
	
	//vuelidate form validation rules
	const rules = computed(() => {
		return {
			$each: helpers.forEach({
				lastname: {  },
			type: { numeric },
			username: { required },
			email: { required, email },
			status: {  },
			schedule: { numeric },
			mobile: {  },
			password: { required },
			confirm_password: {required },
			image: {  }
			})
		}
	});
	const page = useAddPage({ store,  props, formData: arrFormData, rules, beforeSubmit, afterSubmit });
	function beforeSubmit(){
		return true;
	}
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		page.setFormDefaultValues(); // reset form data
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/user`);
		}
	}
	function addFormRow() {
		arrFormData.push({ ...formDefaultValues });
	}
	function removeFormRow (index){
		arrFormData.splice(index, 1);
	}
	//page state
	const { saving, pageReady, } = toRefs(page.state);
	//page methods
	const { submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	onMounted(()=>{
		const pageTitle = "Add New User";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	// expose page object for other components access
	defineExpose({
		page
	});
</script>
<style scoped>
</style>
