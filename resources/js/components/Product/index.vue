<template>

<div>
	

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Products List</div>
           <label>Search</label>
           <input type="text" class="form-control" v-model="productSearch" style="width:200px;"/>
          	<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                     <th>Name</th> 
                      <th>Code</th>
                      <th>Photo</th>
                      <th>Category</th>
                      <th>Buying Price</th>
                      <th>Selling Price</th>
                      <th>Root</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="product in search" :key="product.id">
                    <td>{{ product.product_name }}</td>
                    <td>{{ product.product_code }}</td>
                    <td><img :src="product.image" id="employeeimg"/></td>
                    <td>{{ product.catagory_name }}</td>
                    <td>{{ product.buying_price }}</td>
                    <td>{{ product.selling_price }}</td>
                    <td>{{ product.root }}</td>
                    <td>
                    	<router-link class="btn btn-sm btn-info" :to="{name: 'update_product',params:{id: product.id} }">Edit</router-link>
                    	<a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger">Delete</a>
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
    		products:[],
    		productSearch: ''
    	}
    },
    computed:{
    	search(){
    		return this.products.filter(product => {
    			return product.product_name.match(this.productSearch)
    		})
    	}
    },
    methods:{
    	allproducts(){
    		axios.get('/api/product/')
    		.then(({data})=>{
    			this.products = data
    		})
    		.catch()
    	},
    	deleteProduct(id){
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
			  	axios.delete('/api/employee/'+id)
			  	.then(()=>{
			  		this.products = this.products.filter(product=>{
			  			return product.id != id
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
    	this.allproducts();
    }
   
}
</script>

<style type="text/css">
	#employeeimg{
		height:5 px;
		width:10 px;
	}
</style>