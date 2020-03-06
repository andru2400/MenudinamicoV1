<template>
  <div>
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-12 col-xl-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Listado de Modulos
              <div class="card-header-actions">
                <a class="card-header-action"
                  href="https://coreui.io/docs/components/bootstrap-jumbotron/"
                  target="_blank">
                  <small class="text-muted">docs</small>
                </a>
              </div>
            </div>
            <div class="card-body">
         
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
                    </ul>
                    </nav>                    
                </div>
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["asset"],
  mounted() {
    console.log(this.assetHeader);
  },
  data() {
    return {
      assetHeader: this.asset,
      list: []
    };
  },
  created: function() {    
    this.getList()
  },
  methods: {    
    getList: function() {
      let service_url = '/api/v1/dashboard/modules-menu/all';
      axios.get(service_url)
        .then(response => {
          if(response.data.status == 'OK'){
            this.list = response.data.list;
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    }
  }
};
</script>

<style scoped>
  .sidebar {
    position: absolute !important;
    height: initial !important;
  }
  .card-body{
        height: 500px;
  }
  html:not([dir="rtl"]) .sidebar {
    margin-left: auto !important;
}
</style>