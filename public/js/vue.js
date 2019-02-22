Vue.component('component-list',{
mixins: [Vue2Filters.mixin],
props:['lists','input'],
data(){
    return{
        itemlistselect:"",
        visible:"true"
    }
},
methods:{
    selectedItem(){
       
        this.$emit('itembarrio',event.target.textContent);
        this.$emit('itemidbarrio',event.target.attributes[0].nodeValue);
        console.log(event.target.attributes[0].nodeValue);
        console.log(event.target.textContent);       
        this.visible=!this.visible;
    }
},
template: `
<ul class="list-group" v-show="visible">
<li class="list-group-item" v-for="barr in filterBy(lists,input)"   :itemlistselect="barr.idbarrio" v-on:click="selectedItem">{{barr.barrio}}</li>
   
</ul>
`
});


var appvue= new Vue({
    el:'#space-vue',
    
        data() {
        return {
           
            itemlist:"",
            inputbarrio:"",
            idbarrio:"",
            selectedregion:"",
            selectedmunicipio:"",
            selectedpuesto:"",
            departamentos:[],
            municipios:[],  
            municipiosPersona:[],         
            barrios:[],
            puestovotaciones:[],
            comunas:[],
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
          
            axios.get('locationm/'+this.itemlist)
                .then(response => (this.municipios = response.data)).catch(function (error) {
                    console.log(error);
                  }); 
        },
        onChangeregion: function(event){
            
            this.municipios="";
            this.puestovotaciones="";
           
              this.municipios=null;           
            axios.get('locationd/'+this.selectedregion)
            .then(response => (this.departamentos = response.data)).catch(function (error) {
                console.log(error);
                
              }); 
              
        },
        cargarMunicipioPersona: function(event){
            console.log("llego"+ event.target.value);

       
                      
            axios.get('locationmpersona/'+event.target.value)
            .then((response)=>{
                this.municipiosPersona = response.data               
            }).catch(function (error) {
                console.log(error);
                
              }); 
              
        },
        cargarcomunasPersona: function(event){
            console.log("llego"+ event.target.value);
                      
            axios.get('locationcomunapersona/'+event.target.value)
            .then((response) => {
                this.lista = response.data
                console.log(this.lista);
            }).catch(function (error) {
                console.log(error);
                
              }); 
              
        },
        cargarPuestosVotacion: function(){

         
            axios.get('locationpv/'+this.selectedmunicipio)
                  .then(response => (this.puestovotaciones = response.data)).catch(function(error){
                      console.log(error);
                  });
        },
        cargarmesas: function(){
            axios.get('locationmesas/'+this.selectedpuesto)
                  .then(response => (this.mesas = response.data)).catch(function(error){
                      console.log(error);
                  });
        }
    },
    computed:{
        searchbarrio: function(){
            
            return this.lista[1].filters((barrio)=>barrio.barrio.includes(this.inputbarrio));
            //return this.lista[1].filter((barrio) => barrio.barrio.includes(this.inputbarrio));
        }
    }
})