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
            <!-- <li class="nav-item mt-auto">
                <a class="nav-link nav-link-success" target="_top">
                <i class="nav-icon icon-cloud-download"></i> Download CoreUI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-danger" target="_top">
                <i class="nav-icon icon-layers"></i> Try CoreUI
                <strong>PRO</strong>
                </a>
            </li> -->
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
                assetHeader: this.asset
            }
        },
        created: function() {

        },
        methods: {
        }
    }
</script>
