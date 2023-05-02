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
                                    Registro de alumno en clase
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
                                <form ref="observer" tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <div class="grid">
                                        <div class="md:col-5 col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Usuario Id 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrluser" v-model.trim="formData.user"  label="Usuario Id" type="number" placeholder="Enter Usuario Id"   step="any" list="user_list"  readonly  
                                                    class=" w-full" :class="getErrorClass('user')">
                                                    </InputText>
                                                    <api-data-source   api-path="components_data/user_option_list" >
                                                        <template v-slot="req">
                                                            <datalist id="user_list">
                                                            <option v-for="(menu, index) in req.response" :key="index" :value="menu.value">{{ menu.label }}</option>
                                                            </datalist>
                                                        </template>
                                                    </api-data-source>
                                                    <small v-if="isFieldValid('user')" class="p-error">{{ getFieldError('user') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:col-7 col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Clase 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/classes_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('classes')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlclasses"  v-model="formData.classes" :options="req.response" label="Clase"  placeholder="Select a value ..." >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('classes')" class="p-error">{{ getFieldError('classes') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Fecha de la clase 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('date')" dateFormat="yy-mm-dd" v-model="formData.date" :showIcon="true"     mask="YYYY-MM-DD"      />
                                                    <small v-if="isFieldValid('date')" class="p-error">{{ getFieldError('date') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button class="p-button-primary" type="submit" label="Submit" icon="pi pi-send" :loading="saving" />
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
	import { required, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useAuth } from 'src/composables/auth';
	import { useAddPage } from 'src/composables/addpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		pageStoreKey: {
			type: String,
			default: 'ASSISTANCE',
		},
		pageName : {
			type : String,
			default : 'assistance',
		},
		routeName : {
			type : String,
			default : 'assistanceadd_user_page',
		},
		apiPath : {
			type : String,
			default : 'assistance/add_user_page',
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
		pageData: { // use to set formData default values from another page
			type: Object,
			default: () => {} 
		},
	});
	//lines
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	const auth = useAuth();
	
	const formDefaultValues = {
		user: auth.userId, 
		classes: "", 
		date: new Date(), 
	};
	
	const formData = reactive({ ...formDefaultValues });
	
	//vuelidate form validation rules
	const rules = computed(() => {
		return {
			user: { numeric },
			classes: { numeric },
			date: {  }
		}
	});
	
	const page = useAddPage({ store, props, formData, rules, beforeSubmit, afterSubmit });
	
	// event raised before submit form
	function beforeSubmit(){
		return true;
	}
	
	// event raised after form submited
	function afterSubmit(response) { 
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		page.setFormDefaultValues(); //reset form data
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/`);
		}
	}
	
	const {  saving, pageReady, } = toRefs(page.state);
	
	const { submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Registrar";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	
	// expose page object for other components access
	defineExpose({
		page
	});
</script>
<style scoped>
</style>
