require('./bootstrap');

window.Vue = require("vue")
import router from "./router.js" //Router.js papkasida Router yozilgan, shu ulanmoqda
import store from "./store.js" //Store.js fayli ulanmoqda
import ViewUI from 'view-design';//view design ulanmoqda
import 'view-design/dist/styles/iview.css'; //view designning css linki ulanmoqda
Vue.use(ViewUI); //view design oynasidan foydalanish qo`yilmoqda
import common from "./common.js";//common.js - global ishlatilish uchun funksiyalar yozilgan.
Vue.mixin(common)// common Ishlatish uchun qo`yilmoqda


Vue.component("mainapp",require("./components/mainapp.vue").default);
Vue.component("login_register",require("./components/login_register.vue").default);

const app =new Vue({
    el: "#app", //element id berilmoqda
    router, //Router router qo`yilmoqda
    store, //Store qo`yilmoqda
    
})