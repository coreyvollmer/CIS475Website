<?php
 $title = "CIS 475 PHP Homepage";
 $pageName = $title;
 $name = "Corey Vollmer";
 $webServerSoftware = "XAMPP 7.1.9";
 $editor = "Visual Studio Code 1.16.1 with FTP-Sync Extention";
 $os = "Linux Mint 18.2 Cinnamon 64-bit";
 $coinHivePublicSiteKey="Xgkwvq6VoJ4Xz4E233SuXB5RNnSRNh0B";
 $helloText="Hello, my name is Corey Vollmer. Welcome to my PHP Homepage. This is my final 
 semester as a CIS student at Buffalo State. I currently work as the IT Administrator for a local group 
 home, as well as being a dairy employee at Wegmans. I live with my girlfriend Caitlyn in Tonawanda. I plan 
 on getting my masters degree in Data Science on top of a full time programming job in Buffalo after I graduate
 in December. Hire me! (:";
 $pageNames = array("Home","Resume","CCMiner","Server Setup","Arrays");
 $pageFiles = array("index","resume","cryptoMiner","setup","lfa"); 
 
 
$stateList = array("AL" => "Alabama", "AK" => "Alaska", "AZ" => "Arizona", "AR" => "Arkansas", "CA" => "California", 
"CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "FL" => "Florida", "GA" => "Georgia", "HI" => "Hawaii", 
"ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", 
"LA" => "Louisiana", "ME" => "Maine", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", 
"MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada",
"NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina",
"ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania",
"RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas",
"UT" => "Utah", "VT" => "Vermont", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia",
"WI" => "Wisconsin", "WY" => "Wyoming");

//create empty form vars = to empty set ""
$firstName = $lastName = $address = $city = $state = $zipCode = $phone = $email = $comment =
$firstNameErr = $lastNameErr = $addressErr = $cityErr = $stateErr = $zipCodeErr = $phoneErr = $emailErr = $commentErr = "";

$dbUsername = "vollmecm01"; // Your bsc username
$dbPassword = "B00762820"; // Your bsc Banner ID beginning with 'B'
$dbDatabase = $dbUsername; // your-bsc-username
$dbServer = "localhost" ;
$sqlConn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
$thankYouMessage = "";

?>

