<?= $this->extend('App\Views\App\layout') ?>
<?= $this->section('main') ?>
<!-- Jumbotron -->
    <div class="card card-image img-fluid"
        style="background-image: url('<?= base_url("frontend/") ?>/images/blooddonate.jpg'); background-size: cover;">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">

                <!-- Content -->
                <h4 class="card-title h4 my-4 py-2">DONATE BLOOD, SAVE LIFE!</h4>
                <h1 class="mb-4 pb-2 px-md-5 mx-md-5">DONATE YOUR BLOOD AND INSPIRE<br>OTHERS TO DONATE.</h1>
                <?php if (service('authentication')->check()) { ?>
            <a href="<?= route_to('dashboard') ?>" class="btn btn-info">GO TO DASHBOARD <i class="fas fa-arrow-right"></i></a>
            <?php } else { ?>
            <a href="<?= base_url(route_to('register')) ?>" class="btn btn-danger">JOIN WITH US <i class="fas fa-arrow-right"></i></a>
            <?php } ?>
                
            </div>
        </div>
    </div>


    <div class="container" id="container2">

        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
                <h3 class="display-4">DONATION PROCESS</h3>
                <hr class="dots">
                <p class="lead">The donation process from the time you arrive at center until the time you leave</p>
            </div>
        </div>
        <!-- jumbotron -->
        <div class="container mb-5">
            <!-- Card deck -->
            <div class="card-deck">

                <!-- Card -->
                <div class="card mb-3">

                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="<?= base_url('frontend/') ?>/images/registration.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                        <!--Title-->
                        <h4 class="card-title">REGISTRATION</h4>
                        <!--Text-->
                        <p class="card-text">You need to complete a very simple registration form which contatins all
                            required contact information to enter in the donation process.</p>
                    </div>

                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">

                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="<?= base_url('frontend/') ?>/images/bloodcheck.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                        <!--Title-->
                        <h4 class="card-title">SCREENING</h4>
                        <!--Text-->
                        <p class="card-text">A drop of blood from your finger will be taken for a simple test to ensure
                            that your blood levels are proper enough for donation.</p>
                    </div>

                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">

                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="<?= base_url('frontend/') ?>/images/donation.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                        <!--Title-->
                        <h4 class="card-title">DONATION</h4>
                        <!--Text-->
                        <p class="card-text">After passing screening test successfully you will be directed to a donor
                            bed for donation. It will take only 6-10 minutes.</p>
                    </div>

                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card mb-3">

                    <!--Card image-->
                    <div class="view overlay">
                        <img class="card-img-top" src="<?= base_url('frontend/') ?>/images/Refreshment.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!--Card content-->
                    <div class="card-body">

                        <!--Title-->
                        <h4 class="card-title">REFRESHMENT</h4>
                        <!--Text-->
                        <p class="card-text">you can also stay in the sitting room until you feel strong enough to leave
                            the center. You will receive refreshments in the donation zone</p>
                    </div>

                </div>
                <!-- Card -->

            </div>
            <!-- Card deck -->
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-sm-6 col-md-6">

                <!-- <img src="images/quote2.jpg" alt="" srcset="" class="img-fluid"> -->
                <section class="p-1">
                    <div class="streak grey lighten-3">
                        <div class="flex-center">
                            <ul class="mb-0 list-unstyled">
                                <li>
                                    <h2 class="h2-responsive"><i class="fas fa-quote-left" aria-hidden="true"></i> A
                                        single pint can save three lives. A single gesture can create a million smiles.
                                        <i class="fas fa-quote-right" aria-hidden="true"></i></h2>
                                </li>

                            </ul>
                        </div>
                    </div>
                </section>
                <section class="p-1">
                    <div class="streak  lighten-3">
                        <div class="flex-center">
                            <ul class="mb-0 list-unstyled">
                                <li>
                                    <h2 class="h2-responsive"><i class="fas fa-quote-left" aria-hidden="true"></i> Bring
                                        a life back to power. Make blood donation your responsibility <i
                                            class="fas fa-quote-right" aria-hidden="true"></i></h2>
                                </li>
                                <li class="mb-0">
                                    <h5 class="text-center font-italic mb-0">~ American Red Cross</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-sm-6 col-md-6">
                <!-- Material form register -->
                <div class="card">

                    <h5 class="card-header danger-color white-text text-center py-4">
                        <strong>REQUEST DONOR</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">

                    

            <div class="pt-2">
                <center><a href="<?= base_url(route_to('register')) ?>"><button type="button" class="btn btn-danger btn-rounded">BECOME A DONOR</button></a></center>
            </div>

                    </div>

                </div>
                <!-- Material form register -->
            </div>
        </div>
    </div>
	

    <div class="container" id="container2">
        <!-- Jumbotron -->
        <div class="jumbotron text-center grey darken-3 white-text mx-2 mb-5">

            <!-- Title -->
            <h2 class="card-title h2">JOIN WITH US AND SAVE LIFE</h2>

            <div class="pt-2">
                <a href="<?= base_url(route_to('register')) ?>"><button type="button" class="btn btn-danger btn-rounded">BECOME A DONOR</button></a>
            </div>

            <hr class="my-4 rgba-white-light">
        </div>
        <!-- Jumbotron -->
    </div>
<?= $this->endSection() ?>