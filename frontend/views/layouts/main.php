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

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Portal resmi JDIH DPRD Kabupaten Jember. Akses Peraturan Daerah, Keputusan DPRD, dan dokumentasi hukum secara cepat dan akurat." />
    <link rel="canonical" href="https://jdih-dprd.jemberkab.go.id/" />
    <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1" />
    <meta name="googlebot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">
    <meta name="author" content="Sekretariat DPRD Kabupaten Jember">

    <meta name="keywords" content="JDIH, JDIH DPRD, JDIH DPRD Kabupaten Jember, JDIH DPRD Jember, JDIH Jember, JDIHN, JDIHN Jember, JDIH Nasional, Jaringan Dokumentasi dan Informasi Hukum, Jaringan Dokumentasi Informasi Hukum, Portal JDIH, Portal JDIH DPRD, Portal JDIH Jember, Portal Hukum, Portal Hukum Daerah, Situs Hukum Daerah, Situs Resmi DPRD, Situs Resmi DPRD Jember, Situs Resmi JDIH DPRD Jember, DPRD, DPRD Kabupaten Jember, Dewan Perwakilan Rakyat Daerah, Dewan Perwakilan Rakyat Daerah Kabupaten Jember, Sekretariat DPRD, Sekretariat DPRD Kabupaten Jember, Sekwan DPRD Jember, Pemerintah Kabupaten Jember, Pemkab Jember, Kabupaten Jember, Jember, Jawa Timur, Pemprov Jawa Timur, Produk Hukum, Produk Hukum Daerah, Produk Hukum DPRD, Peraturan Daerah, Perda, Peraturan DPRD, Keputusan DPRD, Keputusan Pimpinan DPRD, Peraturan Tata Tertib, Tatib DPRD, Peraturan Bupati, Keputusan Bupati, Peraturan Bersama, Raperda, Ranperda, Rancangan Peraturan Daerah, Naskah Akademik, Legislasi, Legislasi Daerah, Legislasi DPRD, Program Legislasi Daerah, Prolegda, Legislasi Jember, Pembentukan Peraturan Daerah, Evaluasi Peraturan Daerah, Harmonisasi Peraturan, Kajian Hukum, Analisis Hukum, Sosialisasi Hukum, Penyusunan Peraturan, Pengundangan, Penetapan Perda, Publikasi Peraturan, Database Peraturan, Basis Data Peraturan, Basis Data Hukum, Koleksi Dokumen Hukum, Arsip Hukum, Dokumen Hukum, Dokumen Hukum Daerah, Dokumen Hukum DPRD, Dokumen Hukum Jember, Dokumen Resmi DPRD, Arsip DPRD, Arsip Daerah, Sistem Informasi Hukum, Sistem Informasi JDIH, Sistem Informasi Produk Hukum, Sistem Informasi Legislasi, Aplikasi JDIH, Aplikasi JDIH DPRD Jember, Layanan Informasi Publik, Layanan Informasi Hukum, Layanan Hukum, Layanan Publik DPRD, Pelayanan Informasi Publik, Pelayanan Hukum, Transparansi Legislasi, Transparansi Pemerintahan, Keterbukaan Informasi, Keterbukaan Hukum, Partisipasi Publik, Edukasi Hukum, Sosialisasi Perda, Sosialisasi DPRD, Penyebarluasan Produk Hukum, Informasi Peraturan, Informasi Hukum, Informasi Legislasi, Informasi DPRD, Informasi Kegiatan DPRD, Agenda DPRD, Kegiatan DPRD, Berita DPRD, Publikasi DPRD, Profil DPRD, Struktur Organisasi DPRD, Pimpinan DPRD, Anggota DPRD, Komisi DPRD, Badan Musyawarah, Badan Anggaran, Badan Pembentukan Perda, Bapemperda, Badan Kehormatan, Alat Kelengkapan Dewan, Fraksi DPRD, Fraksi DPRD Jember, Ketua DPRD, Wakil Ketua DPRD, Sekretaris DPRD, Tugas dan Fungsi DPRD, Fungsi Legislasi, Fungsi Anggaran, Fungsi Pengawasan, Tata Tertib DPRD, Tata Cara Pembentukan Perda, Hubungan DPRD dan Bupati, Hubungan DPRD dan Pemerintah Daerah, Kebijakan Daerah, Kebijakan Publik, Kebijakan Hukum, Hukum Daerah, Hukum Pemerintahan, Hukum Publik, Hukum Administrasi, Hukum Tata Pemerintahan, Hukum Peraturan Daerah, Hukum Legislasi, Hukum Jember, Hukum Indonesia, Hukum Nasional, Undang-Undang, Peraturan Pemerintah, Keputusan Presiden, Peraturan Menteri, Peraturan Sekretaris Daerah, Sinkronisasi Hukum, Harmonisasi Hukum, Evaluasi Hukum, Pembinaan JDIH, Pembinaan Hukum, Pembinaan Legislasi, Pendokumentasian Hukum, Pendataan Peraturan, Penelusuran Dokumen Hukum, Database Hukum, Open Data Hukum, Open Data Pemerintah, Digitalisasi Dokumen Hukum, Digitalisasi Legislasi, Digitalisasi DPRD, Dokumentasi Hukum Digital, Dokumentasi Produk Hukum, Dokumentasi Hukum Terpadu, Digital Archive JDIH, Integrasi JDIHN, Portal Integrasi JDIH, Portal Resmi JDIH, jdih-dprd.jemberkab.go.id, jdih.dprd.jemberkab.go.id, jdih jemberkab go id, JDIH online, Sistem Dokumentasi Hukum, Informasi Perda Terbaru, Perda Terbaru Jember, Produk Hukum Terbaru, Peraturan Daerah Terbaru, Keputusan DPRD Terbaru, Keputusan Pimpinan DPRD Terbaru, Tatib DPRD Jember, Perda Kabupaten Jember, Legislasi Kabupaten Jember, Produk Hukum Kabupaten Jember, Portal Legislasi Jember, Hukum Terbuka, Hukum Transparan, Hukum Daerah Online, Akses Dokumen Hukum, Download Perda, Download Keputusan DPRD, Download Produk Hukum, Arsip Digital DPRD, Arsip Digital JDIH, Arsip Peraturan Daerah, Arsip Peraturan DPRD, Koleksi Digital JDIH, Koleksi Digital DPRD, Dokumentasi Digital, Transparansi DPRD Jember, Transparansi Pemerintahan Jember, Transparansi Informasi Jember, Pelayanan Publik DPRD Jember, Pemerintah Terbuka Jember, Open Government, Good Governance, Pemerintahan Daerah, Peraturan Perundang-undangan, Himpunan Produk Hukum, Himpunan Peraturan Daerah, Himpunan Keputusan DPRD, Daftar Perda, Daftar Produk Hukum, Daftar Peraturan DPRD, Daftar Keputusan DPRD, Informasi Produk Hukum Daerah, Informasi Keputusan DPRD, Pusat Dokumentasi Hukum, Pusat Informasi Hukum, Pusat Legislasi Daerah, Humas DPRD Jember, Informasi Resmi DPRD, Publikasi Hukum, Edukasi Masyarakat Hukum, Masyarakat Hukum Daerah, Sosialisasi Hukum Daerah, Pelatihan Legislasi, Pendampingan Hukum, Pemerintah Daerah Jember, Jemberkab, Jemberkab.go.id, Jember Regency, DPRD Jemberkab, JDIH DPRD Kab Jember, Sekretariat DPRD Jemberkab, Hukum Jemberkab, Produk Hukum Jemberkab, Legislasi Jemberkab, Portal JDIH Kabupaten Jember, Website JDIH Jember, Website DPRD Jember, Website DPRD Kabupaten Jember, Portal DPRD Jember, Portal DPRD Kabupaten Jember, Website Pemerintah Jember, Portal Pemerintah Jember, Situs Pemerintah Daerah Jember">

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

    <meta name="language" content="id">

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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17652999903"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-17652999903');
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