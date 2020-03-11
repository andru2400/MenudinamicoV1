<template>    
    <div class="sidebar">
        <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
            <router-link to="/dashboard/home" class="nav-link">
                <i class="nav-icon icon-speedometer"></i> Bienvenida
                <span class="badge badge-primary">NEW</span>
            </router-link>            
            </li>
            <li class="nav-title">Administración</li>
            <li class="nav-item">
            <router-link to="/dashboard/news" class="nav-link">
                <i class="nav-icon icon-layers"></i> Noticias
            </router-link>                
            </li>
            <li class="nav-title">Configuración</li>            
            <li class="nav-item">
                <router-link to="/dashboard/modules-menu" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Modulos - Menu
                </router-link>                
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/users" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Usuarios
                </router-link>                
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/roles" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Roles (Cargos)
                </router-link>                
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/groups-parameters" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Grupos - Parametros
                </router-link>                
            </li>
            <li class="nav-item nav-dropdown" :class="tempClass" v-on:click="openClass">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                    </li>
                </ul>
            </li>          
        </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>    
</template>

<script>
    export default {
        props: ['asset'],
        mounted() {
            console.log(this.assetHeader)
        },
        data () {
            return {
                assetHeader: this.asset,
                tempClass: 'close_temp',
                list:[]
            }
        },
        created: function() {
            
        },
        methods: {
            openClass(){
                if(this.tempClass == 'close_temp'){
                    this.tempClass = 'open'
                }else{
                    this.tempClass = 'close_temp'
                }
            }
        }
    }
</script>
