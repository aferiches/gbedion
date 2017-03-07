<section id = "discoverProjectDetailsBody">	<a href="project.php?projectid=<?php echo urlencode(base64_encode($row ->projectid));?>&projecttitle=<?php echo $row ->projecttitle;?>">
  <section id = "discoverProjectDetails">
    <br>
    <img src="<?php echo $row->fileToUpload; ?>" alt="$row ->projecttitle"/></h2></p> <br>
    </section>
    <section id = "discoverProjectDetailsRight"> <br> <br>
    <p><h2><?php echo $row ->projecttitle; ?></h2><br>

    <p> <span><?php echo "By ".$row ->name; ?></span></p> <br>
    <p> <?php echo $row ->projectdetails ?></span></p> <br>
    <div id="middlebodyenclosed">
      <div id="middlebodyleftraised">
      <p> N10,000</p>
      </div>
    <div id="middlebodyleftgoal">
    <p> N100,000 GOAL </p>
    </div>
      <div id="clearer"></div>
      <div id ="goalbar">
         <img src="images/goal-bars..jpg" />
      </div>
      <p> 25 DAYS LEFT </P>
    </div>
  </section>


  <div id ="clearer"></div>
  </a>
</section>
