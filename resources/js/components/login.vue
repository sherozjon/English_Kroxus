<template>
<div>
    
    <Card style="width:350px; height: 20vh; margin: 10px; top:30vh;right:-80vh">
        
        <div>
           <Form ref="formInline" :model="formInline" :rules="ruleInline" inline>
                <FormItem prop="email">
                    <Input type="text" v-model="formInline.email" placeholder="E-mail">
                        <Icon type="ios-person-outline" slot="prepend"></Icon>
                    </Input>
                </FormItem>
                <br>
                <FormItem prop="password">
                    <Input type="password" v-model="formInline.password" placeholder="Password">
                        <Icon type="ios-lock-outline" slot="prepend"></Icon>
                    </Input>
                </FormItem>
                <FormItem>
                    <Button type="primary" @click="handleSubmit('formInline')">Signin</Button>
                </FormItem>
            </Form> 
        </div>
        <router-link to="/register" slot="extra">
            Register
        </router-link>
    </Card>
</div>
</template>
<script>
export default {
    data () {
            return {
                formInline: {
                    email: '',
                    password: '',
                },
                ruleInline: {
                    email: [
                        { required: true, message: 'Mailbox cannot be empty', trigger: 'blur' },
                        { type: 'email', message: 'Incorrect email format', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: 'Please fill in the password.', trigger: 'blur' },
                        { type: 'string', min: 6, message: 'The password length cannot be less than 6 bits', trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            handleSubmit(name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        this.dataSubmit()
                    } else {
                        this.e('You Fail fill area !');
                    }
                })
            },
            async dataSubmit(){
                const res = await this.callApi("post", "user/login_user", this.formInline)
                if(res.status == 200){
                    this.s("You have successfully pass login")
                    window.location = '/'
                }else{
                    if(res.status == 422){
                        for(let i in res.data.errors){
                            this.e(res.data.errors[i][0])
                        }
                    }else{
                        if(res.status)
                        this.swr()//Qandaydir Xatolik bo`lsa notice da chiqaradi
                    }
                }
                }
        }
    }
</script>
