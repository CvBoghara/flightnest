<?php include_once APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" type="text/css"
        href="styles%2c_bootstrap4%2c_bootstrap.min.css%2bplugins%2c_font-awesome-4.7.0%2c_css%2c_font-awesome.min.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl.carousel.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } ;</script>	
	<div class="main-agileinfo">
		<h1 class="text-light brand mt-2">
			<img src="<?php echo URLROOT; ?>/assets/images/airtic.png" 
				height="105px" width="105px" alt="">				
		FlightNest</h1>
		<div class="sap_tabs">			
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>Round Trip</span></li>
					<li class="resp-tab-item"><span>One way</span></li>
				</ul>	
				<div class="clearfix"> </div>	
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content roundtrip">
						<form action="<?php echo URLROOT; ?>/flights/book" method="post">
							<input type="hidden" name="type" value="round">
							<div class="from">
								<h3 style="color: rgba(255, 255, 255, 0.767);">From</h3>
								<select class="" name="dep_city" id="w3_country1">
								<option value="0" selected disabled >Departure</option>
                                <!-- Cities will be populated from the database -->
								</select>  
							</div>
							<div class="to">
								<h3 style="color: rgba(255, 255, 255, 0.767);">To</h3>
								<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Arrival</option>
                                <!-- Cities will be populated from the database -->
								</select>							
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Depart</h3>
									<input class="form-control" name="dep_date" type="date"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="return">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Return</h3>
									<input class="form-control"  name="ret_date" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="clear"></div>
							</div>
							<div class="class">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Class</h3>
								<select id="w3_country1" 
									name="f_class" onchange="change_country(this.value)" class="frm-field required">
									<option value="E">Economy</option>  
									<option value="B">Business</option>   
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Flyer</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<input type="hidden" name="passengers"
												 class="input_val" value="1">
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" value="Search Flights" name="search_but">
						</form>						
					</div>		
					<div class="tab-1 resp-tab-content oneway">
						<form action="<?php echo URLROOT; ?>/flights/book" method="post">
							<input type="hidden" name="type" value="one">
							<div class="from">
								<h3 style="color: rgba(255, 255, 255, 0.767);">From</h3>								
								<select value="0" name="dep_city" id="w3_country1">
								<option selected disabled>Departure</option>
                                <!-- Cities will be populated from the database -->
								</select> 														
							</div>
							<div class="to">
								<h3>To</h3>								
								<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Arrival</option>
                                <!-- Cities will be populated from the database -->
								</select>									
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Depart</h3>
									<input name="dep_date" type="date" 
										class="form-control"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
							</div>
							<div class="class">
								<h3 style="color: rgba(255, 255, 255, 0.767);">Class</h3>
								<select id="w3_country1" name="f_class"
									onchange="change_country(this.value)" class="frm-field required">
									<option value="E">Economy</option>  
									<option value="B">Business</option>   
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3 style="color: rgba(255, 255, 255, 0.767);">Flyer</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<input type="hidden" name="passengers"
												 class="input_val" value="1">											
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" value="Search Flights" name="search_but">
						</form>																				
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="conatiner-fluid p-4" style="background-color: whitesmoke;margin-top:150px;">
<div class="intro">
            <div class="intro_background" style="background-image:url(images/intro.png)"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="intro_container">
                            <div class="row">
                                <div class="col-lg-4  intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="<?php echo URLROOT; ?>/assets/images/beach.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">Top Destinations</div>
                                            <div class="intro_subtitle">
                                                <p>What's on your travel bucket list?</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="<?php echo URLROOT; ?>/assets/images/wallet.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">The Best Prices</div>
                                            <div class="intro_subtitle">
                                                <p>Visit your favourite places at a reasonable price</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 intro_col">
                                    <div class="intro_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="intro_icon"><img src="<?php echo URLROOT; ?>/assets/images/suitcase.svg" alt=""></div>
                                        <div class="intro_content">
                                            <div class="intro_title">Amazing Services</div>
                                            <div class="intro_subtitle">
                                                <p>Great interactions begin with knowing your customers wants and needs.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			</div>
	</div>
<?php include_once APPROOT . '/views/inc/footer.php'; ?>
