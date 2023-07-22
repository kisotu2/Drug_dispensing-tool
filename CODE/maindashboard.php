<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="maindashboardsheet.css">
	<style>
body, html {
    margin: 0;
  }

.container {
  background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
  
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  position: relative;
  z-index: 1;
  min-height: 100vh;
}

.container:before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgb(0, 0, 0, 0.2);
  z-index: -1;
}
a {
    text-decoration: underline;

}
header{
color:rgb(22, 21, 21);
background-color:rgb(146, 186, 199) ;
background-size: 10cm;
text-indent: 35%;
font-size: x-large;
font-family: Georgia, 'Times New Roman', Times, serif;

}

.bg-image {
    /* The image used */
    background-image: url("https://img.freepik.com/free-photo/medicine-capsules-global-health-with-geometric-pattern-digital-remix_53876-126742.jpg?w=2000");
    
    /* Add the blur effect */
    filter: blur(8px);
    -webkit-filter: blur(8px);
    
    /* Full height */
    height: auto; 
    
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: repeat;
    background-size: cover;
    overflow: scroll;
  }
  
  /* Position text in the middle of the page/image */
  .hero {
    color: rgb(15, 14, 14);
    font-weight: bold;
    text-align: center;
    align-items: center;
    padding: 100px 20%;
  }
 
  
  h1{
    font-weight: 1000;
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0, 0.4);
    padding:1%; /* Black w/opacity/see-through */
  }
 h3,h4{
    font-size: xx-large;
    color: rgb(82, 2, 2);
   
 }
 
 h5,h6{
    font-size: 30px;
    font-style:italic;
    color:whitesmoke;
 }

p{
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
    font-style: italic;
    
    text-indent: 10%;
}
h5+p{
    font-size: 18px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-style: italic;
    font-weight: 600;
    text-indent: 10%;
}

a:hover{
color: aqua;
}
a{
    text-decoration: none;
    color: rgb(15, 14, 14);
}
h6+a a a {
    font-size: 10px;
    font-weight: 400;
}
ul{
  font-size: medium;
}


    </style>
</head>
<body>
    <div class = "container">
    <header>
        <a href="about.php">About</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="https://www.pharmacytimes.com/news" >News</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href ="gallery.php">Gallery</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href= "loginpage.php">Login</a> 
    </header>
    <div class = "hero">
    <h1> LIFE BEYOND CARE </h1><br>
    <h2>Over 20 Major Hospitals in Kenya use Sam's Pharmessy to provide better services to their patients<br></h2>
   <p>
    <h3>
        <em>
            <a href ="learnmore.php">Learn More</a>
        </em>
        </h3>
        <br>
        <em>
        
        </em>
        </p>
</div>
    <div>
      <h5><em>Our Pharmacy Company</em></h5>
      <p><em>
        Good health is the real earned wealth, just get it! People with good health are wealthy rather than Rich. We provide not just medicine but supplements that help build your body, help with loosing weight, Help with your heartbeat and also make you glow like never before. Our pharmacists and doctors provide a friendly and free environment for enquiries. You get access to variety of doctors and above all if you have any issue you can access the administrators. 
        Health is wealth; don't compromise it with anything.</em>
      </p><br>
      <h2>Our Services</h2>
        <p>
            At Sam's Pharmessy, we offer a range of services to meet your pharmaceutical needs:
        </p>
        <ul>
            <li>Fast and Accurate Prescription Filling</li>
            <li>Online Prescription Management for Patients</li>
            <li>Efficient Communication between Doctors and Pharmacists</li>
            <li>Secure Patient Records Management</li>
            <li>Personalized Medication Consultation</li>
        </ul>
        <p> 2023   </p>

    </div>

</div>
</body>
</html>