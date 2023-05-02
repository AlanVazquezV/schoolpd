<template>
    <main class="main-page"  id="">
        <template v-if="pageReady">
            <section class="page-section " >
                <div class="container">
                    <div class="grid ">
                        <div  class="md:col-9 sm:col-12 comp-grid" >
                            <div >
                                <form ref="observer"  tag="form" @submit.prevent="submitForm()" :class="{ 'card ': !isSubPage }" class=" ">
                                    <!--[form-content-start]-->
                                    <div class="grid">
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Nombre *
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
                                                    Apellido *
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
                                                    Usuario *
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlusername" v-model.trim="formData.username"  label="Usuario" type="text" placeholder="Ingresar Usuario"      
                                                    class=" w-full" :class="getErrorClass('username')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('username')" class="p-error">{{ getFieldError('username') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Celular *
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
                                                    Image 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <div class="mb-3">
                                                        <Uploader :class="getErrorClass('image')" :auto="true" :fileLimit="1" :maxFileSize="3000000" accept=".jpg,.png,.gif,.jpeg" :multiple="false" style="width:100%" label="Escoge una imagen o suelta una aqui" upload-path="fileuploader/upload/image" v-model="formData.image"></Uploader>
                                                    </div>
                                                    <small v-if="isFieldValid('image')" class="p-error">{{ getFieldError('image') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[form-content-end]-->
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button type="submit" label="Editar" icon="pi pi-send" :loading="saving" />
                                    </div>
                                </form>
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
	import {  computed,  reactive, toRefs, onMounted } from 'vue';
	import { required } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useEditPage } from 'src/composables/editpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		id: [String, Number],
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
			default: 'useraccountedit',
		},
		pagePath: {
			type : String,
			default : 'account/edit',
		},
		apiPath: {
			type: String,
			default: 'account/edit',
		},
		submitButtonLabel: {
			type: String,
			default: "Editar",
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
			default: "Update Record",
		},
		msgBeforeSave: {
			type: String,
			default: "",
		},
		msgAfterSave: {
			type: String,
			default: "Se ha editado correctamente.",
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
	});
	
	const store = usePageStore(props.pageStoreKey);
	const app = useApp();
	
	const formDefaultValues = Object.assign({
		name: "", 
		lastname: "NULL", 
		username: "NULL", 
		mobile: "", 
		image: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		location.reload();
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			name: { required },
			lastname: { required },
			username: { required },
			mobile: { required },
			image: {  }
		}
	});
	
	const page = useEditPage({store, props, formData, rules, afterSubmit });
	
	const {  currentRecord: editRecord } = toRefs(store.state);
	const {  pageReady, saving, loading, } = toRefs(page.state);
	
	const { apiUrl } = page.computedProps;
	
	const { load, submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Mi cuenta de usuario";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
</script>
<style scoped>
</style>
