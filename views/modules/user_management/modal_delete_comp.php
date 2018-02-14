<template id="bs-modal">
    <!-- MODAL -->    
     <!-- Logout Modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
             <button @click="deleteUser" data-dismiss="modal" class="btn btn-primary">Logout</button>          </div>
        </div>
      </div>
  
</template>






<script type="text/javascript">
Vue.component('modal', {
    template: '#bs-modal',
    data: function () {
        console.log("### DATA");
    },
    methods:{
      deleteUser:function(){
      console.log("ls");
      app.updateUserTable();

      }
    }
});

  
</script>