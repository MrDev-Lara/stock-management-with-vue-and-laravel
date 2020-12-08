 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Monthly Expense</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            
            <router-link to="/create_expense" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
          </div>
          <div class="card-body">
            <div class="card-body">
              <div class="table-responsive">
               <label>Search</label>
               <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Details</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>Month</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="monthlyexpense in filtersearch" :key="monthlyexpense.id">
                      <td>{{ monthlyexpense.details }}</td>
                      <td>{{ monthlyexpense.amount }}</td>
                      <td>{{ monthlyexpense.expense_date }}</td>
                      <td>{{ monthlyexpense.expense_month }}</td>
                    </tr> 
        
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
       </div>
   </div>
</template>

<script>
    export default {
    	mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            } 
        },
        created(){
        this.monthlyExpense();
        },
        data(){
          return{
            monthlyexpenses:[],
            searchTerm:'',  
            getmonth:''
          }
        },
        computed:{
         filtersearch(){
          return this.monthlyexpenses.filter(monthlyexpense => {
             return monthlyexpense.expense_date.match(this.searchTerm)
           })
         }
       },
        methods:{
          monthlyExpense(){
            axios.get('/api/monthlyexpense')
            .then(({data}) => (this.monthlyexpenses = data))
            .catch()
          }
        
        }
      
    }
     
  
  
</script>

<style>
	
#add_new{
	float: right;
}
#em_photo{
  height: 40px;
  width: 40px;
}
</style>