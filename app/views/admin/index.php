<?php include_once APPROOT . '/views/inc/admin-header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/admin.css">
<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300&family=Poiret+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<style>
  body {
    background-color: #efefef;
  }
  td {
    font-size: 18px !important;
  }
  p {
  font-size: 35px;
  font-weight: 100;
  font-family: 'product sans';  
  }  

  .main-section{
	width:100%;
	margin:0 auto;
	text-align: center;
	padding: 0px 5px;
}
.dashbord{
	width:23%;
	display: inline-block;
	background-color:#34495E;
	color:#fff;
	margin-top: 50px; 
}
.icon-section i{
	font-size: 30px;
	padding:10px;
	border:1px solid #fff;
	border-radius:50%;
	margin-top:-25px;
	margin-bottom: 10px;
	background-color:#34495E;
}
.icon-section p{
	margin:0px;
	font-size: 20px;
	padding-bottom: 10px;
}
.detail-section{
	background-color: #2F4254;
	padding: 5px 0px;
}
.dashbord .detail-section:hover{
	background-color: #5a5a5a;
	cursor: pointer;
}
.detail-section a{
	color:#fff;
	text-decoration: none;
}
.dashbord-green .icon-section,.dashbord-green .icon-section i{
	background-color: #16A085;
}
.dashbord-green .detail-section{
	background-color: #149077;
}

.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	background-color: #2980B9;
}
.dashbord-blue .detail-section{
	background-color:#2573A6;
}
.dashbord-red .icon-section,.dashbord-red .icon-section i{
	background-color:#E74C3C;
}
.dashbord-red .detail-section{
	background-color:#CF4436;
}

  
</style>
    <main>
        <?php if(isset($_SESSION['admin_id'])) { ?>
          <div class="container">

            <div class="main-section">
              <div class="dashbord">
                <div class="icon-section">
                  <i class="fa fa-users" aria-hidden="true"></i><br>
                 Total Flyer
                  <p>0</p>
                </div>
               
              </div>
              <div class="dashbord dashbord-green">
                <div class="icon-section">
                  <i class="fa fa-inr" aria-hidden="true"></i><br>
                 Amount
                  <p>₹ 0</p>
                </div>
               
              </div>
              <div class="dashbord dashbord-red">
                <div class="icon-section">
                  <i class="fa fa-plane" aria-hidden="true"></i><br>
                 Flights
                  <p>0</p>
                </div>
               
              </div>     
              
              <div class="dashbord dashbord-blue">
                <div class="icon-section">
                  <i class="fa fa-plane fa-rotate-180" aria-hidden="true"></i><br>
                 Available Airlines
                  <p>0</p>
                </div>
               
              </div>  
              
            </div>

          <div class="card mt-4" id="flight">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's Flights</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class="text-secondary">Today's Flights</p>
        <table class="table-sm table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airlines</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>     
              <!-- Flights will be populated from the database -->
          </tbody>
        </table>        
      
      </div>
    </div>

    <div class="card" id="issue">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class="text-secondary">Today's Flight Issues</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <!-- Flights will be populated from the database -->
          </tbody>
        </table>        
      
      </div>
    </div> 

    <div class="card" id="dep">
      <div class="card-body">
          <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class=" text-secondary">Flights Departed Today</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <!-- Flights will be populated from the database -->
          </tbody>
        </table>        
      
      </div>
    </div>       

    <div class="card mb-4" id="arr">
      <div class="card-body">
        <div class="dropdown" style="float: right;">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-filter"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#flight">Today's flight</a>
              <a class="dropdown-item" href="#issue">Today's flight issues</a>
              <a class="dropdown-item" href="#dep">Flights departed today</a>
              <a class="dropdown-item" href="#arr">Flights arrived today</a>
            </div>
          </div>        
        <p class=" text-secondary">Flights Arrived Today</p>
        <table class="table-sm table table-hover">
        <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Arrival</th>
              <th scope="col">Departure</th>
              <th scope="col">Destination</th>
              <th scope="col">Source</th>
              <th scope="col">Airline</th>
            </tr>
          </thead>
          <tbody>
              <!-- Flights will be populated from the database -->
          </tbody>
        </table>        
      
      </div>
    </div>      
  </div>
<?php } ?>
    </main>
<?php include_once APPROOT . '/views/inc/admin-footer.php'; ?>
