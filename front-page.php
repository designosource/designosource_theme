<?php
/**
 * Template Name: Front Page
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section id="team" class="grid whole">


			<span class="big-title"	data-2300="opacity:1;"
									data-2536="opacity:0;">
				<i class="quote"></i>
				<span class="smaller">Ons</span><br/> team
				<i class="quote quote-rechts"></i>
			</span>


			<div class="grid third">
				<div id="bol-down"	data-2300="background-size: 0% 0%;transform: translateY(110px);-webkit-transform: translateY(110px);left: 200px;"
									data-2536="background-size: 100% 100%;left:200px;transform: translateY(396px);-webkit-transform: translateY(396px);width:50px;height:50px;"
									data-2800="position: relative; left: 70px;width: 300px; height: 300px;transform: translateY(396px);-webkit-transform: translateY(396px);"
									data-3060="transform: translateY(446px);-webkit-transform: translateY(446px);"
									data-3660="transform: translateY(1046px);-webkit-transform: translateY(1046px);"
									data-3860="transform: translateY(1246px);-webkit-transform: translateY(1246px);"
									data-4700="transform: translateY(1826px);-webkit-transform: translateY(1826px);">
					<img class="florh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_flor.png" alt="Flor Holvoet">
					<img class="sanderg" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_sander.png" alt="Sander Geenen">
					<img class="joeric" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_joeric.png" alt="Joeri Claes">
					<img class="wannesd" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_wannes.png" alt="Wannes De Roy">
					<img class="thomasb" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_thomas.png" alt="Thomas Bormans">
					<img class="stijns" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_stijn.png" alt="Stijn Schets">
					<img class="nadinev" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_nadine.png" alt="Nadine Vanesch">
					<img class="kayk" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_kay.png" alt="Kay Karremans">
					<img class="nilsj" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_nils.png" alt="Nils Janssens">
					<img class="riasv" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_rias.png" alt="Rias Van der Veken">
					<img class="mikeh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_mike.png" alt="Mike Henderyckx">
					<img class="driesw" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_dries.png" alt="Dries Winderickx">
					<img class="joerij" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_joerij.png" alt="Joeri Janssens">
					<img class="davidh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_david.png" alt="David Heerinckx">
					<img class="karinaa" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_karina.png" alt="Karina Aerts">
					<img class="robbyv" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/prof_robby.png" alt="Robby Vanelderen">
				</div>
				<div id="bol-line"							data-2300="transform: translateY(110px);-webkit-transform: translateY(110px);left: 222.5px;"
															data-2536="transform: translateY(396px);-webkit-transform: translateY(396px);height: 400px;"
															data-2600="transform: translateY(700px);-webkit-transform: translateY(700px);height: 0px;" >
				</div>
			</div>

			<div id="member-info" class="grid two-thirds" 	data-2300="opacity: 0;"
															data-3348="opacity: 0; 	transform: translateY(418px);-webkit-transform: translateY(418px);"
															data-3660="opacity: 1; 	transform: translateY(750px);-webkit-transform: translateY(750px);"
															data-3860="				transform: translateY(950px);-webkit-transform: translateY(950px);">
				<?php

					$args = array( 'post_type' => 'team-member', 'posts_per_page' => 20 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<ul class="<?php echo strtolower(get_field("voornaam")) . substr(strtolower(get_field("achternaam")), 0, 1); ?>">
							<li>Naam</li>
							<li><?php echo ucfirst(get_field("voornaam")) . " " . ucfirst(get_field("achternaam")); ?></li>
							<li>Skills</li>
							<li><?php echo ucfirst(get_field("skills")); ?></li>
							<li>Motto</li>
							<li><?php echo ucfirst(get_field("motto")); ?></li>
							<li>
								<?php  if (get_field("twitter") != ''){ ?> <a href="http://www.twitter.com/<?php echo get_field("twitter") ?>" target="_BLANK"><i class="fa fa-twitter-square fa-2x"></i></a> <?php } ?>
								<?php  if (get_field("linkedin") != ''){ ?> <a href="<?php echo get_field("linkedin"); ?>" target="_BLANK"><i class="fa fa-linkedin-square fa-2x"></i></a> <?php } ?>
								<?php  if (get_field("email") != ''){ ?> <a href="mailto:<?php echo get_field("email"); ?>" target="_BLANK"><i class="fa fa-envelope fa-2x"></i></a> <?php } ?>
								<?php  if (get_field("website") != ''){ ?> <a href="<?php echo get_field("website"); ?>" target="_BLANK"><i class="fa fa-globe fa-2x"></i></a> <?php } ?>
							</li>
						</ul>
						<?php
					endwhile;

				?>
			</div>

			<div id="astronauten" class ="grid whole" 	data-2350="display: none;bottom: 0; opacity: 0;"
														data-3100="display: block;opacity: 0;"
														data-3660="opacity: 1;"
														data-3860="opacity: 1;"
														data-4700="opacity: 0; display: block;"
														data-4701="display: none;">
				<div id="info"></div>
				<div class="achter">
					<img class="florh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_flor.png" alt="Flor Holvoet" 		style="left: 5.5%; 	top:-333px;">
					<img class="sanderg" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_sander.png" alt="Sander Geenen" 	style="left: 18.5%; top: -305px;">
					<img class="joeric" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_joeric.png" alt="Joeri Claes" 		style="left: 31%; 	top: -317px;">
					<img class="wannesd" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_wannes.png" alt="Wannes De Roy" 	style="left: 42%; 	top: -332px;">
					<img class="thomasb" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_thomas.png" alt="Thomas Bormans" 	style="left: 53.5%;	top: -312px;">
					<img class="stijns" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_stijn.png" alt="Stijn Schets" 		style="left: 65%;	top: -319px;">
					<img class="nadinev" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_nadine.png" alt="Nadine Vanesch" 	style="left: 75.5%;	top: -312px;">
				</div>
				<div class="voor">
					<img class="kayk" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_kay.png" alt="Kay Karremans" 			style="left: 0;">
					<img class="nilsj" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_nils.png" alt="Nils Janssens" 		style="left: 11%;">
					<img class="riasv" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_rias.png" alt="Rias Van der Veken" 	style="left: 23%;">
					<img class="mikeh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_mike.png" alt="Mike Henderyckx" 		style="left: 35%;">
					<img class="driesw" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_dries.png" alt="Dries Winderickx" 	style="left: 46%;">
					<img class="joerij" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_joerij.png" alt="Joeri Janssens" 	style="left: 58%;">
					<img class="davidh" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_david.png" alt="David Heerinckx" 	style="left: 69.5%;">
					<img class="karinaa" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_karina.png" alt="Karina Aerts" 	style="left: 87%;">
					<img class="robbyv" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/team/astro_robby.png" alt="Robby Vanelderen" 	style="left: 80%;">
				</div>
			</div>

		</section><!-- End Team -->
		<section id="over-ons" class="grid whole active">

			<div class="unit half holo-screen no-gutters" 	data-5045="transform[sqrt]: translateY(200px);-webkit-transform[sqrt]: translateY(200px);"
															data-5800="transform: translateY(150px);-webkit-transform: translateY(150px);"
															data-6000="transform: translateY(130px);-webkit-transform: translateY(130px);"
															data-7200="transform[sqrt]: translateY(-400px);-webkit-transform[sqrt]: translateY(-400px);">
				<div class="inner">
					<?php
						$id=157;
						$post = get_page($id);
						$content = apply_filters('the_content', $post->post_content);
						$title = $post->post_title;

					?>
					<h3><?php echo $title; ?></h3>
					<?php echo $content; ?>
				</div>
				<i class="ion-engine">
					<div class="ionexhaust"><div class="ionexhausttop"></div></div>
					<div class="ionglow"></div>
					<div class="ionbeam"></div>
					<div class="ionline ionline1"></div>
					<div class="ionline ionline2"></div>
					<div class="ionline ionline3"></div>
				</i>
				<div class="holo-screen-bottom"></div>
			</div>
			<div class="unit half holo-screen no-gutters"	data-5045="transform[sqrt]: translateY(500px);-webkit-transform[sqrt]: translateY(500px);"
															data-5800="transform: translateY(100px);-webkit-transform: translateY(100px);"
															data-6000="transform: translateY(70px);-webkit-transform: translateY(70px);"
															data-7200="transform[sqrt]: translateY(-700px);-webkit-transform[sqrt]: translateY(-700px);">
				<div class="inner">
					<?php
						$id=160;
						$post = get_page($id);
						$content = apply_filters('the_content', $post->post_content);
						$title = $post->post_title;

					?>
					<h3><?php echo $title; ?></h3>
					<?php echo $content; ?>
				</div>
				<i class="ion-engine">
					<div class="ionexhaust"><div class="ionexhausttop"></div></div>
					<div class="ionglow"></div>
					<div class="ionbeam"></div>
					<div class="ionline ionline1"></div>
					<div class="ionline ionline2"></div>
					<div class="ionline ionline3"></div>
				</i>
				<div class="holo-screen-bottom"></div>
			</div>

		</section><!-- End Over-ons -->
		<section id="werkwijze" class="grid whole">

			<span class="big-title"><i class="quote"></i><span class="smaller">Onze</span><br/> werkwijze<i class="quote quote-rechts"></i></span>

			<section id="onderzoek">
				<img class="unit one-third" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/planeten/1.png" alt="" data-6888="width: 10%;"
																															data-7318="width: 33.3332%;">
				<div class="unit two-thirds tekst" >
					<h3>Onderzoek</h3>
					<?php echo the_field('onderzoek', 67); ?>
				</div>
				<i class="red-arrow unit whole"></i>
			</section>

			<section id="offerte">
				<img class="unit one-third" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/planeten/2.png" alt=""	data-8018="width: 10%;"
																															data-8448="width: 33.3332%;">
				<div class="unit two-thirds tekst">
					<h3>Offerte</h3>
					<?php echo the_field('offerte', 67); ?>
				</div>
				<i class="red-arrow unit whole"></i>
			</section>

			<section id="uitwerking">
				<img class="unit one-third" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/planeten/3.png" alt=""	data-9157="width: 10%;"
																															data-9587="width: 33.3332%;">
				<div class="unit two-thirds tekst">
					<h3>Uitwerking</h3>
					<?php echo the_field('uitwerking', 67); ?>
				</div>
				<i class="red-arrow unit whole"></i>
			</section>

			<section id="oplevering">
				<img class="unit one-third" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/planeten/4.png" alt=""	data-10296="width: 10%;"
																															data-10726="width: 33.3332%;">
				<div class="unit two-thirds tekst"	>
					<h3>Oplevering</h3>
					<?php echo the_field('oplevering', 67); ?>
				</div>
				<i class="red-arrow unit whole"></i>
			</section>

			<section id="na-service">
				<img class="unit one-third" src="<?php echo get_stylesheet_directory_uri(); ?>/_/img/planeten/5.png" alt=""	data-11435="width: 10%;"
																															data-11865="width: 33.3332%;">
				<div class="unit two-thirds tekst"	>
					<h3>Na-service</h3>
					<?php echo the_field('na-service', 67); ?>
				</div>
			</section>
			<i class="red-arrow unit whole"></i>

		</section><!-- End Werkwijze -->
		<section id="projecten" class="grid whole">

			<span class="big-title"><i class="quote"></i><span class="smaller">Onze</span><br/> projecten<i class="quote quote-rechts"></i></span>
			<section><i class="red-arrow unit whole"></i></section>

			<section id="projecten-time">
			<ul id="projecten-timeline" class="timeliner">
			<?php

					$args = array( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC', 'meta_key' => 'jaar' ,'orderby' => 'meta_value_num' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						?>

						<li title="<?php echo get_field("jaar") . " - " . get_the_title(); ?>" class="j<?php echo get_field("jaar"); ?>">
							<div class="project">
								<div class="imac-full">
									<i class="ion-engine left">
										<div class="ionexhaust"><div class="ionexhausttop"></div></div>
										<div class="ionglow"></div>
										<div class="ionbeam"></div>
										<div class="ionline ionline1"></div>
										<div class="ionline ionline2"></div>
										<div class="ionline ionline3"></div>
									</i>
									<i class="ion-engine right">
										<div class="ionexhaust"><div class="ionexhausttop"></div></div>
										<div class="ionglow"></div>
										<div class="ionbeam"></div>
										<div class="ionline ionline1"></div>
										<div class="ionline ionline2"></div>
										<div class="ionline ionline3"></div>
									</i>
									<i class="imac">
										<img src="<?php echo get_field("afbeelding"); ?>" alt="<?php echo get_the_title(); ?>" />
									</i>
								</div>
								<div class="tekst">
									<h3><?php echo get_the_title(); ?></h3>
									<?php if(get_field("beschrijving") != ""){ ?><p><label>Beschrijving: </label><?php echo get_field("beschrijving"); ?></p><?php } ?>
									<?php if(get_field("scope") != ""){ ?><p><label>Scope: </label><?php echo get_field("scope"); ?></p><?php } ?>
									<?php if(get_field("skills") != ""){ ?><p><label>Skills: </label><?php echo get_field("skills"); ?></p><?php } ?>
									<?php if(get_field("url") != ""){ ?><a href="<?php echo get_field("url"); ?>" class="linkbutton" target="_blank">Ontdek dit project</a><?php } ?>
								</div>
							</div>
						</li>
						<?php
					endwhile;

				?>
			</ul>
			</section>
			<i class="red-arrow unit whole last"></i>
		</section><!-- End Projecten -->
		<section id="designoverse" class="grid whole">

			<span class="big-title"><i class="quote"></i><span class="smaller">Bekijk</span><br/> designoverse<i class="quote quote-rechts"></i></span>
			<section><i class="red-arrow unit whole"></i></section>

			<?php 	//GET LAST VIDEO POST
					$link;
					$afbeelding;

					$lastpost_titel;
					$lastpost_description;
					$lastpost_url;

					$args = array( 'post_type' => 'post', 'posts_per_page' => 1, 'tax_query' => array(array('taxonomy' => 'post_format','field' => 'slug','terms' => array( 'post-format-video' ))));
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$afbeelding = get_field("preview_afbeelding");
						$link = get_permalink();

					endwhile;

					$args = array( 'post_type' => 'post', 'posts_per_page' => 1);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$lastpost_titel = get_the_title();
						$lastpost_url = get_permalink();

						if(get_field("beschrijving") == ""){
							$lastpost_description = get_the_excerpt();
						}
						else
						{
							$lastpost_description = get_field("beschrijving");
						}


					endwhile;
				?>


			<section id="designoverse-inhoud" class="grid whole">
				<div class="unit half">
					<div class="television active">
						<div class="antennas">
							<div class="antenna">
								<div class="antop"></div>
								<div class="antopglow"></div>
								<div class="anline"></div>
							</div>

							<div class="antenna antenna2">
								<div class="antop antop2"></div>
								<div class="antopglow antopglow2"></div>
								<div class="anline anline2"></div>
							</div>
						</div>
						<div class="contv">
							<div class="tv"></div>
							<a class="videolink" href="<?php echo $link; ?>"></a>
							<div class="screendisp screenswitch">
								<div class="screenslide1"></div>
								<div class="screenslide2"></div>
							</div>

							<div class="screendisp screenplay"></div>
							<div class="screendisp screenintes"></div>
							<div class="screendisp screenbg" style="background: url(<?php echo $afbeelding; ?>) no-repeat;"></div>
							<div class="screen">
								<div class="screenline screenline1"></div>
								<div class="screenline screenline2"></div>
								<div class="screenline screenline3"></div>
								<div class="screenline screenline4"></div>
								<div class="screenline screenline5"></div>
								<div class="screenline screenline6"></div>
								<div class="screenline screenline7"></div>
								<div class="screenline screenpoint screenpoint1"></div>
								<div class="screenline screenpoint screenpoint2"></div>
								<div class="screenline screenline8"></div>
								<div class="screenline screenline9"></div>
								<div class="screenline screenline10"></div>
								<div class="screenline screenline11"></div>
								<div class="screenline screenline12"></div>
								<div class="screenline screenline13"></div>
								<div class="screenline screenline14"></div>
								<div class="screenline screenline15"></div>
							</div>
							<div class="buttons">
								<div class="button leetplus"></div>
								<div class="button leetmin"></div>
								<div class="button screenoff"></div>
								<div class="button screenlight"></div>
								<div class="button screendark"></div>
							</div>
						</div>
						<div class="ion-engine">
							<div class="ionexhaust"><div class="ionexhausttop"></div></div>
							<div class="ionglow"></div>
							<div class="ionbeam"></div>
							<div class="ionline ionline1"></div>
							<div class="ionline ionline2"></div>
							<div class="ionline ionline3"></div>
						</div>

					</div>

				</div>
				<div class="unit half">
					<h3>designoverse</h3>
					<p>Ontdek alles over het reilen en zeilen van designosource</p>
					<a class="linkbutton" href="/designoverse">ontdek designoverse</a><br><br>
					<h3>Laatste post: "<?php echo $lastpost_titel; ?>"</h3>
					<p><?php echo $lastpost_description; ?></p>
					<a class="linkbutton" href="<?php echo $lastpost_url; ?>">Lees meer</a><br><br>
				</div>
			</section>
			<i class="red-arrow unit whole"></i>
		</section><!-- End designoverse -->
		<section id="contact" class="grid whole">
			<div class="unit whole">
				<h2>Helemaal in de wolken en wil je ons iets vertellen? Aarzel dan niet om ons te contacteren!</h2>
			</div>
			<div class="unit half">
				<span class="red">designosource</span>
				<p>
					Lange Ridderstraat 44<br/>
					2900 - Mechelen<br />
					info@designosource.be
				</p>

				<span class="red">Onderdeel van:</span>
				<p>
					Thomas More Mechelen
				</p>

				<span class="red">Hosting:</span>
				<p>
					Eigen Domein
				</p>
				<a href="http://twitter.com/designosource" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="http://facebook.com/designosource" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
				<a href="http://dribbble.com/designosource" target="_blank"><i class="fa fa-dribbble fa-2x"></i></a>
				<a href="http://vimeo.com/designosource" target="_blank"><i class="fa fa-vimeo-square fa-2x"></i></a>
			</div>
			<div class="unit half">
			<?php
				$id= 76;
				$post = get_page($id);
				$content = apply_filters('the_content', $post->post_content);
				echo $content;
			?>
			</div>
		</section><!-- End designoverse -->
		<?php //comments_template(); ?>

		<?php endwhile; endif; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
