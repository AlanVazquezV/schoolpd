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
                                    Edit Classes
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
                                    <!--[form-content-start]-->
                                    <div class="grid">
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Nombre 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlname" v-model.trim="formData.name"  label="Nombre" type="text" placeholder="Ingresa nombre de la clase"      
                                                    class=" w-full" :class="getErrorClass('name')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('name')" class="p-error">{{ getFieldError('name') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Descripcion 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrldescription" v-model.trim="formData.description"  label="Descripcion" type="text" placeholder="Ingresar descripcion de la clase"      
                                                    class=" w-full" :class="getErrorClass('description')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('description')" class="p-error">{{ getFieldError('description') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Banner 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <div class="mb-3">
                                                        <Uploader :class="getErrorClass('banner')" :auto="true" :fileLimit="1" :maxFileSize="3000000" accept=".jpg,.png,.gif,.jpeg" :multiple="false" style="width:100%" label="Choose files or drop files here" upload-path="fileuploader/upload/banner" v-model="formData.banner"></Uploader>
                                                    </div>
                                                    <small v-if="isFieldValid('banner')" class="p-error">{{ getFieldError('banner') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Ciclo escolar 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/cycle_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('cycle')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlcycle"  v-model="formData.cycle" :options="req.response" label="Ciclo escolar"  placeholder="Ingresar el ciclo escolar" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('cycle')" class="p-error">{{ getFieldError('cycle') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Estatus 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/status_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('status')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlstatus"  v-model="formData.status" :options="req.response" label="Estatus"  placeholder="Ingresar el estatus de la clase" >
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
                                                    Modalidad 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <api-data-source   api-path="components_data/modality_option_list" >
                                                        <template v-slot="req">
                                                            <Dropdown  class="w-full" :class="getErrorClass('modality')"   :loading="req.loading"   optionLabel="label" optionValue="value" ref="ctrlmodality"  v-model="formData.modality" :options="req.response" label="Modalidad"  placeholder="Ingresar la modalidad de la clase" >
                                                            </Dropdown> 
                                                            <small v-if="isFieldValid('modality')" class="p-error">{{ getFieldError('modality') }}</small> 
                                                        </template>
                                                    </api-data-source>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Hora de clase 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <Calendar  :showButtonBar="true" class="w-full" :class="getErrorClass('time')" v-model="formData.time"     :showTime="true" :timeOnly="true"      />
                                                    <small v-if="isFieldValid('time')" class="p-error">{{ getFieldError('time') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="formgrid grid">
                                                <div class="col-12 md:col-3">
                                                    Lugar 
                                                </div>
                                                <div class="col-12 md:col-9">
                                                    <InputText  ref="ctrlplace" v-model.trim="formData.place"  label="Lugar" type="text" placeholder="Ingrese el salon o Url de la clase"      
                                                    class=" w-full" :class="getErrorClass('place')">
                                                    </InputText>
                                                    <small v-if="isFieldValid('place')" class="p-error">{{ getFieldError('place') }}</small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[form-content-end]-->
                                    <div v-if="showSubmitButton" class="text-center my-3">
                                        <Button type="submit" label="Update" icon="pi pi-send" :loading="saving" />
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
	import { required, numeric, } from 'src/services/validators';
	import { useApp } from 'src/composables/app.js';
	import { useEditPage } from 'src/composables/editpage.js';
	import { usePageStore } from 'src/store/page';
	const props = defineProps({
		id: [String, Number],
		pageStoreKey: {
			type: String,
			default: 'CLASSES',
		},
		pageName: {
			type: String,
			default: 'classes',
		},
		routeName: {
			type: String,
			default: 'classesedit',
		},
		pagePath: {
			type : String,
			default : 'classes/edit',
		},
		apiPath: {
			type: String,
			default: 'classes/edit',
		},
		submitButtonLabel: {
			type: String,
			default: "Update",
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
			default: "Record updated successfully",
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
		description: "", 
		banner: "", 
		cycle: "", 
		status: "", 
		modality: "", 
		time: new Date(), 
		place: "", 
	}, props.pageData);
	
	const formData = reactive({ ...formDefaultValues });
	
	function afterSubmit(response) {
		app.flashMsg(props.msgTitle, props.msgAfterSave);
		if(app.isDialogOpen()){
			app.closeDialogs(); // if page is open as dialog, close dialog
		}
		else if(props.redirect) {
			app.navigateTo(`/classes`);
		}
	}
	
	// form validation rules
	const rules = computed(() => {
		return {
			name: {  },
			description: {  },
			banner: {  },
			cycle: { numeric },
			status: { numeric },
			modality: { numeric },
			time: {  },
			place: {  }
		}
	});
	
	const page = useEditPage({store, props, formData, rules, afterSubmit });
	
	const {  currentRecord: editRecord } = toRefs(store.state);
	const {  pageReady, saving, loading, } = toRefs(page.state);
	
	const { apiUrl } = page.computedProps;
	
	const { load, submitForm, getErrorClass, getFieldError, isFieldValid,  } = page.methods;
	
	onMounted(()=>{
		const pageTitle = "Edit Classes";
		app.setPageTitle(props.routeName, pageTitle); // set browser page title
	});
</script>
<style scoped>
</style>
