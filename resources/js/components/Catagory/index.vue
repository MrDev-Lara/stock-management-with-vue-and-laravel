<template>

<div>
	

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Catagory List</div>
           <label>Search</label>
           <input type="text" class="form-control" v-model="catagorySearch" style="width:200px;"/>
          	<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Catagory Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="catagory in search" :key="catagory.id">
                    <td>{{ catagory.catagory_name }}</td>
                    <td>
                    	<router-link class="btn btn-sm btn-info" :to="{name: 'update_catagory',params:{id: catagory.id} }">Edit</router-link>
                    	<a @click="deleteCatagory(catagory.id)" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
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
    		catagories:[],
    		catagorySearch: ''
    	}
    },
    computed:{
    	search(){
    		return this.catagories.filter(catagory => {
    			return catagory.catagory_name.match(this.catagorySearch)
    		})
    	}
    },
    methods:{
    	allcatagories(){
    		axios.get('/api/catagory/')
    		.then(({data})=>{
    			this.catagories = data
    		})
    		.catch()
    	},
    	deleteCatagory(id){
    		Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	axios.delete('/api/catagory/'+id)
			  	.then(()=>{
			  		this.catagories = this.catagories.filter(catagory=>{
			  			return catagory.id != id
			  		})
			  	})
			  	.catch(console.log('error'))
			    Swal.fire(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    )
			  }
			})
    	}
    },
    created(){
    	this.allcatagories();
    }
   
}
</script>

<style type="text/css">
	
</style>