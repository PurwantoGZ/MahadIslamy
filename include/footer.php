<!--footer start-->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
            <h1>
              contact info
            </h1>
            <address>
              <p><i class="fa fa-home pr-10"></i>Address: Bodon, Jagalan, Banguntapan, Bantul, Yogyakarta 55173</p>
              <p><i class="fa fa-globe pr-10"></i>Webiste: www.mtsbanguntapan.sch.id </p>
              <p><i class="fa fa-mobile pr-10"></i>Mobile : (123) 456-7890 </p>
              <p><i class="fa fa-phone pr-10"></i>Phone : (123) 456-7890 </p>
              <p><i class="fa fa-envelope pr-10"></i>Email :   <a href="javascript:;">support@mtsbanguntapan.sch.id</a></p>
            </address>
          </div>
          <div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
            <h1>Pengunjung Terakhir</h1>
            <?php 
            $result=$db->displayTable(" SELECT `guestbook`.`AutoId`,`guestbook`.`DateIn`,`member`.`MemberName`,`guestbook`.`Message` 
FROM `guestbook`,`member` WHERE `guestbook`.`IdMember`=`member`.`IdMember` ORDER BY `DateIn` DESC limit 3");
            if ($result->num_rows>0) {
              while ($row=$result->fetch_assoc()) {
                echo '<div class="tweet-box">
                          <i class="fa fa-twitter"></i>
                          <em>'.$row["DateIn"].'<br> <a href="javascript:;">@'.$row["MemberName"].'</a> 
                          "'.$row["Message"].'"</em>
                      </div>';
              }
            }else{
              echo '<div class="tweet-box">
                          <i class="fa fa-twitter"></i>
                          <em>Belum ada pengunjung<br>ttd:admin</em>
                      </div>';
            }
             ?>
              
          </div>
          <div class="col-lg-3 col-sm-3 wow fadeInUp">
            <h1>Jam Operasional</h1>
              <p>
                <i class="fa fa-calendar"><strong> Senin</strong> - <strong>Jumat</strong>:</i><br>
                <i>08.00 - 13.00 WIB</i><br><br>
                <i class="fa fa-calendar"><strong> Sabtu</strong> :</i><br>
                <i>08.00 - 11.00 WIB</i><br><br>
                <i class="fa fa-calendar"><strong> Ahad</strong> :</i><br>
                <i>Libur</i><br><br>
                <i class="fa fa-globe"><strong> Online</strong> :</i><i>www.lib.mtsbanguntapan.sch.id</i>
              </p>
          </div>
          
          

          

        </div>
      </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    <ul class="social-link-footer list-unstyled">
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".3s"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".6s"><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".7s"><a href="#"><i class="fa fa-github"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".8s"><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                  <div class="copyright">
                    <p>&copy; 2016 - 2020 Copyright - Mts Mahad Islamy Banguntapan.</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
    <!--small footer end-->

    <!-- js placed at the end of the document so the pages load faster
<script src="js/jquery.js">
</script>
-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/toast/jquery.toast.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/parallax-slider/jquery.cslider.js"></script>

    <script type="text/javascript">
      $(function() {

        $('#da-slider').cslider({
          autoplay    : true,
          bgincrement : 100
        });

      });
    </script>



    <!--common script for all pages-->
    <script src="js/common-scripts.js">
    </script>
    <script src="js/revulation-slide.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function() {


        $('.bxslider1').bxSlider({
          minSlides: 5,
          maxSlides: 6,
          slideWidth: 360,
          slideMargin: 2,
          moveSlides: 1,
          responsive: true,
          nextSelector: '#slider-next',
          prevSelector: '#slider-prev',
          nextText: 'Onward →',
          prevText: '← Go back'
        });

      });


    </script>

    <script type="text/javascript">
    $('.image-caption a').tooltip();
    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {
                $("[rel='tooltip']").tooltip();
                // Simple parallax effect
                $('#portfoliolist .portfolio .portfolio-hover').hover(
        function(){
            $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
        }
    );



            }

        };

        // Run the show!
        filterList.init();


    });

    $( document ).ready(function() {

        $('.magnefig').each(function(){
            $(this).magnificPopup({
                type:'image',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })
        });
    });
    </script>
    <script>
      $('a.info').tooltip();

      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider) {
            $('body').removeClass('loading');
          }
        });
      });

      $(document).ready(function() {

        $("#owl-demo").owlCarousel({

          items : 4

        });

      });

      jQuery(document).ready(function(){
        jQuery('ul.superfish').superfish();
      });

      new WOW().init();


    </script>
    <!--NAVIGASI-->
    
    <script>
      $(document).ready(function() {

        $('#navbarBackpro').click(function(){
          $.ajax({
            url:"content/backpro-view.php",
            cache:false,
            success:function(data){
              $('#contentview').html(data);
            }
          });
        });

        $('#navbarLoginSirkulasiqqq').click(function() {
        /* Act on the event */
            $.ajax({
              url: 'content/login-view.php',
              cache:false,
              success:function(data){
                $('#contentview').html(data);
              }
            });
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(event){

        $('#guestId').on('input',function(event) {
          var guestId=$('#guestId').val();
          $.ajax({
            url: 'control/getNameGuest.php',
            data:"idGuest="+guestId,
            cache:false,
            dataType:'json',
            success:function(data){
             $('#guestName').val(data); 
            }
          });
          
        });

        $('#newGuestForm').submit(function() {
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data:$(this).serialize(),
            success:function(data){
              if (data==true) {
                
                $('#guestId').attr("autofocus");
                $.toast({
                    heading: 'Success',
                    position:'bottom-right',
                    text: '<strong>Terima Kasih</strong><br> telah mengisi buku tamu. Selamat belajar.',
                    icon: 'success'
                });
              }else{
                $.toast({
                    heading: 'Error',
                    position:'bottom-right',
                    text: '<strong>Terima Kasih</strong><br> telah mengisi buku tamu. Selamat belajar.',
                    icon: 'success'
                });
              }
              $('#newGuestForm').trigger('reset');
              window.location.href='index.php?module=bukutamu';
            }
            //window.location.href='index.php';
          });
          return false;
        });
      });
    </script>
    <script type="text/javascript">
     $('#idSearchKey').keypress(function(event) {
       /* Act on the event */
       var kata=$(this).val();
       if (event.keyCode == 13) {
        window.location.href='?module=search&keywords='+kata;
        }
     });
    </script>
  </body>
</html>