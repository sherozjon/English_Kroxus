import { identity } from "lodash";
import {mapGetters} from "vuex"

export default {
    data(){
        return {
            
        }
    },

    methods: {
      async callApi(method, url, dataObj){
          try{ 
            return await axios({
                method: method,
                url: url,
                data: dataObj
              });
          }catch(e){
            return e.response
          }
      },
    i (desc, title="Hey") {
        this.$Notice.info({
            title: title,
            desc: desc
        });
    },
    s (desc, title="Great") {
        this.$Notice.success({
            title: title,
            desc: desc
        });
    },
    w (desc, title="Oops!") {
        this.$Notice.warning({
            title: title,
            desc: desc
        });
    },
    e (desc, title="Oopsss!") {
        this.$Notice.error({
            title: title,
            desc: desc
        });
    },
    swr (desc="Something went wrong!", title="Oops!") {
        this.$Notice.error({
            title: title,
            desc: desc
        });
    },

    dataCorrect(data){
        let data1 = data.slice(0, 10)
        let clock = data.slice(11, 16)
        return data1 + " " + clock
    },

    checkUserPermission(key){
        if(!this.userPermission) return false
        let isPermitted = false
        for(let d of this.userPermission){
            if(this.$route.name == d.url){
                if(d[key]) isPermitted = true
                break
            }
        }
        return isPermitted
    }

    },
    
    computed: {
        ...mapGetters({
            "userPermission" : "getUserPermission"
        }), 

        isReadPermitted(){
            return this.checkUserPermission("read")
        },
        isWritePermitted(){
            return this.checkUserPermission("write")
        },
        isUpdatePermitted(){
            return this.checkUserPermission("update")
        },
        isDeletePermitted(){
            return this.checkUserPermission("delete")
        },
        

    },
}