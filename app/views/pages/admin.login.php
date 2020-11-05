   <div class="wrapper pull-left m">

       <div class="page-title">
           <h1>Dashboard Login</h1>
           <p>Masukan username dan password dengan benar</p>
       </div>

       <form action="<?= SITE ?>/admin/login" method="post" enctype="multipart/form-data" class="form">
           <label class="block">
               <b>Username</b>
               <input type="text" name="username" class="form-control" required="required" style="width:300px;" />
           </label>
           <label class="block">
               <b>Password</b>
               <input type="password" name="password" class="form-control" required="required" style="width:300px;" />
           </label>
           <button type="submit" name="submit" class="btn btn-large pull-left">Submit</button>
       </form>
   </div>

   <div style="height:30px; width:100%" class="pull-left"></div>

   </div>

   <div style="margin-bottom: 7.2em;"></div>