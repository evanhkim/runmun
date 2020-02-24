<!Doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=content-language content="en-us" />
  <title>RunMUN</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/runmunlogo1.png">
  <meta name="author" content="Evan Kim">
  <meta name="keywords" content="RunMUN, MUN, BelMUN, Model United Nations, Debate, Management, Conference, Timer, MUN Program, MUN App, WCMUN, WorldMUN">
  <meta name="description" content="RunMUN is a free Model UN debate management software designed with numerous, customizable features to fit all of your committees, whether it be a General Assembly or Future Crisis Committee." >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" type='text/css' href='./css/main.css'>
  <link rel="stylesheet" type="text/css" href="./css/loading.css"/>
  <link rel="stylesheet" type="text/css" href="./css/loading-btn.css"/>
  <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet"> 
  <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/js/mdb.min.js"></script>
</head>

<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	<div class='loader text-center container-fluid'>
		<h1>RunMUN</h1>
		<img src="./img/loader.svg" width='50px' height='50px'></img>
	</div>
	<div class='update text-center container-fluid'>
		<img src="./img/loader.svg" width='50px' height='50px' style='position:absolute;top:calc(50% - 25px);'></img>
	</div>
	
	<div class="modal fade" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="countryModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="countryModalLabel">Select Countries</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style='height:450px;overflow-y:scroll;'>
					<select id="allCountry" class="custom-select" multiple size='15'>
						<option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Republic of the Congo">Republic of the Congo</option><option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option><option value="Costa Rica">Costa Rica</option><option value="Cote d&rsquo;Ivoire">Cote d&rsquo;Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Democratic People&rsquo;s Republic of Korea">Democratic People&rsquo;s Republic of Korea</option><option value="Republic of Korea">Republic of Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option> <option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="St. Kitts and Nevis">St. Kitts and Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Vincent and the Grenadines">St. Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
    					</select>
				</div>
				<div class="modal-footer">
					<button type="button" id='admin-selectAll' class="btn btn-default">Select All</button>
					<button type="button" id='admin-deselectAll' class="btn btn-default">Deselect All</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="settingModalLabel">Settings</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style='height:450px;overflow-y:scroll;'>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class='root'>
		<span class='navbar-text custBtn' style='float:right; margin-top:20px; margin-right:20px;padding:0;z-index:-1;'>
			<img id="screenBtn" src="img/enterFullScreen2.png" height='30px' width='30px'>
		</span>
		<span class='navbar-text' style='float:right;padding:0;margin-left:20px;z-index:-1;'>			
			<p id='quorum-third' style='float:right;margin-top:26px; margin-right:10px;padding:0;' ></p>
			<img src='./img/oneThirdCom.png' height=20 width=20 style='float:right;margin-top:26px; margin-right:10px;padding:0;'></img>
			<p id='quorum-half' style='float:right;margin-top:26px; margin-right:10px;padding:0;'></p>
			<img src='./img/oneHalfCom.png' height=20 width=20 style='float:right;margin-top:26px; margin-right:10px;padding:0;'></img>
			<p id='quorum-all' style='float:right;margin-top:26px; margin-right:10px;padding:0;'></p>
			<img src='./img/allCom.png' height=20 width=20 style='float:right;margin-top:26px; margin-right:10px;padding:0;'></img>
		</span>
		<span class='navbar-text' style='float: left;margin-left: 50px;margin-top: 20px; z-index: -1;margin-right: 20px;'>	
			<img id='logo' src="./img/runmunlogo1.png" width="25" height="25" class="d-inline-block align-top" alt="" >    RunMUN
		</span>
		
		<div class='container'>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item" style=''>
							<a class="nav-link" id='admin-btn' href='javascript:void(0);'>Admin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id='rc-btn' href='javascript:void(0);'>Roll Call</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id='rm-btn' href='javascript:void(0);'>Record Motion</a>
						</li>
						<li class="nav-item dropdown">
					        	<a class="nav-link dropdown-toggle" href="#" id="speakerDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Speakers Lists
					        	</a>
					        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						        	<a class="dropdown-item" id='ps-btn' href='javascript:void(0);'>Primary</a>
						        	<a class="dropdown-item" id='ss-btn' href='javascript:void(0);'>Secondary</a>
					        	</div>
						</li>
						<li class="nav-item dropdown">
					        	<a class="nav-link dropdown-toggle" href="#" id="caucusDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Caucuses
					        	</a>
					        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						        	<a class="dropdown-item" id='mc-btn' href='javascript:void(0);'>Moderated Caucus</a>
						        	<a class="dropdown-item" id='uc-btn' href='javascript:void(0);'>Unmoderated Caucus</a>
					        	</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" id='vo-btn' href='javascript:void(0);'>Voting</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id='no-btn' href='javascript:void(0);'>Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id='st-btn' href='javascript:void(0);'><i class="fas fa-chart-bar"></i></a>
						</li>
						<li class="nav-item dropdown">
							<a a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						        	<!--<a class="dropdown-item" id='crisis-btn' href='javascript:void(0);'>Go to Crisis</a>-->
						        	<a class="dropdown-item" id='logOut' href='javascript:void(0);'>Log Out</a>
						        	<a class="dropdown-item" id='goToCrisis' href='javascript:void(0);'>Crisis</a>
					        	</div>
						</li>
					</ul>
				</div>	
			</nav>
			
			<div class="row body" style='border:none; box-shadow: 0 0px 0px 0; margin:0;'>
				<div class='col'>
					<input id='comName' class="form-control form-control-lg text-center" style='margin-bottom:2px;'type="text" placeholder="Committee Name">
					<input id='comTopic' class="form-control text-center" type="text" placeholder="Committee Topic">
				</div>
			</div>
			
			<div id='admin' class="row body">
				<div class="col">
					<h3>Admin</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='admin-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
				</div>
				<div class='row' style='padding-left:5px;padding-right:5px;'>
					<div class='col-6' >
						<h4 class='text-center'>Edit Delegations</h4>
						<form id='addDelForm'>
							<div class="form-group">
								<label for="addDel">Type or Select Delegations</label>
    								<input type="text" class="form-control" id="addDel" placeholder="Enter Delegates" maxlength='40' autocomplete="off" list="countries" >
    								<datalist class='dropdown' id="countries">
<option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria"></option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Republic of the Congo">Republic of the Congo</option><option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option><option value="Costa Rica">Costa Rica</option><option value="Cote d&rsquo;Ivoire">Cote d&rsquo;Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Democratic People&rsquo;s Republic of Korea"></option><option value="Republic of Korea">Republic of Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option> <option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="St. Kitts and Nevis">St. Kitts and Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Vincent and the Grenadines">St. Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
								</datalist>
							</div>
						</form>
						
						<div id='list-admin' class="btn btn-primary btn-block ld-ext-right" style='margin-bottom:1em;' data-toggle="modal" data-target="#countryModal">
							Country List
							<div class="ld ld-ring ld-spin"></div>
						</div>
						<form>
							<div class="form-group">
								<label for="delList">Delegates</label>
								<select id='delList' multiple class="form-control" size='10'>
								</select>
							</div>
						</form>	
						<div class='row' style='padding-left:15px;padding-right:15px;'>
		  					<div class='col'>
		  						<div id='rem-admin' class="btn btn-primary btn-block ld-ext-right">
									Remove
									<div class="ld ld-ring ld-spin"></div>
								</div>
		  					</div>
			  				<div class='col'>
		  						<div id='remAll-admin' class="btn btn-secondary btn-block ld-ext-right">
									Clear All
									<div class="ld ld-ring ld-spin"></div>
								</div>
		  					</div>
	  					</div>			
					</div>
					
					<div class='col-6' >
						<h4 class='text-center'>Flag Customization</h4>
						<form>
							<label for="file-upload" style='display:block;'>
								<div class='text-center' style='margin:2em;'>
									<img id='flagImg' src="./img/allFlag/united-nations.png" class='img-fluid' style='height:40vh;'>
								</div>
							</label>
							<input id="file-upload" style='display:none;' class='form-control-file' type="file" accept="image/jpeg, image/png"/>
						</form>
						<div class="alert warning border-warning alert-dismissible error-box" id='flag-error-box'>
							<a class="close" aria-label="close">&times;</a>
							<strong></strong>
							<h6></h6>
						</div>
		  				<div id='res-admin' class="btn btn-primary btn-block ld-ext-right">
							Reset Image
							<div class="ld ld-ring ld-spin"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div id='rc' class="row body" style='display:block;'>	
				<div class="col">
					<h3>Roll Call</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='rc-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<table class="table text-center table-hover table-light">
						<thead class='thead-light' >
						<tr>
							<th scope="col">Delegate Name</th>
							<th scope="col">Present</th>
							<th scope="col">Present and Voting</th>
						</tr>
						</thead>
					</table>
					<div style='max-height:40vh;overflow-y:scroll;margin-bottom:1rem;'>
						<table class="table text-center table-hover table-light table-sm" id='rc-table'>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class='row' style='padding-left:15px;padding-right:15px;'>
		  				<div class='col'>
		  					<div id='deSel-table' class="btn btn-primary btn-block ld-ext-right">
								Deselect All
								<div class="ld ld-ring ld-spin"></div>
							</div>
		  				</div>
			  			<div class='col'>
		  					<div id='sel-table' class="btn btn-secondary btn-block ld-ext-right">
								Select All
								<div class="ld ld-ring ld-spin"></div>
							</div>
		  				</div>
	  				</div>	
				</div>
			</div>
			
			<div id='rm' class="row body justify-content-md-center" style='max-height: 60vh;overflow: scroll;'>	
				<div class="col">
					<h3>Record Motion</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='rm-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del1">Delegates</label>
							<select id='rm-del1' class="form-control"><option selected="true" disabled >Select Delegate</option></select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo11'>Motion</label>
							<select id='rm-mol1' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top1'>Topic</label>
							<input id='rm-top1' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur1'>Duration</label>
							<input id='rm-dur1' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp1'>Speaking Time</label>
							<input id='rm-sp1' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add1' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del2">Delegates</label>
							<select id='rm-del2' class="form-control"><option selected="true" disabled >Select Delegate</option></select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo12'>Motion</label>
							<select id='rm-mol2' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top2'>Topic</label>
							<input id='rm-top2' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur2'>Duration</label>
							<input id='rm-dur2' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp2'>Speaking Time</label>
							<input id='rm-sp2' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add2' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del3">Delegates</label>
							<select id='rm-del3' class="form-control"><option selected="true" disabled >Select Delegate</option></select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo13'>Motion</label>
							<select id='rm-mol3' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top3'>Topic</label>
							<input id='rm-top3' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur3'>Duration</label>
							<input id='rm-dur3' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp3'>Speaking Time</label>
							<input id='rm-sp3' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add3' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del4">Delegates</label>
							<select id='rm-del4' class="form-control"><option selected="true" disabled >Select Delegate</option></select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo14'>Motion</label>
							<select id='rm-mol4' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top4'>Topic</label>
							<input id='rm-top4' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur4'>Duration</label>
							<input id='rm-dur4' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp4'>Speaking Time</label>
							<input id='rm-sp4' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add4' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del5">Delegates</label>
							<select id='rm-del5' class="form-control">
								<option selected="true" disabled >Select Delegate</option>
							</select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo15'>Motion</label>
							<select id='rm-mol5' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top5'>Topic</label>
							<input id='rm-top5' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur5'>Duration</label>
							<input id='rm-dur5' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp5'>Speaking Time</label>
							<input id='rm-sp5' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add5' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="rm-del6">Delegates</label>
							<select id='rm-del6' class="form-control"><option selected="true" disabled >Select Delegate</option></select>
						</div>
						<div class='col-2' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-mo16'>Motion</label>
							<select id='rm-mol6' class="form-control">
								<option selected="true" disabled >Select Motion</option>
								<option value='1'>Moderated Caucus</option>
								<option value='2'>Unmoderate Caucus</option>
								<option value='3'>Other Motion</option>
							</select>
						</div>
						<div class='col-3' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-top6'>Topic</label>
							<input id='rm-top6' type="text" class="form-control" placeholder="Topic"maxlength="30">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-dur6'>Duration</label>
							<input id='rm-dur6' type="text" class="form-control" onkeydown="validate(event)" placeholder="mm:ss" maxlength="4">
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;'>
							<label for='rm-sp6'>Speaking Time</label>
							<input id='rm-sp6' type="text" class="form-control" onkeydown="validate(event)" placeholder="m:ss" maxlength="3">
						</div>
						<div class='col' style='padding-top:30px;padding-bottom:15px;padding-right:15px;'>
							<div id='rm-add6' class="btn btn-primary btn-block ld-ext-right" onclick="rmClick(this)">
								Add
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id='ps' class="row body">	
				<div class="col">
					<h3>Primary Speakers List</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='ps-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					
					<div class='text-center'>
						<h4><span id='psDispSp'>0:00</span> <span>/</span> <span id='psDispDur'>1:00</span></h4>
					</div>
					
					<div class="progress" style='margin-bottom:1rem;'>
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id='psBar' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					
					<div class='divide'></div>
					
					<div class='row justify-content-end' style='padding-left:15px;padding-right:15px;'>
						<div class='col-6 text-center'>
							<h3 id='ps-name' style='margin-bottom:1rem;'>Delegate Name</h3>
							<img id='ps-flag' src="./img/allFlag/united-nations.png" class='img-fluid' style='height:40vh;'>
						</div>
						
						<div class='col-6'>
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
								<select id='ps-del-form' class="form-control del-speaker-form">
									<option selected="true" disabled >Add Delegate to Primary Speakers List</option>
								</select>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
								<select id='ps-del' class="form-control del-form" size=10 style='height:30vh;'>
								</select>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px;'>
								<div class='col'>
			  						<button id='psYield' type="button" class="btn btn-outline-secondary btn-block disabled yield">Yield</button>		</div>
								<div class='col'>
			  						<button id='psRemove' type="button" class="btn btn-outline-secondary btn-block disabled remove">Remove</button>		</div>
								<div class='col'>
			  						<button id='psClearAll' type="button" class="btn btn-outline-secondary btn-block disabled clearAll">Clear All</button>		</div>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
			  					<div class='col'>
			  						<button id='psStart' type="button" class="btn btn-outline-secondary btn-block disabled" onclick="start('ps');move('ps')">Start</button>
			  					</div>
				  				<div class='col'>
			  						<button id='psPause' type="button" class="btn btn-outline-secondary btn-block 
disabled" onclick="pause('ps')">Pause</button>
			  					</div>
			  					<div class='col'>
			  						<button id='psNext' type="button" class="btn btn-outline-secondary btn-block disabled next">Next</button>			</div>
		 					</div>
		 						
							<form>
								<div class="form-row">
									<div class='col'>
										<label for='psDur'>Speaking Time</label>
									</div>
									<div class='col'>
										<input id='psDur' type="text" class="input_dur form-control text-center float-right" placeholder="m:ss" value='100' onkeydown="validate(event)" maxlength='3' style='width:120px;'>
									</div>
								</div>
								
							</form>
						</div>
					</div>
					<p id='psCur' hidden>000</p>
				</div>
			</div>
			
			<div id='ss' class="row body">
				<div class="col">
					<h3>Secondary Speakers List</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='ss-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					
					<div class='text-center'>
						<h4><span id='ssDispSp'>0:00</span> <span>/</span> <span id='ssDispDur'>1:00</span></h4>
					</div>
					
					<div class="progress" style='margin-bottom:1rem;'>
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id='ssBar' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					
					<div class='divide'></div>
					
					<div class='row justify-content-end' style='padding-left:15px;padding-right:15px;'>
						
						<div class='col-6 text-center'>
							<h3 id='ss-name' style='margin-bottom:1rem;'>Delegate Name</h3>
							<img id='ss-flag' src="./img/allFlag/united-nations.png" class='img-fluid' style='height:40vh;'>
						</div>
						
						<div class='col-6'>
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
								<select id='ss-del-form' class="form-control  del-speaker-form">
									<option selected="true" disabled >Add Delegate to Secondary Speakers List</option>
								</select>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
								<select id='ss-del' class="form-control del-form" size=10 style='height:30vh;'>
								</select>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px;'>
								<div class='col'>
			  						<button id='ssYield' type="button" class="btn btn-outline-secondary btn-block disabled yield">Yield</button>		</div>
								<div class='col'>
			  						<button id='ssRemove' type="button" class="btn btn-outline-secondary btn-block disabled remove">Remove</button>		</div>
								<div class='col'>
			  						<button id='ssClearAll' type="button" class="btn btn-outline-secondary btn-block disabled clearAll">Clear All</button>		</div>
							</div>
							
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
			  					<div class='col'>
			  						<button id='ssStart' type="button" class="btn btn-outline-secondary btn-block disabled" onclick="start('ss');move('ss')">Start</button>
			  					</div>
				  				<div class='col'>
			  						<button id='ssPause' type="button" class="btn btn-outline-secondary btn-block 
disabled" onclick="pause('ss')">Pause</button>
			  					</div>
			  					<div class='col'>
			  						<button id='ssNext' type="button" class="btn btn-outline-secondary btn-block disabled next">Next</button>			</div>
		 					</div>
		  					
							<form>
								<div class="form-row">
									<div class='col'>
										<label for='ssDur'>Speaking Time</label>
									</div>
									<div class='col'>
										<input id='ssDur' type="text" class="input_dur form-control text-center float-right" placeholder="m:ss" value='100' onkeydown="validate(event)" maxlength='3' style='width:120px;'>
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
					<p id='ssCur' hidden>000</p>
				</div>	
			</div>
			
			<div id='mc' class="row body">
				<div class="col">
					<h3>Moderated Caucus</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='mc-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					
					<input id='mcTopic' class="form-control form-control-lg text-center" style='margin-bottom:1rem;'type="text" placeholder="Mod Topic">
					
					<div class='text-center'>
						<h4><span id='mcDispSpT'>0:00</span> <span>/</span> <span id='mcDispSpDur'>1:00</span></h4>
					</div>
					
					<div class="progress" style='margin-bottom:1rem;'>
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id='mcBar1' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					
					<div class='text-center'>
						<h4><span id='mcDispSp'>0:00</span> <span>/</span> <span id='mcDispDur'>10:00</span></h4>
					</div>
					
					<div class="progress" style='margin-bottom:1rem;'>
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id='mcBar' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					
					<div class='row justify-content-end' style='padding-left:15px;padding-right:15px;'>
						<div class='col-6 text-center'>
							<h3 id='mc-name' style='margin-bottom:1rem;'>Delegate Name</h3>
							<img id='mc-flag' src="./img/allFlag/united-nations.png" class='img-fluid' style='height:40vh;'>
						</div>
						<div class='col-6'>
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
			  					<div class='col'>
			  						<button id='mcStart' type="button" class="btn btn-outline-secondary btn-block " onclick="start('mc');move('mc')">Start</button>
			  					</div>
				  				<div class='col'>
			  						<button id='mcPause' type="button" class="btn btn-outline-secondary btn-block 
disabled" onclick="pause('mc')">Pause</button>
			  					</div>
			  					<div class='col'>
			  						<button id='mcReset' type="button" class="btn btn-outline-secondary btn-block" onclick="reset('mc')">Reset</button>		  					</div>
		  					</div>		
							<form>
								<div class="form-row">
									<div class='col' style='margin-bottom:1rem;'>
										<label for='mcDurSp'>Speaking Time</label>
									</div>
									<div class='col'>
										<input id='mcDurSp' type="text" class="input_sp form-control text-center float-right" placeholder="m:ss" value='100' onkeydown="validate(event)" maxlength='3' style='width:120px;'>
									</div>
								</div>
								<div class="form-row">
									<div class='col' style='margin-bottom:1rem;'>
										<label for='mcDur'>Duration</label>
									</div>
									<div class='col'>
										<input id='mcDur' type="text" class="input_dur form-control text-center float-right" placeholder="mm:ss" value='1000' onkeydown="validate(event)" maxlength='4' style='width:120px;'>
									</div>
								</div>
								<div class="form-row">
									<div class='col'>
										<label for="mc-del">Delegates</label>
										<select id='mc-del' class="form-control" size=10 style='height:30vh;'>
										</select>
									</div>
								</div>
							</form>
						</div>
					</div>
					<p id='mcCur' hidden>000</p>
					<p id='mcCurSp' hidden>000</p>
				</div>	
			</div>
			
			<div id='uc' class="row body">	
				<div class="col">
					<h3>Unmoderated Caucus</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='uc-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					
					<input id='ucTopic' class="form-control form-control-lg text-center" style='margin-bottom:1rem;'type="text" placeholder="Unmod Topic">
					<div class='text-center'>
						<h4><span id='ucDispSp'>0:00</span> <span>/</span> <span id='ucDispDur'>10:00</span></h4>
					</div>
					
					<div class="progress" style='margin-bottom:1rem;'>
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id='ucBar' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					
					<div class='divide'></div>
					
					<div class='row justify-content-end' style='padding-left:15px;padding-right:15px;'>
						
						<div class='col-6'>
							<div class='row' style='padding-left:15px;padding-right:15px; margin-bottom:1rem;'>
			  					<div class='col'>
			  						<button id='ucStart' type="button" class="btn btn-outline-secondary btn-block" onclick="start('uc');move('uc')">Start</button>
			  					</div>
				  				<div class='col'>
			  						<button id='ucPause' type="button" class="btn btn-outline-secondary btn-block 
disabled" onclick="pause('uc')">Pause</button>
			  					</div>
			  					<div class='col'>
			  						<button id='ucReset' type="button" class="btn btn-outline-secondary btn-block" onclick="reset('uc')">Reset</button>		  					</div>
		  					</div>		
							<form>
								<div class="form-row">
									<div class='col'>
										<label for='ucDur'>Duration</label>
									</div>
									<div class='col'>
										<input id='ucDur' type="text" class="input_dur form-control text-center float-right" placeholder="mm:ss" value='1000' onkeydown="validate(event)" maxlength='4' style='width:120px;'>
									</div>
								</div>
								
							</form>
						</div>
						<p id='ucCur' hidden>000</p>
					</div>
				</div>
			</div>
			
			<div id='vo' class="row body">
				<div class="col">
					<h3>Voting</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='vo-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class="row" style='margin-left:15px;margin-right:15px;background:rgba(55,55,55,.03);margin-bottom:1rem;'>
						<div class='col text-center' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
							<label for="vo-list">Delegates</label>
							<select id='vo-list' class="form-control" size=10 style='height:30vh; margin-bottom:1rem;'>
							</select>
							<div class="btn-group" role="group">
								<button id='vo-yes-btn' type="button" class="btn btn-outline-primary">Yes</button>
								<button id='vo-abst-btn'type="button" class="btn btn-outline-secondary">Abstain</button>
								<button id='vo-no-btn' type="button" class="btn btn-outline-danger">No</button>
							</div>
						</div>
						<div class='col' style='padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;'>
						
							<h5 class='text-center' style='margin-bottom:1rem;'>Outcome</h5>
							<p class='text-center' style='margin-bottom:1rem;'>In Favor: <span id='vo-yes'>0</span> </p>
							<p class='text-center' style='margin-bottom:1rem;'>Against: <span id='vo-no'>0</span></p>
							<p class='text-center' style='margin-bottom:1rem;'>Abstentions: <span id='vo-abst'>0</span></p>
							
							<div id='vo-reset' class="btn btn-outline-primary btn-block ld-ext-right" onclick="fail('vo')">
								Reset Vote
								<div class="ld ld-ring ld-spin"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id='no' class="row body">	
				<div class="col" style='overflow-y:scroll;'>
					<h3>Notes</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='no-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div id='toolbar'>
	        			</div>
	        			<div id="editor">
					</div>
				</div>
			</div>
			
			<div id='st' class="row body">
				<div class="col" style='overflow-y:scroll;'>
					<h3>Statistics</h3>
					<div class='divide'></div>
					<div class="alert warning border-warning alert-dismissible error-box" id='st-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div id='st-wrap' style='margin-bottom:1rem;'>
						<canvas id="st-chart" width="400" maxheight="2000"></canvas>
					</div>
					
					<div id='st-reset' class="btn btn-outline-danger btn-block ld-ext-right">
						Reset Statistics
						<div class="ld ld-ring ld-spin"></div>
					</div>
				</div>
			</div>
			
			<footer class="page-footer font-small unique-color-dark"> 
				<div class="footer-copyright text-center py-3"><span>Made By Evan Kim</span> 
					© 2018 Copyright:
					<a href="https://runmun.app"> runmun.app</a><a id='closeCopy' class='custBtn' style='padding:3px;'>&times;</a>
				</div>
			</footer>
		</div>
		<input type="hidden" id='email' value="">  
		<select id='delData' style='display:none;'></select>
		<select id='delStatus' style='display:none;'></select>
		<select id='delStat' style='display:none;'></select>	
	<script src="./js/committee.js"></script>
</body>