<template>
<div>
    <div class="header_content">
        <div class="space"><h2>Dictonary</h2></div>
        <Button size="large" type="primary" class="space_left border_class" @click="addModalClick"><Icon type="md-add-circle" /> Add</Button>
    </div>
    <Table class="border_class" :stripe="true" border :columns="columns7" :data="data6"></Table>


            <Modal
					v-model="addModal"
					title="Add Unit"
					:mask-closable="false"
                    :cloasable="false"
					width=500
                   
                    > 
                    <div class="space">
                        <div class="space_top">
                            <Input 
                            v-model="addData.Unit" placeholder="Enter Unit Name..." style="width: 100%" 
                            
                            />
                        </div>
                        <div class="space_top">
                            <InputNumber style="width: 15%;float: left;" :max="100" :min="1" v-model="addModalInputCount"></InputNumber>
                            <div style="width: 80%;float: right;">
                            <Button @click="ChangeIndex" type="primary">Ok</Button>
                            </div>
                        </div>
                        <div class="space_top" >
                            <div style="width: 45%;float: left;">Language1</div>
                            <div style="width: 45%;float: right;">Language2</div>
                        </div>
                        <div class="space_top"></div>
                        <div class="space_bottom" v-for="(item , i) in addData.addModalInput.items" :key="i">
                            <Input  
                            :v-model="item.language1" class="space_top" placeholder="Enter Word....." style="width: 40%;float: left;" 
                            
                            />
                            <div style="width: 50%;float: right;" >
                                <Input 
                                :v-model="item.language2" 
                                style="width: 75%;float: left;" class="space_top" placeholder="Enter Word Translation....." />
                                <Button style="width: 20%;float: right; margin:5px 0 0 5px"  type="error" @click="deleteInput(item.index)"><Icon type="md-trash" /></Button>
                            </div>
                        </div>
                    </div>


					<div slot="footer" >
						<Button class="modal_footer_button" type="default" @click="addModal=false">Cancel</Button>
						<Button class="modal_footer_button" type="primary" @click="addModal=false">Ok</Button>
					</div>
	        </Modal>
</div>
</template>
<script>
    export default {
        data () {
            return {
                addData: {
                    Unit: "",
                    addModalInput:{
                        items: [
                        {
                            language1: '',
                            language2: '',
                            index: 1,
                            status: 1
                        }
                    ]
                    },
                },
                
                addModal: false,
                addModalInputCount: 1,
                OldaddModalInputCount: 1,
                columns7: [
                    {
                        title: 'Unit',
                        key: 'unit',
                        render: (h, params) => {
                            return h('div', [
                                h('Icon', {
                                    props: {
                                        type: 'person'
                                    }
                                }),
                                h('strong', params.row.name)
                            ]);
                        }
                    },
                    {
                        title: 'Age',
                        key: 'age'
                    },
                    {
                        title: 'Address',
                        key: 'address'
                    },
                    {
                        title: 'Action',
                        key: 'action',
                        width: 200,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        size: 'large'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {
                                            this.show(params.index)
                                        }
                                    }
                                }, 'View'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'large'
                                    },
                                    on: {
                                        click: () => {
                                            this.remove(params.index)
                                        }
                                    }
                                }, 'Delete')
                            ]);
                        }
                    }
                ],
                data6: [
                    {
                        name: 'John Brown',
                        age: 18,
                        address: 'New York No. 1 Lake Park'
                    },
                    {
                        name: 'Jim Green',
                        age: 24,
                        address: 'London No. 1 Lake Park'
                    },
                    {
                        name: 'Joe Black',
                        age: 30,
                        address: 'Sydney No. 1 Lake Park'
                    },
                    {
                        name: 'Jon Snow',
                        age: 26,
                        address: 'Ottawa No. 2 Lake Park'
                    }
                ]
            }
        },
        methods: {
            show (index) {
                this.$Modal.info({
                    title: 'User Info',
                    content: `Name：${this.data6[index].name}<br>Age：${this.data6[index].age}<br>Address：${this.data6[index].address}`
                })
            },
            remove (index) {
                this.data6.splice(index, 1);
            },
            
            addModalClick(){
                this.addModal = true

            },
            ChangeIndex(){
                
                let difference = this.OldaddModalInputCount - this.addModalInputCount
                let i=0 
                if(difference<0){
                    for(i = this.OldaddModalInputCount+1; i <= this.addModalInputCount; i++){
                        this.addData.addModalInput.items.push({
                            value: '',
                            index: i,
                            status: 1
                        })
                    }
                    
                }else
                if(difference>0){
                    
                    for(i = this.OldaddModalInputCount; i >= this.addModalInputCount; i--){
                        this.addData.addModalInput.items.splice(i,1)
                    }
                }
                this.OldaddModalInputCount = this.addModalInputCount

            },
            deleteInput(j){
                this.i(this.addData.addModalInput.items[j])
                this.addData.addModalInput.items.splice(j,1)
                this.addModalInputCount -= 1
                this.OldaddModalInputCount = this.addModalInputCount
                let i=1
                for(i=1;i<=this.addModalInputCount;i++){
                    this.addData.addModalInput.items[i].index = i
                }
            }

        }
    }
</script>

<style scoped>
    .header_content{
        margin: 5px;
        width: 100%;
        display: flex;
    }

    .border_class{
        
    }

    .border_class:hover{
        transition: all .3s;
        border: 2px solid #999;
        box-shadow: 0 0 5px #000;
        border-radius: 5px;
    }

    .space{
        margin: 5px;
    }
    .space_right{
        margin: 0 5px 0 0;
    }
    .space_left{
        margin: 0 0 0 5px;
    }
    .space_top{
        margin: 5px 0 0 0;
    }
    .space_bottom{
        margin: 0 0 5px 0;
    }

    .modal_footer_button{
        margin: 10px;
    }

    

</style>
