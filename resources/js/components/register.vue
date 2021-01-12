<template>
<div>
        
        
    <Card style="width: 50%;height: 75vh;margin: 10px;top: 20vh;left: 55vh;">
        
        <div >
            <div style="text-align: right;margin: 0 5px 0 0">
            <router-link  to="/login" slot="extra" >
                Login
            </router-link>
            </div>
           <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="80">
            <FormItem label="Name" prop="name">
                <Input v-model="formValidate.name" placeholder="Enter your name"></Input>
            </FormItem>
            <FormItem label="E-mail" prop="email">
                <Input v-model="formValidate.email" placeholder="Enter your e-mail"></Input>
            </FormItem>
            <FormItem label="Password" prop="password">
                <Input type="password" v-model="formValidate.password" placeholder="Enter your password"></Input>
            </FormItem>
            <FormItem label="Password" prop="r_password">
                <Input type="password" v-model="formValidate.r_password" placeholder="Enter the password again"></Input>
            </FormItem>
            <FormItem label="City" prop="city">
                <Select v-model="formValidate.city" placeholder="Select your city">
                    <Option value="beijing">New York</Option>
                    <Option value="shanghai">London</Option>
                    <Option value="shenzhen">Sydney</Option>
                </Select>
            </FormItem> 
            <FormItem label="Gender" prop="gender">
                <RadioGroup v-model="formValidate.gender">
                    <Radio label="male">Male</Radio>
                    <Radio label="female">Female</Radio>
                </RadioGroup>
            </FormItem>
            
            <FormItem>
                <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
                <Button @click="handleReset('formValidate')" style="margin-left: 8px">Reset</Button>
            </FormItem>
        </Form> 
        
        </div>
    </Card>
</div>
</template>
<script>
    export default {
        data () {
            return {
                formValidate: {
                    name: '',
                    email: '',
                    password: '',
                    r_password: '',
                    city: '',
                    gender: '',
                },
                ruleValidate: {
                    name: [
                        { required: true, message: 'The name cannot be empty', trigger: 'blur' }
                    ],
                    email: [
                        { required: true, message: 'Mailbox cannot be empty', trigger: 'blur' },
                        { type: 'email', message: 'Incorrect email format', trigger: 'blur' }
                    ],
                    password:[
                        {required: true, message: 'First Password cannot be empty', trigger: 'blur'}
                    ],
                    r_password:[
                        {required: true, message: 'Second Password cannot be empty', trigger: 'blur'}
                    ],
                    city: [
                        { required: true, message: 'Please select the city', trigger: 'change' }
                    ],
                    gender: [
                        { required: true, message: 'Please select gender', trigger: 'change' }
                    ],
                    
                }
            }
        },
        methods: {
            handleSubmit (name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        
                        if(this.formValidate.password != this.formValidate.r_password){
                            this.e("Two passwords are not equal to each other")
                        }else{
                            this.s('You filled in the fields correctly');
                            this.dataSubmit()
                        }
                    } else {
                        this.e('You filled in the fields NoCorrectly!');
                    }
                })
            },
            handleReset (name) {
                this.$refs[name].resetFields();
            },
            async dataSubmit(){
                const res = await this.callApi("post", "user/register_user", this.formValidate)
                if(res.status == 201){
                    this.s("You have successfully registered")
                    window.location = '/login'
                }else{
                    if(res.status==422){ //Status 422 bo`lsa ya`ni back end ning validatsiyasidan o`tmasa
                        this.e("Your Submit Data Not Validate");
                        if((res.data.errors.Name)){
                            this.e(res.data.errors.tagName[0])//back enddan data.errors.tagName dan qanday xato bo`lganini xabari keladi
                        }
                    }else{
                        this.swr()//Qandaydir Xatolik bo`lsa notice da chiqaradi
                    }
                }

            }
        }
    }
</script>
