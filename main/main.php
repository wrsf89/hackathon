<?php
include "../db.php";
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../'>";
	exit;
	}

    $query = "select MAX(idx), status from hackhistory";
    $query2 = mysqli_query($dbh, $query);
    $result = mysqli_fetch_array($query2);
    $data = $result['status']

  

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/MainCss.css">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link id="favicon" rel="icon" type="image/x-icon" href="png/network.ico">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
    <script type="text/javascript">
        $.backstretch("../image/beach5.jpg");
    </script>
    <link rel="shortcut icon" href="#">

</head>
<body>
    <nav class="MainNav">
        <img src="../image/5 UI(국문) 세로형-1 K.jpg" width="140px" height="80px" style="margin-top: 10px; margin-left: 10px;" >
       <div class="rightNav">
        <ul>
        <li class="active"><a href="../logout.php"><i class="fa fa-clone">&nbsp;Logout</i></a></h1></li><br>
        <p style="margin-top: 0px; float: right; margin-right: 10px; color: #D2D2D2;">User : <?php echo $_SESSION['username'] ?></p>
        
        
         </ul>
         
       </div>
     </nav>

     <div class="main-warrpper">

        <div class="leftSection">
      <div class="cctvBtn">
        <button type="button" onclick="init()" id="cctvBtn">
            <img src="../image/cctv-removebg-preview.png" width="100px" height="90px">
        
           

                                
    
        

        </button>
      </div> 

      <div id="test3">
      <?php

if($_SESSION['userwork'] == '송도해안도로') {
                        
    //style='width: 160px; height: 100px; border: 2px solid #FF0000; '
    echo "<font size='6' color='white'>
    
   
            
            <p style=' margin-left: 48%;'><font color='#ED0000'><b>".$_SESSION['userwork']."</font></p>
    
    
    </font>";

}else if($_SESSION['userwork'] == '용인고속도로'){
    echo "<font size='6' color='white'>
    
   
            
            <p style=' margin-left: 48%;'><font color='#ED0000'><b>".$_SESSION['userwork']."</font></p>
    
    
    </font>";
}
?>  
                </div>
                
      <div class="ai-css" style="left: 35%;">
                            
      
        <div id="webcam-container" style=""></div>
            
    
       
        


        <div id="label-container"></div>
       </div> 
           </div>
    
       <div class="rightSection">
        
       </div>

    
     </div>

     <script type="text/javascript"> 
								setInterval(function() {
									$("#test").load(location.href+" #test","");
					
								}, 3000); 
								
								 
								
								setInterval(function() {
									$("#test2").load(location.href+" #test2","");
					
								}, 3000); 
								
							
						
								
											
			    </script>
               
     <div id="test2">
                            <?php


                                    if($data == 'drowsy') {
                                        echo "<div class='bar' ><font size='3' color='white'>
						
                                        <img class='fit-picture' src='../image/warning.png' style='float: right; margin-right: 80px; margin-top: 200px; width: 400px; height: 400px;'
                                                alt='Grapefruit slice atop a pile of other slices'>
                                                
                                              
                                        
                                        
                                        </font></div>";
					
                                    }
                                
                                ?>
                            </div>
     <script type="text/javascript"> 
								
								
								

                               
								
						
								
											
			    </script>
                <div id="test">
     <iframe name="chartframe3" id="chartframe3" style="margin-top: 80px;  margin-left: 10px;"
														width="650"
														height="600"
														frameborder="0" border="0"
														src="../table.php" allowfullscreen>
													
								</iframe>

                               
                            </div>

                            
                                
</body>
</html>
<script>document.getElementById("chartframe3").style.display="none";</script>
<script>document.getElementById("test2").style.display="none";</script>
<script>document.getElementById("test3").style.display="none";</script>
<script type="text/javascript">
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "../my_model/";

    let model, webcam, labelContainer, maxPredictions;

    var seaWork = "<?php echo $_SESSION['userwork'] ?>";
    var loopstop = 0;
    var savestop = 0;


    // Load the image model and setup the webcam
    async function init() {
        document.getElementById("cctvBtn").style.display="none";

       
        document.getElementById("chartframe3").style.display="block";
        document.getElementById("test2").style.display="block";
        document.getElementById("test3").style.display="block";

        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(700, 600, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        
        
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }
var status = "normal"
ac = 0;

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        if (prediction[0].probability.toFixed(2) >= 0.9) {
            status = "normal"
            
           

        } else if (prediction[1].probability.toFixed(2) >= 0.9) {
            status = "drowsy"

          

            if(seaWork == '송도해안도로'){
                   
                   console.log(seaWork);
               
                   }else if(seaWork == '용인고속도로'){
                      
                       if(loopstop == 0){
                       var audio2 = new Audio("/mp3/공인휴게소 전반 10키로.mp3")
                       audio2.play();
                   }
   
                     loopstop = 1;
                    
                   }
if(savestop == 0) {
            html2canvas(document.getElementById('webcam-container')).then(function(canvas) {

                var myImg = canvas.toDataURL("image/png");
                myImg = myImg.replace("data:image/png;base64,", "");

                $.ajax({
                type: "POST",
                data: {
                    "imgSrc": myImg
                },
                dataType: "text",
                url: "save_process.php",
                success: function(data) {
                
                    console.log(data);
                    if (data == "SUCCESS") {
                            savestop = 1;
                    
                    } else {
                    alert("저장 실패");
                    }
                },
                error: function(a, b, c) {
                    alert("error");
                }
                });
                });
            }
            

        }
      
    }

         
</script>
