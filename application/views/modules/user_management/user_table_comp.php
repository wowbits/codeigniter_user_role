<template" id="users-table">
	<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#ID</th>
				      <th scope="col">Full Name</th>
				      <th scope="col">UserName </th>

				      <th scope="col">Email</th>
				      <th scope="col">Role</th>

				      <th scope="col">Status</th>
				      
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody v-for="user in users">
				    <tr >
				      <th scope="row" >{{user.id}}</th>
				      <td>{{user.first_name}} {{user.last_name}}</td>
				      
				      <td>{{user.username}}</td>
				      <td>{{user.email}}</td>
				      <td><span class="badge badge-secondary">{{user.role}}</span></td>
				      <td v-html="status(user.status)"></td>
				      	
				      <td><button class="btn btn-primary"  data-toggle="modal" data-target="#regModal" @click=editUser(user)><i class="material-icons" style="font-size: 15px;margin: 0 5px" >edit</i> Edit</button><i style="padding:3px"></i>

				      	<button class="btn btn-danger" @click="console.log(user)" data-toggle="modal" data-target="#myModal"> <i class="material-icons" style="font-size: 15px;margin: 0 5px">block</i> Delete</button></td>
				    </tr>
				  </tbody>
			
			</table>
</template>



<script type="text/javascript">

	Vue.component('user-table',{
	props:["users"],
	template:'#users-table',
	data:function(){
		return obj;
	},
	methods:{

		editUser:function(user){

					this.edit_data.f_name=user.first_name;
		     		this.edit_data.l_name=user.last_name;
		     		this.edit_data.email=user.email;
		     		this.edit_data.username=user.username;
		     		this.edit_data.password='';
		     		this.edit_data.selected=user.role_id;
		     		this.edit_data.id=user.id;
		     		this.edit_data.status=user.active;
		      


		},
		deleteUser:function(deleteUser){

		},
		update:function(){
			
		},
		status:function(vl){
			//if value 1 active 
			//else false show badge danger
			if(vl==1)
				return '<span class="badge badge-success">Active</span>'
			else
				return '<span class="badge badge-danger">Deactive</span>'
		}

	},
	created:function(){
				
	}
})

</script>
