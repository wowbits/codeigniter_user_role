






<div id="app" v-cloak >

<!----- module menu---->


<div class="container top_space">
	<div class="row">
		<div class="col col-md-12">
			<ul class="nav nav-tabs theme_default" style="padding-top: 10px">
			  <li class="nav-item">
			    <a class="nav-link" href="javascript:void(0)" v-bind:class="{active:isActive('users')}" v-on:click="setActive('users')">All Users</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="javascript:void(0)" v-bind:class="{active:isActive('add_user')}" v-on:click="setActive('add_user')">Add User</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="javascript:void(0)" v-bind:class="{active:isActive('add_permission')}" v-on:click="setActive('add_permission')">Add New Permission</a>
			  </li>
			 

			</ul>
		</div>
	</div>


	<div class="row" v-if="isActive('users')">
		<div class="col col-md-12">
			<h1 class="text-center">user list</h1>
			   
                 <user-table v-bind:users="userTableData"></user-table>

			</div>
		</div>
			<!--- edit user -->
		<div class="row justify-content-md-center" v-if="isActive('edit_user')">
			<div class="col col-md-auto">
				<form >
				  <div class="form-group">
				    <label for="exampleInputEmail1">First Name:</label>
				    <input type="email" class="form-control"   placeholder="Enter first name">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Last Name:</label>
				    <input type="email" class="form-control"   placeholder="Enter last name">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
		</div>
	</div>



	<div class="row justify-content-md-center" v-if="isActive('add_user')">
		<div class="col col-md-auto">
				
				<registration-form></registration-form>
		</div>
	</div>
	<div class="row" v-if="isActive('add_permission')">
		<div class="col col-md-12">
			<h1 class="text-center">Add permission</h1>
		</div>
	</div>
</div>



<modal></modal>
<reg></reg>

</div> <!-- app finished here---->






<script type="text/javascript">
	
var obj={
	  activeItem:'',
      userTableData:[],

    form_data:{
			f_name:'',l_name:'',email:'',username:'',password:'',

			selected: '',
  		     
		},
	
    edit_data:{
			id:'',
			f_name:'',l_name:'',email:'',username:'',password:'',

			selected: '',
  		     status:'',
		},
	status_options:[
	 	{value:1,text:"Active"},
	 	{value:0,text:"Deactive"}

		],
	roles:[]
}

</script>








