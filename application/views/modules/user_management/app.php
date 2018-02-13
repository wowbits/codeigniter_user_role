
    <?php

require 'registration_form_comp.php';
require 'user_table_comp.php';
require 'modal_form_comp.php';
require 'modal_delete_comp.php';
    ?>

<!--- wow---->


    <script type="text/javascript">
    
        var app=new Vue({
            el:"#app",
            data(){
              return obj;
            },
            methods:{
                 isActive: function (menuItem) {
                        return this.activeItem === menuItem;

                },//is Activ finish here
                setActive:function(active){
                    this.activeItem=active;

                },//setActive finish here
                updateUserTable:function(){
                axios.get('api/users')
                    .then(function (response) {
                        app.userTableData=response.data.response;
                        app.userTableData.reverse();
                        
                    })
                .catch(function (error) {
                        console.log(error);
              });
    
                },
                userRoles:function(){

                    axios.get('api/roles')
                    .then(function (response) {
                        app.roles=response.data.response;
                        console.log(app.roles);
                        
                        
                    })
                .catch(function (error) {
                        console.log(error);
                });
    

               }


            },//methodss finish here
            created:function(){
                this.setActive("users");
                this.updateUserTable(); 
                this.userRoles();
                                
            }//created finish here
        })




setInterval(function(){app.updateUserTable()}, 3000);

    </script>


</body>

</html>