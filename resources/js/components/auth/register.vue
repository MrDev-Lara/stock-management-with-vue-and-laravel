<template>

<div>
	 <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Regiser A New Account</div>
      <div class="card-body">
        <form @submit.prevent="signup">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" placeholder="Full Name"  autofocus="autofocus" v-model="form.name">
              <label for="inputName">Full Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus="autofocus" v-model="form.email">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="form.password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Re-type Password" v-model="form.password_confirmation">
              <label for="inputConfirmPassword">Password</label>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <router-link to="/" class="d-block small mt-3">Already have an Account</router-link>
        </div>
      </div>
    </div>
  </div>
</div>

</template>

<script type="text/javascript">
export default{
    mounted(){
      if(User.loggedIn()){
          this.$router.push({name: 'home'})
      }
    },
    data(){
      return{
        form:{
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
      }
    }
  },
  methods:{
    signup(){
      axios.post('/api/auth/signup',this.form)
      .then(response => {
        User.responseAfterLogin(response)
        Toast.fire({
          icon: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({name: 'home'})
      })
      .catch(error => console.log(error.response.data))
  }
}
}
</script>

<style type="text/css">
	
</style>