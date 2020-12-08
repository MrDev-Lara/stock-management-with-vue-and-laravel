<template>

<div>
	 <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Catagory</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Catagory Insert 
            <router-link to="/catagory" class="btn btn-sm btn-info" id="add_new"> All Catagory</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="catagoryInsert" enctype="multipart/form-data">
                <div class="form-group">
	              <div class="form-row">
	               <div class="col-md-10">
	                <div class="form-label-group">
	                  <input type="text" v-model="form.catagory_name" class="form-control" required="">
	                  <small class="text-danger" v-if="errors.catagory_name">{{ errors.catagory_name[0] }}</small>
	                  <label for="firstName">Catagory Name</label>
	                </div>
	               </div>
	             </div>
	          </div>

               <button type="submit" class="btn btn-success">Submit</button>
              </form>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div>
   </div>
</div>

</template>

<script type="text/javascript">
export default{
    mounted(){
      if(!User.loggedIn()){
          this.$router.push({name: '/'})
      }
    },
    data(){
    	return{
    		form:{
        			catagory_name :''
        	},
        		errors:{},
    	}
    },
    methods:{
        catagoryInsert(){
        	axios.post('/api/catagory',this.form)
        	.then(()=>{
        		this.$router.push({name: 'catagory'})
        		Notification.success();
        	})
        	.catch(error=>this.errors = error.response.data.errors)
        }
    }
   
}
</script>

<style type="text/css">
	
</style>