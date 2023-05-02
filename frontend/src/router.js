
import { createRouter, createWebHashHistory } from 'vue-router';

import { useAuth } from 'src/composables/auth';


let routes = [
	//Dashboard routes


//assistance routes
			{
				path: '/assistance/:index?/:fieldName?/:fieldValue?',
				name: 'assistancelist',
				component: () => import('./pages/assistance/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/assistance/view/:id', 
				name: 'assistanceview', 
				component: () => import('./pages/assistance/view.vue'), 
				props: true
			},
	
			{ 
				path: '/assistance/add', 
				name: 'assistanceadd', 
				component: () => import('./pages/assistance/add.vue'), 
				props: true
			},
	
			{ 
				path: '/assistance/edit/:id', 
				name: 'assistanceedit', 
				component: () => import('./pages/assistance/edit.vue'), 
				props: true
			},
		
			{ 
				path: '/assistance/confirmation_page/:id', 
				name: 'assistanceconfirmation_page', 
				component: () => import('./pages/assistance/confirmation_page.vue'), 
				props: true
			},
		
			{ 
				path: '/assistance/add_user_page', 
				name: 'assistanceadd_user_page', 
				component: () => import('./pages/assistance/add_user_page.vue'), 
				props: true
			},
	
			{
				path: '/assistance/list_class/:index?/:fieldName?/:fieldValue?',
				name: 'assistancelist_class',
				component: () => import('./pages/assistance/list_class.vue'), 
				props: true
			},
			
	

//assistance_confirmation routes
			{
				path: '/assistance_confirmation/:index?/:fieldName?/:fieldValue?',
				name: 'assistance_confirmationlist',
				component: () => import('./pages/assistance_confirmation/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/assistance_confirmation/view/:id', 
				name: 'assistance_confirmationview', 
				component: () => import('./pages/assistance_confirmation/view.vue'), 
				props: true
			},
	
			{ 
				path: '/assistance_confirmation/add', 
				name: 'assistance_confirmationadd', 
				component: () => import('./pages/assistance_confirmation/add.vue'), 
				props: true
			},
	
			{ 
				path: '/assistance_confirmation/edit/:id', 
				name: 'assistance_confirmationedit', 
				component: () => import('./pages/assistance_confirmation/edit.vue'), 
				props: true
			},
		

//classes routes
			{
				path: '/classes/:index?/:fieldName?/:fieldValue?',
				name: 'classeslist',
				component: () => import('./pages/classes/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/classes/view/:id', 
				name: 'classesview', 
				component: () => import('./pages/classes/view.vue'), 
				props: true
			},
	
			{ 
				path: '/classes/add', 
				name: 'classesadd', 
				component: () => import('./pages/classes/add.vue'), 
				props: true
			},
	
			{ 
				path: '/classes/edit/:id', 
				name: 'classesedit', 
				component: () => import('./pages/classes/edit.vue'), 
				props: true
			},
		
			{ 
				path: '/classes/view_assis/:id', 
				name: 'classesview_assis', 
				component: () => import('./pages/classes/view_assis.vue'), 
				props: true
			},
		

//classes_modality routes
			{
				path: '/classes_modality/:index?/:fieldName?/:fieldValue?',
				name: 'classes_modalitylist',
				component: () => import('./pages/classes_modality/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/classes_modality/view/:id', 
				name: 'classes_modalityview', 
				component: () => import('./pages/classes_modality/view.vue'), 
				props: true
			},
	
			{ 
				path: '/classes_modality/add', 
				name: 'classes_modalityadd', 
				component: () => import('./pages/classes_modality/add.vue'), 
				props: true
			},
	
			{ 
				path: '/classes_modality/edit/:id', 
				name: 'classes_modalityedit', 
				component: () => import('./pages/classes_modality/edit.vue'), 
				props: true
			},
		

//classes_status routes
			{
				path: '/classes_status/:index?/:fieldName?/:fieldValue?',
				name: 'classes_statuslist',
				component: () => import('./pages/classes_status/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/classes_status/view/:id', 
				name: 'classes_statusview', 
				component: () => import('./pages/classes_status/view.vue'), 
				props: true
			},
	
			{ 
				path: '/classes_status/add', 
				name: 'classes_statusadd', 
				component: () => import('./pages/classes_status/add.vue'), 
				props: true
			},
	
			{ 
				path: '/classes_status/edit/:id', 
				name: 'classes_statusedit', 
				component: () => import('./pages/classes_status/edit.vue'), 
				props: true
			},
		

//cycle routes
			{
				path: '/cycle/:index?/:fieldName?/:fieldValue?',
				name: 'cyclelist',
				component: () => import('./pages/cycle/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/cycle/view/:id', 
				name: 'cycleview', 
				component: () => import('./pages/cycle/view.vue'), 
				props: true
			},
	
			{ 
				path: '/cycle/add', 
				name: 'cycleadd', 
				component: () => import('./pages/cycle/add.vue'), 
				props: true
			},
	
			{ 
				path: '/cycle/edit/:id', 
				name: 'cycleedit', 
				component: () => import('./pages/cycle/edit.vue'), 
				props: true
			},
		

//permissions routes
			{
				path: '/permissions/:index?/:fieldName?/:fieldValue?',
				name: 'permissionslist',
				component: () => import('./pages/permissions/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/permissions/view/:id', 
				name: 'permissionsview', 
				component: () => import('./pages/permissions/view.vue'), 
				props: true
			},
	
			{ 
				path: '/permissions/add', 
				name: 'permissionsadd', 
				component: () => import('./pages/permissions/add.vue'), 
				props: true
			},
	
			{ 
				path: '/permissions/edit/:id', 
				name: 'permissionsedit', 
				component: () => import('./pages/permissions/edit.vue'), 
				props: true
			},
		

//schedule routes
			{
				path: '/schedule/:index?/:fieldName?/:fieldValue?',
				name: 'schedulelist',
				component: () => import('./pages/schedule/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/schedule/view/:id', 
				name: 'scheduleview', 
				component: () => import('./pages/schedule/view.vue'), 
				props: true
			},
	
			{ 
				path: '/schedule/add', 
				name: 'scheduleadd', 
				component: () => import('./pages/schedule/add.vue'), 
				props: true
			},
	
			{ 
				path: '/schedule/edit/:id', 
				name: 'scheduleedit', 
				component: () => import('./pages/schedule/edit.vue'), 
				props: true
			},
		

//schedule_name routes
			{
				path: '/schedule_name/:index?/:fieldName?/:fieldValue?',
				name: 'schedule_namelist',
				component: () => import('./pages/schedule_name/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/schedule_name/view/:id', 
				name: 'schedule_nameview', 
				component: () => import('./pages/schedule_name/view.vue'), 
				props: true
			},
	
			{ 
				path: '/schedule_name/add', 
				name: 'schedule_nameadd', 
				component: () => import('./pages/schedule_name/add.vue'), 
				props: true
			},
	
			{ 
				path: '/schedule_name/edit/:id', 
				name: 'schedule_nameedit', 
				component: () => import('./pages/schedule_name/edit.vue'), 
				props: true
			},
		
			{ 
				path: '/schedule_name/view_page_user/:id', 
				name: 'schedule_nameview_page_user', 
				component: () => import('./pages/schedule_name/view_page_user.vue'), 
				props: true
			},
		

//user routes
			{
				path: '/user/:index?/:fieldName?/:fieldValue?',
				name: 'userlist',
				component: () => import('./pages/user/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/user/view/:id', 
				name: 'userview', 
				component: () => import('./pages/user/view.vue'), 
				props: true
			},
	
			{ 
				path: '/account/edit', 
				name: 'useraccountedit', 
				component: () => import('./pages/account/accountedit.vue'), 
				props: true
			},
	
			{ 
				path: '/account', 
				name: 'useraccountview', 
				component: () => import('./pages/account/accountview.vue'), 
				props: true
			},
	
			{ 
				path: '/user/add', 
				name: 'useradd', 
				component: () => import('./pages/user/add.vue'), 
				props: true
			},
	
			{ 
				path: '/user/edit/:id', 
				name: 'useredit', 
				component: () => import('./pages/user/edit.vue'), 
				props: true
			},
		

//user_status routes
			{
				path: '/user_status/:index?/:fieldName?/:fieldValue?',
				name: 'user_statuslist',
				component: () => import('./pages/user_status/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/user_status/view/:id', 
				name: 'user_statusview', 
				component: () => import('./pages/user_status/view.vue'), 
				props: true
			},
	
			{ 
				path: '/user_status/add', 
				name: 'user_statusadd', 
				component: () => import('./pages/user_status/add.vue'), 
				props: true
			},
	
			{ 
				path: '/user_status/edit/:id', 
				name: 'user_statusedit', 
				component: () => import('./pages/user_status/edit.vue'), 
				props: true
			},
		

//user_types routes
			{
				path: '/user_types/:index?/:fieldName?/:fieldValue?',
				name: 'user_typeslist',
				component: () => import('./pages/user_types/list.vue'), 
				props: true
			},
			
	
			{ 
				path: '/user_types/view/:id', 
				name: 'user_typesview', 
				component: () => import('./pages/user_types/view.vue'), 
				props: true
			},
	
			{ 
				path: '/user_types/add', 
				name: 'user_typesadd', 
				component: () => import('./pages/user_types/add.vue'), 
				props: true
			},
	
			{ 
				path: '/user_types/edit/:id', 
				name: 'user_typesedit', 
				component: () => import('./pages/user_types/edit.vue'), 
				props: true
			},
		

			{ 
				path: '/classes_viewusuario', 
				name: 'classes_viewusuario', 
				component: () => import('././pages/custom/classes_viewusuario.vue'), 
				props: true
			},
	
	
	
//Password reset routes
			{ 
				path: '/index/forgotpassword', 
				name: 'forgotpassword', 
				component: () => import('./pages/index/forgotpassword.vue'), 
				props: true
			},
			{ 
				path: '/index/resetpassword', 
				name: 'resetpassword', 
				component: () => import('./pages/index/resetpassword.vue'), 
				props: true
			},
			{ 
				path: '/index/resetpassword_completed', 
				name: 'resetpassword_completed', 
				component: () => import('./pages/index/resetpassword_completed.vue'), 
				props: true
			},
	
	
	
	{ 
		path:  '/error/forbidden', 
		name: 'forbidden', 
		component: () => import('./pages/errors/forbidden.vue'),
		props: true
	},
	{ 
		path: '/error/notfound', 
		name: 'notfound',
		component: () => import('./pages/errors/pagenotfound.vue'),
		props: true
	},
	{
		path: '/:catchAll(.*)', 
		component: () => import('./pages/errors/pagenotfound.vue')
	}
];

export default () => {
	
const auth = useAuth();

	
	const user = auth.user;
	if(user){
		const roleName = auth.userRole.toLowerCase();
		let rolePage;
		switch(roleName){
			case "alumno":
				rolePage = "alumno";
				break;
			case "maestro":
				rolePage = "maestro";
				break;
			default:
				rolePage = "home";
		}
		
		//Dashboard route
		//Display page based on user role
		routes.push({
			path: '/',
			alias: '/home', 
			name: 'home', 
			component: () => import(`./pages/home/${rolePage}.vue`),
			props: true
		});
	}
	else{
		routes.push({
			path: '/', 
			alias: '/index', 
			name: 'index', 
			component: () => import('./pages/index/index.vue'),
			props: true
		});
	}

	const router = createRouter({
		history: createWebHashHistory(),
		routes,
		scrollBehavior(to, from, savedPostion){
			//if(savedPostion) return savedPostion;
			return { x:0, y:0 }
		}
	});
	
	router.beforeEach((to, from, next) => {
		const user = auth.user;
		let path = to.path;
		let authRequired = auth.pageRequiredAuth(path);
		if (authRequired) {
			if(!user){
				return next({ path: '/',  query: { nexturl: to.fullPath } });
			}
			//authorize user
			if (!auth.canView(path)) {
				return next({path: "/error/forbidden"});
			}
		}

		if(user && to.name == "index"){
			//already logged in, show home when try to access index page
			return next({ path: "/home"});
		}

		//navigate to redirect url if available
		if(to.name == "home" && to.query.nexturl){
			return next({ path: to.query.nexturl});
		}

 		//close dialog from previous page
		//store.closeDialogs('app/closeDialogs');
		
		next();
	});

	return router;
}
