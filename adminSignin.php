<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Sign In | SmartBook</title>

   <link rel="stylesheet" href="bootstrap.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
   <link rel="stylesheet" href="style.css" />

   <link rel="icon" href="resource/ebook.svg" />
</head>

<body class="main-body_admin">

   <div class="container-fluid justify-content-center" style="margin-top: 100px;">
      <div class="row align-content-center">

         <div class="col-12">
            <div class="row">
               <div class="col-12 logo"></div>
               <div class="col-12">
                  <p class="text-center title1 text-white">Hi, Welcome to smartbook Admins.</p>
               </div>
            </div>
         </div>

         <div class="col-12 p-5">
            <div class="row">

               <div class="col-6 d-none d-lg-block background"></div>
               <div class="col-12 col-lg-6 d-block">
                  <div class="row g-3">
                     <div class="col-12">
                        <p class="title2 text-white">Sign in to your account</p>
                     </div>
                     <div class="col-12">
                        <label class="form-label text-white">Email</label>
                        <input class="form-control" type="email" placeholder="Ex: john@gmail.com" id="e" />
                     </div>
                     <div class="col-12 col-lg-6 d-grid">
                        <button class="btn btn-primary" onclick="adminVerification();">Send Verification code</button>
                     </div>
                     <div class="col-12 col-lg-6 d-grid">
                        <button class="btn btn-danger" onclick="back();">Back to customer log In</button>
                     </div>
                  </div>
               </div>
            </div>

            <!-- -->

            <div class="modal" tabindex="-1" id="verificationModal">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Admin Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <label class="form-label">Enter Your Verification Code</label>
                        <input type="text" class="form-control" id="vcode">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- -->

            <div class="col-12 fixed-bottom text-center">
               <p>&copy;2022 eShop.lk|All Rights Reserved</p>
               <p class="fw-bold">Java Institute &trade;</p>
            </div>

         </div>
      </div>



      <script src="bootstrap.bundle.js"></script>
      <script src="script.js"></script>
</body>

</html>