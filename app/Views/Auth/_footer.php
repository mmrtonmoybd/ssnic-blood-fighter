<!-- Footer -->
<?php
$model = new App\Models\Setting();
$info  = $model->first();
?>
    <footer class="page-footer font-small danger-color pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">Lets make all Bonded</h5>
                    <p><?= esc($info->siteAus) ?></p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Contact Us</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:<?= esc($info->siteEmail) ?>"><i
                                    class="fas fa-envelope-open mr-3"></i><?= esc($info->siteEmail) ?></a>
                        </li>
                        <li>
                            <a href="#!"><i class="fas fa-location-arrow mr-3"></i><?= esc($info->siteAddress) ?></a>
                        </li>
                        <li>
                            <a href="#!"><i class="fas fa-tty mr-3"></i>+<?= esc($info->sitePhone) ?></a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Support Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="<?= base_url(route_to('page', 1)) ?>">About us</a>
                        </li>
                        <li>
                            <a href="<?= base_url(route_to('page', 2)) ?>">Contact us</a>
                        </li>
                        <li>
                            <a href="<?= base_url(route_to('page', 3)) ?>">Why donate us</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <div class="container">

            <!-- Grid row-->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12 py-5">
                    <div class="mb-5 flex-center">

                        <!-- Facebook -->
                        <a class="fb-ic" target="_blank" href="//<?= esc($info->siteFB) ?>" target="_blank">
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic" target="_blank" href="//<?= esc($info->siteTwitter) ?>">
                            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic" target="_blank" href="//<?= esc($info->siteLinkIn) ?>">
                            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic" target="_blank" href="//<?= esc($info->siteInsta) ?>">
                            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="pin-ic" target="_blank" href="//<?= esc($info->siteYT) ?>">
                            <i class="fab fa-youtube fa-lg white-text fa-2x"> </i>
                        </a>
                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© <?= date('Y') ?> Copyright:
            <b> Cyber Lion </b> All Rights Reserved
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
