<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<!--== Header Hero ==-->
<?php $this->load->view('guest/dashboard_header'); ?>
<!--== Header Hero ==-->

<!--== About Us Area Start ==-->
<?php $this->load->view('guest/dashboard_about_feature'); ?>
<!--== About Us Area End ==-->

<!--== Services Area Start ==-->
<?php $this->load->view('guest/dashboard_barang'); ?>
<!--== Services Area End ==-->
<!--== Partner Area Start ==-->
<?php $this->load->view('guest/dashboard_partner'); ?>
<!--== Partner Area End ==-->
<!--== Fun Fact Area Start ==-->
<?php //$this->load->view('guest/dashboard_funfact'); ?>
<!--== Fun Fact Area End ==-->

<!--== Articles Area Start ==-->
<section id="tips-article-area" class="section-padding">
	<div class="container">
		<h3 class="text-center text-uppercase mb-4">Tips and articles</h3>

		<!-- Articles Content Wrap Start -->
		<div class="row">
			<!-- Single Articles Start -->
			<div class="col-lg-12">
				<article class="single-article">
					<div class="row">
						<!-- Articles Thumbnail Start -->
						<div class="col-lg-5">
							<div class="article-thumb">
								<img src="<?php echo base_url() ?>assets/cardoor/img/article/PANDERMAN.jpg" alt="JSOFT">
							</div>
						</div>
						<!-- Articles Thumbnail End -->

						<!-- Articles Content Start -->
						<div class="col-lg-7">
							<div class="display-table">
								<div class="display-table-cell">
									<div class="article-body">
										<h3><a href="https://www.ciliwungcamp.com/5-gunung-terbaik-untuk-mendaki-di-malang-raya/">5 Gunung Terbaik Untuk Mendaki Di Malang RayaS</a></h3>
                                  <!--   <div class="article-meta">
                                        <a href="#" class="author">By :: <span>Admin</span></a>
                                        <a href="#" class="commnet">Comments :: <span>10</span></a>
                                    </div>
                                -->
                                <div class="article-date">25 <span class="month">jan</span></div>

                                <p>Malang merupakan salah satu kota pilihan favorit sewa tenda malang untuk wisata di Jawa Timur. Malang mempunyai banyak destinasi wisata alam yang menarik seperti pantai, coban atau air terjun, dan dari semua pilihan itu gunung trip bromo lah yang paling terkenal.  </p>

                                <a href="https://www.ciliwungcamp.com/5-gunung-terbaik-untuk-mendaki-di-malang-raya/" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Articles Content End -->
            </div>
        </article>
    </div>
    <!-- Single Articles End -->

    <!-- Single Articles Start -->
    <div class="col-lg-12">
    	<article class="single-article middle">
    		<div class="row">

    			<!-- Articles Content Start -->
    			<div class="col-lg-7">
    				<div class="display-table">
    					<div class="display-table-cell">
    						<div class="article-body">
    							<h3><a href="https://www.ciliwungcamp.com/explore-trip-bromo-siang-hari/">Explore Trip Bromo Siang Hari</a></h3>
    							<div class="article-meta">
    								<a href="#" class="author">By :: <span>Admin</span></a>
    								<a href="#" class="commnet">Comments :: <span>10</span></a>
    							</div>

    							<div class="article-date">14<span class="month">feb</span></div>

    							<p>Gunung Bromo merupakan gunung berapi yang masih aktif dan menjadi salah satu destinasi favorit para pelancong trip bromo Indonesia maupun mancanegara.Konon katanya, Gunung Bromo terbentuk dari letusan dahsyat Gunung Tengger yang membentuk kaldera dengan diameter kurang lebih dari 8 kilometer. .</p>

    							<a href="https://www.ciliwungcamp.com/explore-trip-bromo-siang-hari/" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- Articles Content End -->

    			<!-- Articles Thumbnail Start -->
    			<div class="col-lg-5 d-none d-xl-block">
    				<div class="article-thumb">
    					<img src="<?php echo base_url() ?>assets/cardoor/img/article/EXPLORE.jpg" alt="JSOFT">
    				</div>
    			</div>
    			<!-- Articles Thumbnail End -->
    		</div>
    	</article>
    </div>
    <!-- Single Articles End -->

    <!-- Single Articles Start -->
    <div class="col-lg-12">
    	<article class="single-article">
    		<div class="row">
    			<!-- Articles Thumbnail Start -->
    			<div class="col-lg-5">
    				<div class="article-thumb">
    					<img src="<?php echo base_url() ?>assets/cardoor/img/article/ARJUNO.jpg" alt="JSOFT">
    				</div>
    			</div>
    			<!-- Articles Thumbnail End -->

    			<!-- Articles Content Start -->
    			<div class="col-lg-7">
    				<div class="display-table">
    					<div class="display-table-cell">
    						<div class="article-body">
    							<h3><a href="https://www.ciliwungcamp.com/alur-pendakian-gunung-arjuno-2019/">Alur Pendakian Gunung Arjuno 2019</a></h3>
    							<div class="article-meta">
    								<a href="#" class="author">By :: <span>Admin</span></a>
    								<a href="#" class="commnet">Comments :: <span>10</span></a>
    							</div>

    							<div class="article-date">17 <span class="month">feb</span></div>

    							<p>Beberapa gunung dengan ketinggian lebih dari 3.000 meter di atas permukaan laut (mdpl), dan salah satunya adalah gunung tertinggi di pulau jawa, Gunung Arjuno adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia dengan ketinggian 3.339 m dpl.</p>

    							<a href="https://www.ciliwungcamp.com/alur-pendakian-gunung-arjuno-2019/" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- Articles Content End -->
    		</div>
    	</article>
    </div>
    <!-- Single Articles End -->
</div>
<!-- Articles Content Wrap End -->
</div>
</section>
<!--== Articles Area End ==-->
<?php $this->load->view('guest/footer'); ?>
