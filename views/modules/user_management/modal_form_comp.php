
<template id="registration-form-modal">
<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" v-model="edit_data.f_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" v-model="edit_data.l_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" v-model="edit_data.email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">UserName:</label>
            <input type="text" class="form-control" v-model="edit_data.username">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" v-model="edit_data.password">
          </div>
          <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="sel1" v-model="edit_data.selected" >
              <option v-for="option in roles" v-bind:value="option.id">
                {{ option.name }}
            </option>
            </select>
          </div>

          <div class="form-group">
            <label for="Status">Status:</label>
            <select class="form-control" id="sel2" v-model="edit_data.status">
              <option v-for="sts in status_options" v-bind:value="sts.value">{{sts.text}}</option>
            </select>
          </div>


        
        

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateUser">Update User</button>
      </div>
    </div>
  </div>
</div>

</template>


<script type="text/javascript">

Vue.component("reg",{
  template:'#registration-form-modal',
  data: function(){
    return obj;
  },
  methods:{
    updateUser(){
      axios.post('http://127.0.0.2/oo/index.php/api/edit_user', {
            f_name:this.edit_data.f_name,
            l_name:this.edit_data.l_name,
            email:this.edit_data.email,
            username:this.edit_data.username,
            pass:this.edit_data.password,
            role:this.edit_data.selected,
            id:this.edit_data.id,
            active:this.edit_data.status
          
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

})
</script>