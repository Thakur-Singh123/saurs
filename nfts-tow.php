<?php
   include 'header.php'; 
   ?>
<div class="banner-nfts-saction-tow">
   <div class="container">
      <h2 data-aos="fade-up">Unlock Power Of The <br>SaurAi Labs NFTs</h2>
      <p data-aos="fade-up">Your NFTs remain your ticket to becoming part of the most exclusive<br> crypto empire on
         Earth. These NFTs aren’t just collectables, they <br>are your gateway to the Saurverse.
      </p>
      <div class="row">
         <div class="col-md-4">
            <div class="banner-nfts-saction-tow-box margain-top" data-aos="fade-right">
               <img src="<?php echo Base_url; ?>/asset/images/icon-nfts-1.png">
               <h3>200 Ultra Rare NFTs</h3>
               <span>Step up with increased privileges, unique utilities, and an amplified role in the Saurverse.</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="banner-nfts-saction-tow-box" data-aos="fade-down">
               <img src="<?php echo Base_url; ?>/asset/images/icon-nfts-2.png">
               <h3>77 Legendary NFTs</h3>
               <span>The crown jewels. With only 77 ever made, these Jurassic Gems are the apex power symbols.</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="banner-nfts-saction-tow-box margain-top" data-aos="fade-left">
               <img src="<?php echo Base_url; ?>/asset/images/icon-nfts-3.png">
               <h3>500 Rare NFTs</h3>
               <span> These NFTs unlock exclusive access and your Dino evolves with each passing day.</span>
            </div>
         </div>
         <div class="round-cearcal-imge-1"><img src="<?php echo Base_url; ?>/asset/images/round-cearcal-imge-1.png"></div>
         <div class="round-cearcal-imge-2"><img src="<?php echo Base_url; ?>/asset/images/round-cearcal-imge-2.png"></div>
      </div>
   </div>
</div>
</div>
<div class="banner-nfts-saction-three">
<div class="container">
   <?php
      //Db call
      include 'admin/config/db.php';
      //Get images accor category images
      $query = "SELECT c.id AS category_id, c.name AS category_name, 
      GROUP_CONCAT(ia.images ORDER BY ia.id DESC SEPARATOR ',') AS images, 
      ia.status 
      FROM images_attachments ia
      INNER JOIN categories c ON ia.category_id = c.id 
      GROUP BY c.id 
      ORDER BY c.id DESC";
      //Call db
      $result = mysqli_query($conn, $query);
      $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
      //Get categories
      foreach ($categories as $row) { 
      ?>
   <div class="banner-nfts-saction-three-box">
      <h2 data-aos="fade-up"><?php echo $row["category_name"]; ?></h2>
      <div class="legendary-sliider" data-aos="fade-up">
         <div class="container">
            <div class="wrapper">
               <?php 
                  if (!empty($row["images"])) { 
                      $images = explode(",", $row["images"]); 
                      foreach ($images as $image) { 
                  ?>
               <img src="<?php echo Base_url; ?>/admin/uploads/galleries/<?php echo ($image); ?>" width="80" style="margin: 5px;">
               <?php 
                  } 
                  } 
                  ?>
            </div>
         </div>
      </div>
   </div>
   <?php 
      } 
      ?>
   <div class="nfts-saction-three-box-six">
      <h2 data-aos="fade-up">The Saurverse Awaits</h2>
   </div>
</div>
<div class="marquee-container">
   <div class="marquee">
      <div class="marquee-content">
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
         <!-- Duplicate Content for Smooth Loop -->
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
         <span class="star-icon"><img src="<?php echo Base_url; ?>/asset/images/marque-icon.png" alt="" class="mar-img"></span>
         SaurAI is built different. It’s not just another Meme Coin - It’s got Depth, AI, NFTs, and a whole prehistoric
         revolution behind it.
      </div>
   </div>
</div>
<?php include 'footer.php'; ?>