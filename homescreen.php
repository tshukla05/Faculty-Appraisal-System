<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     
  <style>
  
 
  .container {
      position: relative;
      width: 100%;
  }

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: 535px;
  transition: .1s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .1s ease;
  opacity: 0;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  backface-visibility: hidden;
 
}

.container:hover .image {
  opacity: 0.7;
}

.container:hover .middle {
  opacity: 0.5;
}

.text {
  color:  #001a4d;
    text-align: center;
    text-transform: uppercase;
    font-family: titlefont;
    font-style: italic;
    font-size: 40px;
    padding: 25px 20px;
    }

  
}
</style>
</head>
  <body>
    <div class="container">
      <img src="./img/frontface.jpg" alt="backimg" class="image">
      <div class="middle">
      <div class="text">Lok jagruti kendra<br> ljmca<br> performance appraisal of the faculty<br> 2017-2018</div>
    
                    
    </div>
</div>
 </body>
</html>
