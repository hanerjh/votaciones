var appvue= new Vue({
    el:'#space-vue',
        data() {
        return {
            itemlist:"",
            selectedregion:"",
            selectedmunicipio:"",
            departamentos:[],
            municipios:[],          
            barrios:[],
            puestovotaciones:[],
            comunas:[]            
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
        cargarPuestosVotacion: function(){

         
            axios.get('locationpv/'+this.selectedmunicipio)
                  .then(response => (this.puestovotaciones = response.data)).catch(function(error){
                      console.log(error);
                  });
        }
    }
})