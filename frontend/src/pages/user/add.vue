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
                                    Agregar usuario 
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
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Nombre 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlname" v-model.trim="formData.name"  label="Nombre" type="text" placeholder="Ingresar nombre"      
                                                    class=" w-full" :class="getErrorClass('name')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('name')" class="p-error">{{ getFieldError('name') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Apellido 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrllastname" v-model.trim="formData.lastname"  label="Apellido" type="text" placeholder="Ingresar apellido"      
                                                    class=" w-full" :class="getErrorClass('lastname')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('lastname')" class="p-error">{{ getFieldError('lastname') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Tipo 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/type_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('type')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrltype"  v-model="formData.type" :options="req.response" label="Tipo"  placeholder="Selecciona el tipo..." >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('type')" class="p-error">{{ getFieldError('type') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Usuario *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <check-duplicate v-model="formData.username" check-path="components_data/user_username_exist/" v-slot="checker">
                                                    <InputText  ref="ctrlusername" @blur="checker.check" :loading="checker.loading" v-model.trim="formData.username"  label="Usuario" type="text" placeholder="Ingresar usuario"      
                                                    class=" w-full" :class="getErrorClass('username')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('username')" class="p-error">{{ getFieldError('username') }}</small> 
                                                    <small v-if="!checker.loading && checker.exist" class="p-error"> Not available</small>
                                                    <small v-if="checker.loading" class="text-500">Checking...</small>
                                                    </check-duplicate>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Correo *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <check-duplicate v-model="formData.email" check-path="components_data/user_email_exist/" v-slot="checker">
                                                    <InputText  ref="ctrlemail" @blur="checker.check" :loading="checker.loading" v-model.trim="formData.email"  label="Correo" type="email" placeholder="Ingresar correo"      
                                                    class=" w-full" :class="getErrorClass('email')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('email')" class="p-error">{{ getFieldError('email') }}</small> 
                                                    <small v-if="!checker.loading && checker.exist" class="p-error"> Not available</small>
                                                    <small v-if="checker.loading" class="text-500">Checking...</small>
                                                    </check-duplicate>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Estatus 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/status_option_list_2" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('status')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlstatus"  v-model="formData.status" :options="req.response" label="Estatus"  placeholder="Seleccionar estatus ..." >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('status')" class="p-error">{{ getFieldError('status') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Horario 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/schedule_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('schedule')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlschedule"  v-model="formData.schedule" :options="req.response" label="Horario"  placeholder="Selecciona un horario ..." >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('schedule')" class="p-error">{{ getFieldError('schedule') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Celular 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlmobile" v-model.trim="formData.mobile"  label="Celular" type="text" placeholder="Ingresar celular"      
                                                    class=" w-full" :class="getErrorClass('mobile')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('mobile')" class="p-error">{{ getFieldError('mobile') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Contraseña *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Password ref="ctrlpassword" v-model="formData.password" label="Contraseña" placeholder="Ingresar contraseña"   
                                                    class="w-full" inputClass="w-full" toggleMask :feedback="true" :class="getErrorClass('password')" />
                                                    <small v-if="isFieldValid('password')" class="p-error">{{ getFieldError('password') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Confirm Password *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Password  class="w-full" :class="getErrorClass('confirm_password', row)" inputClass="w-full" :feedback="false" toggleMask ref="ctrlconfirmpassword" v-model="formData.confirm_password" label="Confirm Password" placeholder="Confirm Password"  />
                                                    <small v-if="isFieldValid('confirm_password', row)" class="p-error">{{ getFieldError('confirm_password', row) }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Imagen 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <div class="mb-3">
                                                        <Uploader :class="getErrorClass('image')" upload-path="fileuploader/upload/image" v-model="formData.image" :fileLimit="1" :maxFileSize="3000000" accept=".jpg,.png,.gif,.jpeg" :multiple="false" label="Choose files or drop files here" />
                                                    </div>
                                                    <small v-if="isFieldValid('image')" class="p-error">{{ getFieldError('image') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button class="p-button-primary" type="submit" label="Agregar" icon="pi pi-send" :loading="saving" />
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
	import { required, email, sameAs, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useAddPage } from 'src/composables/addpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		pageStoreKey: {
			type: String,
			default: 'USER',
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
			default: "Agregar",
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
	
	const formDefaultValues = {
		name: "", 
		lastname: "", 
		type: "", 
		username: "", 
		email: "", 
		status: "", 
		schedule: "", 
		mobile: "", 
		password: "", 
		confirm_password: "", 
		image: "", 
	};
	
	const formData = reactive({ ...formDefaultValues });
	
	//vuelidate form validation rules
	const rules = computed(() => {
		return {
			name: {  },
			lastname: {  },
			type: { numeric },
			username: { required },
			email: { required, email },
			status: {  },
			schedule: { numeric },
			mobile: {  },
			password: { required },
			confirm_password: {required, sameAs: sameAs(formData.password, 'Contraseña') },
			image: {  }
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
			app.navigateTo(`/user`);
		}
	}
	
	const {  saving, pageReady, } = toRefs(page.state);
	
	const { submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Agregar un nuevo usuario";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
	
	// expose page object for other components access
	defineExpose({
		page
	});
</script>
<style scoped>
</style>
