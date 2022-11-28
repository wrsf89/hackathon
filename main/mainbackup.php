<?php
include "../db.php";
session_start();
if(!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../'>";
	exit;
	}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>

<link rel="stylesheet" href="../css/MainCss.css">
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link id="favicon" rel="icon" type="image/x-icon" href="png/network.ico">
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/pose@0.8/dist/teachablemachine-pose.min.js"></script>

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

   <div class="ai-css">
    <div><canvas id="canvas"></canvas></div>
    <span id="stat"></span><div></div>
    <div id="label-container"></div>
   </div> 
       </div>

   <div class="rightSection">
    
   </div>

 </div>


 
</body>
</html>


<script type="text/javascript">
    const URL = "../my_model/";
    let model, webcam, ctx, labelContainer, maxPredictions;


   var seaWork = "<?php echo $_SESSION['userwork'] ?>";
    var loopstop = 0;

  

    async function init() {
       document.getElementById("cctvBtn").style.display="none";

        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

      
        model = await tmPose.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

      
        const size = 500; // <-  캠 송출화면 사이즈 조절 크기 
        const flip = true; // whether to flip the webcam
        webcam = new tmPose.Webcam(size, size, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append/get elements to the DOM
        const canvas = document.getElementById("canvas");
        canvas.width = size; canvas.height = size; // <- 가로 세로 size 값으로 받아서 조절
        ctx = canvas.getContext("2d");
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop(timestamp) {
       
            webcam.update(); // update the webcam frame
           await predict();
           window.requestAnimationFrame(loop);
     
       
    }

    status = "normal"
    

    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        if (prediction[0].probability.toFixed(2) >= 0.9) {
            status = "normal"
            
        } else if (prediction[1].probability.toFixed(2) >= 0.9) {
            status = "drowsy"
           
        }
      
    }


    function drawPose(pose) {
        if (webcam.canvas) {
            ctx.drawImage(webcam.canvas, 0, 0);
            // draw the keypoints and skeleton
            if (pose) {
                const minPartConfidence = 0.5;
                tmPose.drawKeypoints(pose.keypoints, minPartConfidence, ctx);
                tmPose.drawSkeleton(pose.keypoints, minPartConfidence, ctx);
            }
        }
    }




 
 


</script>



