<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\widgets\Menu;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>JDIH DPRD Kabupaten Jember - Jaringan Dokumentasi dan Informasi Hukum<?= Html::encode($this->title) ? ' - ' . Html::encode($this->title) : '' ?></title>

    <meta name="description" content="Portal resmi JDIH DPRD Kabupaten Jember. Akses Peraturan Daerah, Keputusan DPRD, dan dokumentasi hukum secara cepat dan akurat." />
    <link rel="canonical" href="https://jdih-dprd.jemberkab.go.id/" />
    <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1" />

    <!-- Open Graph -->
    <meta property="og:title" content="JDIH DPRD Kabupaten Jember - Jaringan Dokumentasi dan Informasi Hukum" />
    <meta property="og:description" content="Portal resmi JDIH DPRD Kabupaten Jember. Telusuri Peraturan Daerah, Keputusan DPRD, dan produk hukum terbaru." />
    <meta property="og:url" content="https://jdih-dprd.jemberkab.go.id/" />
    <meta property="og:site_name" content="JDIH DPRD Kabupaten Jember" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:image" content="https://jdih-dprd.jemberkab.go.id/frontend/assets/img/logos/jdihn.png" />
    <meta property="og:image:alt" content="Logo JDIH DPRD Kabupaten Jember" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="JDIH DPRD Kabupaten Jember - Jaringan Dokumentasi dan Informasi Hukum" />
    <meta name="twitter:description" content="Dokumentasi hukum DPRD Kabupaten Jember. Akses cepat ke Perda, Keputusan, dan informasi hukum terbaru." />
    <meta name="twitter:image" content="https://jdih-dprd.jemberkab.go.id/frontend/assets/img/logos/jdihn.png" />

    <!-- Icons -->
    <link rel="icon" href="https://jdih-dprd.jemberkab.go.id/favicon.ico" />
    <link rel="apple-touch-icon" href="https://jdih-dprd.jemberkab.go.id/frontend/assets/img/logos/jdihn.png" />
    <meta name="theme-color" content="#0f766e" />

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "GovernmentOrganization",
                    "name": "JDIH DPRD Kabupaten Jember",
                    "url": "https://jdih-dprd.jemberkab.go.id/",
                    "logo": "https://jdih-dprd.jemberkab.go.id/frontend/assets/img/logos/jdihn.png",
                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "Jl. Kalimantan No.86, Tegal Boto Lor, Sumbersari",
                        "addressLocality": "Kabupaten Jember",
                        "addressRegion": "Jawa Timur",
                        "postalCode": "68121",
                        "addressCountry": "ID"
                    },
                    "contactPoint": [{
                            "@type": "ContactPoint",
                            "contactType": "Informasi dan Layanan Publik",
                            "telephone": "+62 821-3777-9668",
                            "email": "setwan@jemberkab.go.id",
                            "areaServed": "ID",
                            "availableLanguage": ["id"]
                        },
                        {
                            "@type": "ContactPoint",
                            "contactType": "Alternatif",
                            "email": "dprdkabjember@gmail.com",
                            "areaServed": "ID",
                            "availableLanguage": ["id"]
                        }
                    ]
                },
                {
                    "@type": "WebSite",
                    "name": "JDIH DPRD Kabupaten Jember",
                    "url": "https://jdih-dprd.jemberkab.go.id/",
                    "inLanguage": "id-ID",
                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "https://jdih-dprd.jemberkab.go.id/dokumen/index?DokumenSearch%5Bjudul%5D={search_term_string}",
                        "query-input": "required name=search_term_string"
                    }
                }
            ]
        }
    </script>

    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>




    <!-- start main-wrapper section -->
    <div class="main-wrapper">
        <!-- start header section -->
        <header>
            <div class="navbar-default" style="background: linear-gradient(to bottom, #ff6600 0%, #ff9900 44%)">
                <!-- start top search -->
                <!--                 <div class="top-search bg-theme" style="display: block;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" style="color:white">
                                Pusat Dokumentasi dan Jaringan Hukum Nasional
                        </div>
                            <div class="col-md-6" style="text-align: right;color:white">
                                Portal Resmi BPHN - Kementerian Hukum dan HAM RI
                            </div>
                        </div>
                    </div>
                </div> -->


                <!-- end top search -->

                <div class="container" style="background: linear-gradient(to bottom, #ff6600 0%, #ff9900 44%)">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="menu_area">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <?= Html::a(Html::img('@web/frontend/assets/img/logos/logo_jdih_dprd.png', ['id' => 'logo']), ['/'], ['class' => 'navbar-brand width-200px sm-width-180px xs-width-150px']); ?>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- start menu area -->
                                    <?= $this->render('menu.php') ?>
                                    <!-- end menu area -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header section -->

        <?= $content ?>

        <?= $this->render('footer.php') ?>



    </div> -->
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->


    <!-- all js include end -->

    <?php $this->endBody() ?>

    <!-- Google Analytics Start -->



    <!-- Google Analytics End -->

</body>

</html>
<?php $this->endPage() ?>