<?php include 'header.php' ?>
<!--Start Features Section	-->
<section class="features-section">
	<div class="container">
		<div class="row top-features">

			<div class="col-lg-4">
				<div class="features-box">
					<img src="images/icon.png" alt="">
					<h3>Winning Award</h3>
					<p>Yearly we recognize Excellence, across the world, of the best in the Legal Industry. They become our Top Elite Law Firms.</p>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="features-box">
					<img src="images/icon2.png" alt="">
					<h3>Private</h3>
					<p>We believe in privacy over quantity. Our site is known as the best privacy for both lawyer and client.</p>
				</div>
			</div>



			<div class="col-lg-4">
				<div class="features-box">
					<img src="images/icon3.png" alt="">
					<h3>Legal Protection</h3>
					<p>We provide the best Legal Protection is Bangladesh. Our firm is always open if you need any legal protection.</p>
				</div>
			</div>
		</div>


		<div class="row align-items-center">
			<div class="col-lg-4">
				<div class="left-head">
					<h2>Best Law for everyone</h2>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="right-text">
					<p>The largest Law firm in Bangladesh like to call themselves “Big Law” firms because they have sections specializing on each category of legal work, which in the U.S. usually means mergers and acquisitions transactions, banking, and certain types of high-stakes corporate litigation. These firms rarely do plaintiffs’ personal injury work. Justice Society is one of the best full service law firm in Bangladesh.</p>
					<p>Justice Society is a multinational law chamber in bangladesh. We handled a lots of cases outside of the country. We have lots of international lawyers like Barrister A.M. Masum, Sikder M Ibrahim, Craig Carter, Anil Changaroth and many more.</p>
				</div>
			</div>
		</div>





	</div>
</section>
<!--Start Features Section	-->



<!--Start About Section	-->
<section class="about-section" id="about-section-id">
	<div class="container">
		<div class="row  align-items-center">
			<div class="col-lg-6">
				<div class="about-text text-center">
					<h2>About law </h2>
					<p>Law, the discipline and profession concerned with the customs, practices, and rules of conduct of a community that are recognized as binding by the community. Enforcement of the body of rules is through a controlling authority.
					</p>
					<div class="signature">
						<img src="images/signature.png" alt="">
						<p>CEO & Founder Of Justice Society</p>
					</div>

				</div>
			</div>


			<div class="col-lg-6">
				<div class="about-img">
					<img src="images/about.jpg" alt="">
				</div>
			</div>

		</div>
	</div>
</section>
<!--End About Section	-->

<!--Start Services	-->
<section class="services-section" id="services-section-id">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-main">
                    <h2 class="section-title">
                        <a href="legal_practice_areas.html" class="btn btn-primary btn-lg">Explore Legal Practicing Areas</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services	-->




<!--Start Team Section-->
<section class="team-section" id="team-section-id">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<div class="section-title-main">
					<h2 class="section-title">Meet Our Lawyers</h2>
				</div>
			</div>




			<?php
			$query = "SELECT * FROM lawyers	JOIN socialmedia ON lawyers.email= socialmedia.email limit 4;";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {

					$email = $row['email'];
					$name = $row['name'];
					$categoryid = $row['categoryid'];
					$picture = $row['picture'];
					$query1 = "select * from lawyercategories where id=" . $categoryid . ";";
					$result1 = $conn->query($query1);
					$category = "";
					if ($result1->num_rows > 0) {

						while ($row1 = $result1->fetch_assoc()) {
							$category = $row1['category'];
						}
					}

			?>
					<div class="col-lg-3">
						<div class="team-box">
							<div class="team-media">
								<img src="lawyer/images/<?php echo $picture ?>" alt="">
							</div>
							<div class="team-info">
								<h3><?php echo $name ?></h3>
								<p>- <?php echo $category ?> -</p>
								<ul class="top-social">

									<?php
									
									$facebook = "";
									$instagram = "";
									$twitter = "";
									$whatsapp = "";
									
											$facebook = $row['facebook'];
											$instagram = $row['instagram'];
											$twitter = $row['twitter'];
											$whatsapp = $row['whatsapp'];
										
									if($facebook!=""){

									?>

									<li><a target=”_blank” href="https://web.facebook.com/<?php echo $facebook ?>" class="rounded-3"><i class="fab fa-facebook-f"></i></a></li> <?php } if($instagram!=""){ ?>  
									<li><a target=”_blank” href="https://www.instagram.com/<?php echo $instagram ?>" class="rounded-3"><i class="fab fa-instagram"></i></a></li> <?php } if($twitter!=""){ ?> 
									<li><a target=”_blank” href="https://twitter.com/<?php echo $twitter ?>" class="rounded-3"><i class="fab fa-twitter"></i></a></li> <?php } if($whatsapp!=""){ ?> 
									<li><a target=”_blank” href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>" class="rounded-3"><i class="fab fa-whatsapp"></i></a></li> <?php }?> 
								</ul>
								<a type="button" class="btn btn-secondary  btn-block mt-3" href="lawyerreadmore.php?email=<?php echo $email ?>#details">Read More</a>

							</div>
						</div>
					</div>



			<?php

				}
			}
			?>



			<div class="col-md-12">
				<div class="btn-team text-center">
					<a href="lawyers.php?#lawyers" class="btn btn-primary">All Lawyers</a>
				</div>
			</div>


		</div>
	</div>
</section>
<!--End Team Section-->



<!--	Start Testimonial Section-->
<section class="quote-section" style="background: url(images/review-bg.jpg)" id="quote-section-id">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title-main center">
					<h2 class="section-title text-center">OUR QUOTE</h2>
				</div>

				<div class="col-md-12">
					<div class="owl-carousel owl-theme testimonial-carousel">

						<?php
						$query = "select * from quotes;";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$quote = $row['quote'];
								$writer = $row['writer'];
								$identity = $row['identity'];
						?>

								<div class="item">
									<div class="test-box">
										<p>“<?php echo $quote ?> ”</p>
										<div class="test-info">

											<div class="test-authot">
												<h4><?php echo $writer ?> </h4>
												<h5>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $identity ?></h5>
											</div>
										</div>

									</div>
								</div>

						<?php
							}
						}


						?>



					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!--	End Testimonial Section-->


<!--Start Logo Section-->
<section class="logo-section text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo1.jpg" alt="">
				</div>
			</div>

			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo2.jpg" alt="">
				</div>
			</div>

			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo3.jpg" alt="">
				</div>
			</div>

			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo4.jpg" alt="">
				</div>
			</div>

			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo5.jpg" alt="">
				</div>
			</div>

			<div class="col-lg-2">
				<div class="logo-box">
					<img src="images/logo6.jpg" alt="">
				</div>
			</div>


		</div>
	</div>
</section>
<!--End Logo Section-->
<?php include 'footer.php' ?>