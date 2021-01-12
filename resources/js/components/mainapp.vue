<template>
    <div  class="layout" v-if="true">
        <Layout :style="{minHeight: '100vh'}">
            <Sider ref="side1" :style="{background: '#4e73df',padding: '20px', minWidth: '250px', borderRadius: '0 5px 20px 0', border: '1px solid #000'}" hide-trigger collapsible :collapsed-width="150">
                <div class="submenu">{{user.name}}</div>
                <Menu  width="auto" :style="{ padding: '3px', borderRadius: '7px', backgroundColor: '#4e73df' }">

                                <MenuItem name="Dashboard" class="submenu">
                                    <router-link to="/" style="color: black">
                                    <Icon type="ios-navigate"></Icon>
                                    Dashboard
                                    </router-link>
                                </MenuItem>
                                
                                <MenuItem name="Dictonary" class="submenu">
                                    <Icon type="ios-navigate" ></Icon>
                                    <router-link to="/dictonary" style="color: black">Dictonary</router-link >
                                </MenuItem>
                                <MenuItem name="Trainning" class="submenu">
                                    <Icon type="ios-navigate"></Icon>
                                    <router-link to="/trainning" style="color: black">Trainning</router-link>
                                </MenuItem>
                                <MenuItem name="Logout" class="submenu">
                                    <Icon type="ios-navigate"></Icon>
                                    <a href="/logout" style="color: black">Logout</a>
                                </MenuItem>
                            </Menu>
            </Sider>
            <Layout>
                <Header :style="{padding: 0}" class="layout-header-bar">
                    
                </Header>
                <Content :style="{padding: '10px',margin: '20px', background: '#eee', minHeight: '260px', boxShadow: '10px 10px 10px #888', border: '1px solid #111', borderRadius: '20px'}">
                    <router-view/>
                </Content>
            </Layout>
        </Layout>
    </div>
</template>
<script>
    
    export default {
        props: ['user'],
        data () {
            return {
                
                
            }
        },
        computed: {
            
        },
        methods: {
            
        }
    }
</script>
<style scoped>
    .layout{
        border: 1px solid #d7dde4;
        background: #5aa3ec;
        
        position: relative;
        border-radius: 4px;
        overflow: hidden;
    }
    .layout-header-bar{
        background: #fff;
        box-shadow: 0 1px 1px rgba(0,0,0,.1);
    }
    .layout-logo-left{
        width: 90%;
        height: 30px;
        background: #5b6270;
        border-radius: 3px;
        margin: 15px auto;
    }
    .menu-icon{
        transition: all .3s;
    }
    .rotate-icon{
        transform: rotate(-90deg);
    }
    .menu-item span{
        display: inline-block;
        overflow: hidden;
        width: 69px;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: bottom;
        transition: width .2s ease .2s;
    }
    .menu-item i{
        transform: translateX(0px);
        transition: font-size .2s ease, transform .2s ease;
        vertical-align: middle;
        font-size: 16px;
    }
    .collapsed-menu span{
        width: 0px;
        transition: width .2s ease;
    }
    .collapsed-menu i{
        transform: translateX(5px);
        transition: font-size .2s ease .2s, transform .2s ease .2s;
        vertical-align: middle;
        font-size: 22px;
    }

    .submenu{
        margin: 6px;
        font-size: 20px;
        
        border-radius: 10px;
        color: black;
        
    }

    .submenu:hover{
        transition: all .3s;
        border-radius: 40px;
        box-shadow: 0 0 30px rgb(136, 210, 219);
        background-color: cornflowerblue;
        color: black;
    }

    
</style>