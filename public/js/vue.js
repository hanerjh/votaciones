Vue.component('component-list',{
mixins: [Vue2Filters.mixin],
props:['lists'],
data(){
    return{
        itemlistselect:"",
        comina:"",
        input:"",
        visible:"true"
    }
},
methods:{
    selectedItem(){
        this.input=event.target.textContent;
       
        this.$emit('itemidbarrio',event.target.attributes[0].nodeValue);
        this.$emit('itemidcomuna',event.target.attributes[1].nodeValue);
       
        /*console.log(event.target.attributes[0].nodeValue);
        console.log(event.target.textContent);     */  
        console.log(event);
        this.visible=!this.visible;
    },
    mostrar(){

        if(this.input){
            this.visible=true;
        }
    }
},
computed:{
    
    
},
template: `
<div>
<input type="text"  class="form-control" id="inputAddress" v-model="input"  v-on:keyup="mostrar()" placeholder="Cascajal, Transformacion...">
<ul class="list-group nav_list" v-show="visible">

<li class="list-group-item" v-for="barr in filterBy(lists,input)"   :itemlistselect="barr.idbarrio" :comuna="barr.idcomuna" v-on:click="selectedItem">{{barr.barrio}}</li>
   
</ul>
</div>
`
});


var appvue= new Vue({
    el:'#space-vue',
    
        data() {
        return {
            mensajes:"",
            documento:"",
            itemlist:"",
            inputbarrio:"",
            idbarrio:"",
            idcomuna:"",
            selectedregion:"",
            selectedmunicipio:"",
            selectedpuesto:"",
            departamentos:[],
            municipios:[], 
            municipios2:[],  
            municipiosPersona:[],         
            barrios:[],
            puestovotaciones:[],
            comunas:[],
            zonas:[],
            munizona:"",
            mesas:[],
            lista:[]             
        }
        
    },mounted(){
        /*axios.get('location/')
        .then(response => (this.munirecipios = response.data)).catch(function (error) {
            console.log(error);
          }); */
    },
    methods:{

        onBlur:function(){
            var respuesta="";
            if(this.documento=="")
            {
                console.log("esta vacio el campo");
                this.mensajes="Por favor ingresar su documento"
            }
            else{
                axios.get('/evaluardocumento/'+this.documento)
                .then((response) =>{
                   
                    //console.log(response.data);
                    respuesta = response.data;
                    
                    if(respuesta!=""){
                        this.mensajes="El usuario "+ respuesta[0].nombre +" ya esta registrado";
                       
                    }
                    else{
                        this.mensajes="";
                        //console.log("esta libre");
                    }
                    
                }).catch(function (error) {
                    this.mensajes="";
                    console.log(error);
                  }); 
            }
            
        },
        onChange: function(){
           // alert(this.itemlist);
           //var dt=this
          /*  axios.get('ingresar/'+this.itemlist)
            .then (function (response) {
              //console.log(response);
             dt.municipios = response.data;
             
              console.log(this.municipios);
           
            })
            .catch(function (error) {
              console.log(error);
            }); */
          
            axios.get('/locationm/'+this.itemlist)
                .then((response) =>{ 
                    this.municipios2 = response.data;
                   
                }).catch(function (error) {
                    console.log(error);
                  }); 
        },
        onChangeregion: function(event){
            
            this.municipios="";
            this.puestovotaciones="";
           
              this.municipios=null;           
            axios.get('/locationd/'+this.selectedregion)
            .then(response => (this.departamentos = response.data)).catch(function (error) {
                console.log(error);
                
              }); 
              
        },
        cargarMunicipioPersona: function(event){
            console.log("llego"+ event.target.value);     
                 
            axios.get('/locationmpersona/'+event.target.value)
            .then((response)=>{
                this.municipiosPersona = response.data   
                        
            }).catch(function (error) {
                console.log(error);
                
              }); 
              
        },    
        cargarcomunasPersona: function(event){
         
            this.munizona=event.target.value;   
            axios.get('/locationcomunapersona/'+event.target.value)
            .then((response) => {
                this.lista = response.data
                 //LLAMAMOS LAS ZONAS QUE PERTENECE AL MUNICIPIO SELECCIONADO
                 this.zona(); 
                console.log(this.lista);
            }).catch(function (error) {
                console.log(error);
                
              }); 
              
        },
        zona:function(){
           
            axios.get('/locationz/'+this.munizona)
            .then((response)=>{
                this.zonas = response.data  
                console.log(this.zonas);                       
            }).catch(function (error) {
                console.log(error);
                
              });
           
        },
        cargarBarrios: function(event){
            axios.get('/locationbarrio/'+event.target.value)
            .then(response => (this.barrios = response.data)).catch(function(error){
                console.log(error);
            });
        },
        cargarPuestosVotacion: function(){
          //carga los puestos de votaciones que tienen mesas asignadas
            axios.get('/locationpv/'+this.selectedmunicipio)
                  .then(response => (this.puestovotaciones = response.data)).catch(function(error){
                      console.log(error);
                  });
        },cargarPuestosVotaciongeneral: function(){
         //carga los puestos de votaciones completos
            axios.get('/locationpuestos_votacion_generales/'+event.target.value)
                  .then(response => (this.puestovotaciones = response.data)).catch(function(error){
                      console.log(error);
                  });
        },
        cargarmesas: function(){
            axios.get('/locationmesas/'+this.selectedpuesto)
                  .then(response => (this.mesas = response.data)).catch(function(error){
                      console.log(error);
                  });
        }
    },
    computed:{
        searchbarrio: function(){
            
            //return this.lista[1].filters((barrio)=>barrio.barrio.includes(this.inputbarrio));
            //return this.lista[1].filter((barrio) => barrio.barrio.includes(this.inputbarrio));
        }
    }
})