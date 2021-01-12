import Vue from "vue"
import Vuex from "vuex"
Vue.use(Vuex)

export default new Vuex.Store({
    state: { // stateResources - bazaga joylanadigan ruxsatlar strukturasi ya`ni shu shablon orqali bazaga ma`lumotlar joylanadi 
        stateResources: [
                            {resourceName: 'Home', read:false, write: false, update: false, delete: false, url: '/', iconUrl: "ios-home-outline"},
                            {resourceName: 'Tags', read:false, write: false, update: false, delete: false, url: 'tags', iconUrl: "ios-pricetag"},
                            {resourceName: 'Category', read:false, write: false, update: false, delete: false, url: 'category', iconUrl: "logo-dropbox"},
                            {resourceName: 'Create Blogs', read:false, write: false, update: false, delete: false, url: 'createBlog', iconUrl: "logo-dropbox"},
                            {resourceName: 'Adminusers', read:false, write: false, update: false, delete: false, url: 'adminusers', iconUrl: "md-person"},
                            {resourceName: 'Role', read:false, write: false, update: false, delete: false, url: 'role', iconUrl: "ios-clipboard"},
                            {resourceName: 'AssignRole', read:false, write: false, update: false, delete: false, url: 'assignRole', iconUrl: "md-checkbox"},
                        ],
        user: false,//Authdan o`tilgan bo`lsa true bo`ladi
        userPermission: null //bunda o`zi bazadan olingan ma`lumot bo`ladi, shunga qarab menyular tugmalar joylanadi
    },
    
    getters: {
        getUserPermission(state){
            return state.userPermission
        }
    },

    mutations: {
        setUpdateUser(state, data){
            state.user = data
        },

        setUserPermission(state, data){
            state.userPermission = data
        }
    },

    actions :{
        
    }
})