<template>
    <div class="sidebar">
        <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
            <router-link to="/home" class="nav-link">
                <i class="nav-icon icon-speedometer"></i> Bienvenida
                <span class="badge badge-primary">NEW</span>
            </router-link>
            <!-- <a class="nav-link" href="home">
                <i class="nav-icon icon-speedometer"></i> Bienvenida
                <span class="badge badge-primary">NEW</span>
            </a> -->
            </li>
            <li class="nav-title">Administración</li>
            <li class="nav-item">
            <router-link to="/news" class="nav-link">
                <i class="nav-icon icon-layers"></i> Noticias
            </router-link>
                <!-- <a class="nav-link" href="">
                    <i class="nav-icon icon-layers"></i> Noticias
                </a> -->
            </li>
            <li class="nav-title">Configuración</li>
            <li class="nav-item">
                <router-link to="/news-types" class="nav-link">
                    <i class="nav-icon icon-drop"></i> Tipó de Noticias
                </router-link>
                <!-- <a class="nav-link" href="">
                    <i class="nav-icon icon-drop"></i>Tipó de Noticias</a> -->
            </li>
            <li class="nav-item">
                <router-link to="/users" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Usuarios
                </router-link>
                <!-- <a class="nav-link" href="">
                    <i class="nav-icon icon-pencil"></i>Usuarios</a> -->
            </li>
            <li class="nav-item">
                <router-link to="/roles" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Roles (Cargos)
                </router-link>
                <!-- <a class="nav-link" href="">
                <i class="nav-icon icon-pencil"></i>Roles (Cargos)</a> -->
            </li>
            <li class="nav-item">
                <router-link to="/groups-parameters" class="nav-link">
                    <i class="nav-icon icon-pencil"></i>Grupos - Parametros
                </router-link>
                <!-- <a class="nav-link" href="">
                <i class="nav-icon icon-pencil"></i>Grupos - Parametros</a> -->
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link nav-link-success" target="_top">
                <i class="nav-icon icon-cloud-download"></i> Download CoreUI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-danger" target="_top">
                <i class="nav-icon icon-layers"></i> Try CoreUI
                <strong>PRO</strong>
                </a>
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
                assetHeader: this.asset
            }
        },
        created: function() {

        },
        methods: {
        }
    }
</script>
