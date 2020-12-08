<template>

<div>
	

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Employee List</div>
           <label>Search</label>
           <input type="text" class="form-control" v-model="employeeSearch" style="width:200px;"/>
          	<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Photo</th>
                    <th>joining_date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="employee in search" :key="employee.id">
                    <td>{{ employee.name }}</td>
                    <td>{{ employee.email }}</td>
                    <td>{{ employee.salary }}</td>
                    <td><img :src="employee.photo" id="employeeimg"/></td>
                    <td>{{ employee.joining_date }}</td>
                    <td>
                    	<router-link class="btn btn-sm btn-info" :to="{name: 'update_employee',params:{id: employee.id} }">Edit</router-link>
                    	<a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</a>
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
    		employees:[],
    		employeeSearch: ''
    	}
    },
    computed:{
    	search(){
    		return this.employees.filter(employee => {
    			return employee.name.match(this.employeeSearch)
    		})
    	}
    },
    methods:{
    	allemployee(){
    		axios.get('/api/employee/')
    		.then(({data})=>{
    			this.employees = data
    		})
    		.catch()
    	},
    	deleteEmployee(id){
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
			  		this.employees = this.employees.filter(employee=>{
			  			return employee.id != id
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
    	this.allemployee();
    }
   
}
</script>

<style type="text/css">
	#employeeimg{
		height:5 px;
		width:10 px;
	}
</style>