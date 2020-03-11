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
         
                <!-- <div class="sidebar bg-light">
                    <nav class="sidebar-nav">
                    <ul class="nav" v-for="item in list" :key="item.id">                  

                        
                        <li class="nav-title" v-text="item.name"></li>                          

                        <div v-for="item2 in item.modules" :key="item2.id">

                        
                          <li class="nav-item nav-dropdown" :class="tempClass" v-on:click="openClass" v-if="item2.modules.length > 0">
                              <a class="nav-link nav-dropdown-toggle"><i :class="item2.class_icon"></i> <span v-text="item2.name"></span></a>
                              <ul class="nav-dropdown-items">
                                  <li class="nav-item" v-for="item3 in item2.modules" :key="item3.id">                                      
                                      <router-link :to="item2.url" class="nav-link">                                          
                                          <span v-text="item3.name"></span>
                                      </router-link>                
                                  </li>                                  
                              </ul>
                          </li>                        

                        
                          <li class="nav-item" v-else>
                            <router-link :to="item2.url" class="nav-link">
                                <i :class="item2.class_icon"></i><span v-text="item2.name"></span>
                            </router-link>                
                          </li> 

                        </div>                                   

                    </ul>
                    </nav>                    
                </div> -->
                <button class="btn btn-primary my-3" @click="createElement()">Crear Modulo</button>

                <div class="sidebar bg-light w-75">
                    <nav class="sidebar-nav w-100">
                    <ul class="nav w-100" v-for="item in list" :key="item.id">                  

                        <!-- Padre -->
                        <li class="nav-title">
                          <div class="d-inline-block">
                            <i class="icon-note icons border p-2" @click="editElement(item)"></i>
                            <i class="icon-trash icons border p-2" @click="destroyElement(item.id)"></i>
                            <i class="icon-arrow-up-circle" @click="upLevel(item.id)"></i>
                            <i class="icon-arrow-down-circle" @click="downLevel(item.id)"></i>
                          </div>
                          <span v-text="item.name"></span>
                        </li>                          

                        <div v-for="item2 in item.modules" :key="item2.id">

                          <!-- Padre - hijo - nieto -->
                          <!-- <li class="nav-item nav-dropdown mx-5 w-100" :class="tempClass" v-on:click="openClass" v-if="item2.modules.length > 0"> -->
                          <li class="nav-item nav-dropdown mx-5 w-100 open" v-if="item2.modules.length > 0">
                              <a class="nav-link nav-dropdown-toggle">
                                <div class="d-inline-block text-dark">
                                  <i class="icon-note icons border p-2" @click="editElement(item2)"></i>
                                  <i class="icon-trash icons border p-2" @click="destroyElement(item2.id)"></i>
                                  <i class="icon-arrow-up-circle" @click="upLevel(item2.id)"></i>
                                  <i class="icon-arrow-down-circle" @click="downLevel(item2.id)"></i>
                                </div>
                                <span v-text="'  '+item2.name"></span>
                                <i :class="item2.class_icon"></i>
                              </a>
                              <ul class="nav-dropdown-items w-100">
                                  <li class="nav-item mx-5" v-for="item3 in item2.modules" :key="item3.id">                                      
                                      <div class="d-inline-block text-dark">
                                        <i class="icon-note icons border p-2" @click="editElement(item3)"></i>
                                        <i class="icon-trash icons border p-2" @click="destroyElement(item3.id)"></i>
                                        <i class="icon-arrow-up-circle" @click="upLevel(item3.id)"></i>
                                        <i class="icon-arrow-down-circle" @click="downLevel(item3.id)"></i>
                                      </div>
                                      <router-link :to="item2.url" class="nav-link d-inline-block">                                          
                                          <span v-text="item3.name"></span>
                                      </router-link>                
                                  </li>                                  
                              </ul>
                          </li>                        
                          <!-- Padre - hijo -->
                          <li class="nav-item mx-5" v-else>
                            <div class="d-inline-block text-dark">
                              <i class="icon-note icons border p-2" @click="editElement(item2)"></i>
                              <i class="icon-trash icons border p-2" @click="destroyElement(item2.id)"></i>
                              <i class="icon-arrow-up-circle" @click="upLevel(item2.id)"></i>
                              <i class="icon-arrow-down-circle" @click="downLevel(item2.id)"></i>
                            </div>
                            <router-link :to="item2.url" class="nav-link d-inline-block">
                                <i :class="item2.class_icon"></i>
                                <span v-text="'  '+item2.name"></span>
                            </router-link>                
                          </li> 

                        </div>                                   

                    </ul>
                    </nav>                    
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal Crear-->
    <div class="modal fade" id="createElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form v-on:submit.prevent="serviceCreateElement()" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" v-model="element.name" placeholder="Ingresa nombre de módulo">
                  </div>
                  <div class="form-group">
                      <label for="url">Url</label>
                      <input type="text" class="form-control" id="url" v-model="element.url" placeholder="Ingresa url">
                  </div>
                  <div class="form-group">
                      <label for="class_icon">Clase de icono</label>
                      <input type="text" class="form-control" id="class_icon" v-model="element.class_icon" placeholder="Ingresa class">
                  </div>
                  <div class="form-group">
                      <label for="parent_id">Hijo del modulo : </label>
                      <select class="form-control mb-2" v-model="element.parent_id">
                            <option :value="null">Ninguno</option>
                            <option v-for="mod in parameters.modules_disorder" :key="mod.id" :value="mod.id" v-text="mod.name"></option>
                      </select>
                  </div>                
                  <div class="form-group">
                      <label for="parent_id">Estado</label>
                      <select class="form-control mb-2" v-model="element.enabled">
                            <option disabled value="">Estado :</option>
                            <option value="activated">Activado</option>
                            <option value="inactivated">Desactivado</option>
                      </select>
                  </div>                                 
                  <input type="submit" value="Guardar" class="btn btn-primary">
              </form>
          </div>          
        </div>
      </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="editElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">                  
            <form v-on:submit.prevent="serviceEditElement()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" v-model="element.name" placeholder="Ingresa nombre de módulo">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" v-model="element.url" placeholder="Ingresa url">
                </div>
                <div class="form-group">
                    <label for="class_icon">Clase de icono</label>
                    <input type="text" class="form-control" id="class_icon" v-model="element.class_icon" placeholder="Ingresa class">
                </div>
                <div class="form-group">
                    <label for="parent_id">Modulo Padre (No Editable)</label>
                    <select class="form-control mb-2" v-model="element.parent_id">
                          <option disabled value="">Ninguno</option>
                          <option v-for="mod in parameters.modules_disorder" :key="mod.id" :value="mod.id" v-text="mod.name" disabled></option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="parent_id">Orden (No editable)</label>
                    <select class="form-control mb-2" v-model="element.order">                          
                          <option v-for="num_order in checkOrder()" :key="num_order.id" :value="num_order.order" v-text="num_order.name" disabled></option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="parent_id">Estado</label>
                    <select class="form-control mb-2" v-model="element.enabled">
                          <option disabled value="">Estado :</option>
                          <option value="activated">Activado</option>
                          <option value="inactivated">Desactivado</option>
                    </select>
                </div>                                 
                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>
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
      list: [],
      tempClass: 'close_temp',
      element: [],
      parameters: [],              
      modules_disorder: [],    
    };
  },
  created: function() {    
    this.getList();
    this.getParameters();
    this.element = this.elementInitialState();
  },
  methods: {    
    elementInitialState: function(){
      return {id:'' 
              ,name:''
              ,url: null
              ,class_icon: null
              ,parent_id: null
              ,order: null
              ,enabled:''              
              };               
		},
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
    },
    getParameters: function() {
      let service_url = '/api/v1/dashboard/modules-menu/parameters';
      axios.get(service_url)
        .then(response => {
          if(response.data.status == 'OK'){
            this.parameters = response.data.parameters;
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    },
    openClass(){
                if(this.tempClass == 'close_temp'){
                    this.tempClass = 'open'
                }else{
                    this.tempClass = 'close_temp'
                }
    },
    createElement(item){
      
      this.element = this.elementInitialState();
      $('#createElement').modal('show')
    },
    editElement(item){
      this.element = Object.assign({},item);      
      $('#editElement').modal('show')
    },
    _jsonToForm: function(json){
			var form_data = new FormData();
			for (var key in json) {				
				if(typeof(json[key]) == 'object'){
					if(key == 'image_name'){
						form_data.append(key, json[key]);					
					}else{
						form_data.append(key, JSON.stringify(json[key]));
					}					
				}else{
					form_data.append(key, json[key]);					
				}
			}
			return form_data;
		},
    serviceCreateElement(){
      let formData = this._jsonToForm(this.element);
      let service_url = '/api/v1/dashboard/modules-menu/store';
      axios.post(service_url
      	        ,formData
						    ,{headers: {'Content-Type': 'multipart/form-data'}}
                )
        .then(response => {
          if(response.data.status == 'OK'){
              this.element = this.elementInitialState();
              $('#createElement').modal('hide');                            
              this.getList();
              this.getParameters();
              toastr.success(response.data.message, 'Message')
          }else{
            toastr.error(response.data.message, 'Error')
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    },
    serviceEditElement(){      
      let formData = this._jsonToForm(this.element);
      let service_url = '/api/v1/dashboard/modules-menu/update';
      axios.post(service_url
      	        ,formData
						    ,{headers: {'Content-Type': 'multipart/form-data'}}
                )
        .then(response => {
          if(response.data.status == 'OK'){
              this.element = this.elementInitialState();
              $('#editElement').modal('hide');                            
              this.getList();
              this.getParameters();
              toastr.success(response.data.message, 'Message')
          }else{
            toastr.error(response.data.message, 'Error')
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    },
    destroyElement(id){
      let message = '¿Seguro desea eliminar?'
			if(confirm(message)){				
				var service_url= '/api/v1/dashboard/modules-menu/delete/'+id;
        axios.delete(service_url)
          .then(response => {
              if(response.data.status == 'OK'){
                this.getList();
                this.getParameters();
                toastr.success(response.data.message, 'Message')
              }else{
                toastr.error(response.data.message, 'Error')
              }              
          }).catch(error => {
              console.error("Error al procesar")
          });	
			}
    },
    upLevel(id){
      let formData = this._jsonToForm({'id':id});
      let service_url = '/api/v1/dashboard/modules-menu/order-up';
      axios.post(service_url
      	        ,formData
						    ,{headers: {'Content-Type': 'multipart/form-data'}}
                )
        .then(response => {
          if(response.data.status == 'OK'){
              this.element = this.elementInitialState();                          
              this.getList();
              this.getParameters();
              toastr.success(response.data.message, 'Message')
          }else{
            toastr.error(response.data.message, 'Error')
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    },    
    downLevel(id){
      let formData = this._jsonToForm({'id':id});
      let service_url = '/api/v1/dashboard/modules-menu/order-down';
      axios.post(service_url
      	        ,formData
						    ,{headers: {'Content-Type': 'multipart/form-data'}}
                )
        .then(response => {
          if(response.data.status == 'OK'){
              this.element = this.elementInitialState();                          
              this.getList();
              this.getParameters();
              toastr.success(response.data.message, 'Message')
          }else{
            toastr.error(response.data.message, 'Error')
          }
        }).catch(error => {
            console.error("Error al procesar")
        });	      
    }
    // checkOrder(){
    //   const temp = this.parameters.modules_disorder;      
    //   let x = temp.filter(element => element.parent_id == this.element.parent_id );
    //   return x;
    // }
  }
};
</script>

<style scoped>

  .sidebar {
    position: absolute !important;
    height: initial !important;      
    z-index: 20;
  }

  .nav-link, .nav-title {
    color: #000000 !important; 
  }

  .card-body{
    height: 500px;
  }

  html:not([dir="rtl"]) .sidebar {
    margin-left: auto !important;
  }

  .icon-arrow-up-circle{
    color:green;
  }

  .icon-arrow-down-circle{    
    color:red;
  }

</style>