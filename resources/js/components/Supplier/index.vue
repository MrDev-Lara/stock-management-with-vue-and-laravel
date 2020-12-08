<template>

<div>
	

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Supplier List</div>
           <label>Search</label>
           <input type="text" class="form-control" v-model="supplierSearch" style="width:200px;"/>
          	<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Shop Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="supplier in search" :key="supplier.id">
                    <td>{{ supplier.name }}</td>
                    <td>{{ supplier.email }}</td>
                    <td>{{ supplier.address }}</td>
                    <td><img :src="supplier.photo" id="employeeimg"/></td>
                    <td>{{ supplier.shopname }}</td>
                    <td>
                    	<router-link class="btn btn-sm btn-info" :to="{name: 'update_supplier',params:{id: supplier.id} }">Edit</router-link>
                    	<a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
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
    		suppliers:[],
    		supplierSearch: ''
    	}
    },
    computed:{
    	search(){
    		return this.suppliers.filter(supplier => {
    			return supplier.name.match(this.supplierSearch)
    		})
    	}
    },
    methods:{
    	allsuppliers(){
    		axios.get('/api/supplier/')
    		.then(({data})=>{
    			this.suppliers = data
    		})
    		.catch()
    	},
    	deleteSupplier(id){
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
			  	axios.delete('/api/supplier/'+id)
			  	.then(()=>{
			  		this.suppliers = this.suppliers.filter(supplier=>{
			  			return supplier.id != id
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
    	this.allsuppliers();
    }
   
}
</script>

<style type="text/css">
	#employeeimg{
		height:5 px;
		width:10 px;
	}
</style>