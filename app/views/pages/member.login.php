   <div class="wrapper pull-left m">

       <div class="page-title">
           <h1>Login</h1>
           <p>Masukan email dan password dengan benar</p>
       </div>

       <form action="<?= SITE ?>/member/login" method="post" enctype="multipart/form-data" class="form">
           <label class="block">
               <b>Email</b>
               <input type="email" name="email" class="form-control" required="required" style="width:300px;" />
           </label>
           <label class="block">
               <b>Password</b>
               <input type="password" name="password" class="form-control" required="required" style="width:300px;" />
           </label>
           <button type="submit" name="submit" class="btn btn-large pull-left">Login</button>
       </form>
   </div>
   <a href="<?= SITE ?>/member/sign_up">Belum punya akun? Klik untuk Daftar</a>

   </div>