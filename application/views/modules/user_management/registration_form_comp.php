



<script type="text/x-template" id="reg-form">
	<div style="width: 500px" >
				  <div class="form-group" >
				    <label for="exampleInputEmail1">First Name:</label>
				    <input type="text"  v-model="form_data.f_name" class="form-control"  placeholder="Enter first name">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Last Name:</label>
				    <input type="text" v-model="form_data.l_name"  class="form-control"  placeholder="Enter last name">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email"  v-model="form_data.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">UserName</label>
				    <input type="text" v-model="form_data.username" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
				  </div>
				  <div class="form-group">
					  <label for="role">Role:</label>
					  <select class="form-control" id="sel1" v-model="form_data.selected" >
					    <option v-for="option in roles" v-bind:value="option.id">
						    {{ option.name }}
						</option>
					  </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" v-model="form_data.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  
				  <button v-on:click="registration()" class="btn btn-primary">Submit</button>
	</div>
</script>



<script>
Vue.component('registration-form', {
	props:["hello"],
	template: '#reg-form',
	data() {
		return obj;
	},
	methods: {
		registration(){ 
			   axios.post('http://127.0.0.2/oo/index.php/api/register_user', {
		     		f_name:this.form_data.f_name,
		     		l_name:this.form_data.l_name,
		     		email:this.form_data.email,
		     		username:this.form_data.username,
		     		pass:this.form_data.password,
		     		role:this.form_data.selected
		      
				  })
				  .then(function (response) {
				      console.log(response.data); 
				  })
		  .catch(function (error) {
		    console.log(error);
		  });
  		
			console.log(this.form_data.f_name+" "+this.form_data.l_name+" "+this.form_data.email+" "+this.form_data.username+" "+this.form_data.password) ;

			var self = this; //you need this because *this* will refer to Object.keys below`

        //Iterate through each object field, key is name of the object field`
        Object.keys(this.form_data).forEach(function(key,index) {
          self.form_data[key] = '';
        });

			
		}
	}
});

</script>