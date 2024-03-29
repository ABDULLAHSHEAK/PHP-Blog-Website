 <?php
  include 'header.php';
  $query = "SELECT COUNT(*) AS total_posts FROM post";
  $run = mysqli_query($con, $query);
  $result = mysqli_fetch_assoc($run);
  ?>
 <!-- Begin Page Content -->

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
   <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
   <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
   <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
 </head>

 <body>
   <div class="grey-bg container-fluid">

     <section id="stats-subtitle">
       <div class="row">
         <div class="col-12 mb-1">
           <h4 class="text-uppercase">Site Statistics</h4>
         </div>
       </div>

       <div class="row">
         <div class="col-xl-6 col-md-12">
           <div class="card overflow-hidden">
             <div class="card-content">
               <div class="card-body cleartfix">
                 <div class="media align-items-stretch">
                   <div class="align-self-center mr-2">
                     <i class="icon-book-open primary font-large-2 float-right"></i>
                   </div>
                   <div class="media-body">
                     <h4>Total Posts</h4>
                     <span>Total Post </span>
                   </div>
                   <div class="align-self-center">
                     <h1><?= $result['total_posts'] ?></h1>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="col-xl-6 col-md-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body cleartfix">
                 <div class="media align-items-stretch">
                   <div class="align-self-center">
                     <i class="icon-pencil primary font-large-2 mr-2"></i>
                   </div>
                   <div class="media-body">
                     <h4>Total Category</h4>
                     <span>Total Post Category</span>
                   </div>
                   <div class="align-self-center">
                     <?php
                      $query2 = "SELECT COUNT(*) AS total_cat FROM category";
                      $run2 = mysqli_query($con, $query2);
                      $result2 = mysqli_fetch_assoc($run2);
                      ?>
                     <h1><?= $result2['total_cat'] ?></h1>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>


         <div class="col-xl-6 col-md-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body cleartfix">
                 <div class="media align-items-stretch">
                   <div class="align-self-center">
                     <i class="icon-user success font-large-2 mr-2"></i>
                   </div>
                   <div class="media-body">
                     <h4>Total Users</h4>
                     <span>Total Users </span>
                   </div>
                   <div class="align-self-center">
                     <?php
                      $query3 = "SELECT COUNT(*) AS total_users FROM users";
                      $run3 = mysqli_query($con, $query3);
                      $result3 = mysqli_fetch_assoc($run3);
                      ?>
                     <h1><?= $result3['total_users'] ?></h1>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>


         <div class="col-xl-6 col-md-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body cleartfix">
                 <div class="media align-items-stretch">
                   <div class="align-self-center">
                     <i class="icon-speech warning font-large-2 mr-2"></i>
                   </div>
                   <div class="media-body">
                     <h4>Total Comments</h4>
                     <span>Total Post Comments</span>
                   </div>
                   <div class="align-self-center">
                     <?php
                      $query4 = "SELECT COUNT(*) AS total_cmt FROM comments";
                      $run4= mysqli_query($con, $query4);
                      $result4 = mysqli_fetch_assoc($run4);
                      ?>
                     <h1><?=$result4['total_cmt']?></h1>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>


       </div>
     </section>
     <section id="minimal-statistics">
       <div class="row">
         <div class="col-12 mt-3 mb-1">
           <h4 class="text-uppercase">Minimal Statistics Cards</h4>
           <p>Statistics on minimal cards.</p>
         </div>
       </div>
       <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="align-self-center">
                     <i class="icon-pencil primary font-large-2 float-left"></i>
                   </div>
                   <div class="media-body text-right">
                     <h3>278</h3>
                     <span>New Posts</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="align-self-center">
                     <i class="icon-speech warning font-large-2 float-left"></i>
                   </div>
                   <div class="media-body text-right">
                     <h3>156</h3>
                     <span>New Comments</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="align-self-center">
                     <i class="icon-graph success font-large-2 float-left"></i>
                   </div>
                   <div class="media-body text-right">
                     <h3>64.89 %</h3>
                     <span>Bounce Rate</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="align-self-center">
                     <i class="icon-pointer danger font-large-2 float-left"></i>
                   </div>
                   <div class="media-body text-right">
                     <h3>423</h3>
                     <span>Total Visits</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="danger">278</h3>
                     <span>New Projects</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-rocket danger font-large-2 float-right"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="success">156</h3>
                     <span>New Clients</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-user success font-large-2 float-right"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="warning">64.89 %</h3>
                     <span>Conversion Rate</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-pie-chart warning font-large-2 float-right"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="primary">423</h3>
                     <span>Support Tickets</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-support primary font-large-2 float-right"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="primary">278</h3>
                     <span>New Posts</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-book-open primary font-large-2 float-right"></i>
                   </div>
                 </div>
                 <div class="progress mt-1 mb-0" style="height: 7px;">
                   <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="warning">156</h3>
                     <span>New Comments</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-bubbles warning font-large-2 float-right"></i>
                   </div>
                 </div>
                 <div class="progress mt-1 mb-0" style="height: 7px;">
                   <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="success">64.89 %</h3>
                     <span>Bounce Rate</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-cup success font-large-2 float-right"></i>
                   </div>
                 </div>
                 <div class="progress mt-1 mb-0" style="height: 7px;">
                   <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
           <div class="card">
             <div class="card-content">
               <div class="card-body">
                 <div class="media d-flex">
                   <div class="media-body text-left">
                     <h3 class="danger">423</h3>
                     <span>Total Visits</span>
                   </div>
                   <div class="align-self-center">
                     <i class="icon-direction danger font-large-2 float-right"></i>
                   </div>
                 </div>
                 <div class="progress mt-1 mb-0" style="height: 7px;">
                   <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>

   </div>
 </body>

 </html>
 <?php include 'footer.php' ?>