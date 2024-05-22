<header id="header" class="fixed-top">
<div class="container d-flex">

    <div class="logo mr-auto">
    <h1 class="text-light" style="width: 350px;"><a href="{{ url('')}}"><span>BEM</span>STMIK BDG</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu d-none d-lg-block">
    <ul style="width: 1500px;">
        <li class="active"><a href="{{ url('') }}">Beranda</a></li>
        <li><a href="{{ url('')}}#services">Instruksi</a></li>
        <!-- <li><a href="{{ url('') }}#blog">Informasi</a></li> -->
        <li><a href="{{ url('') }}#contact">Kontak</a></li>
        <!-- <li><a href="{{ url('')}}#portfolio">Gallery</a></li> -->
        <li><a href="{{ url('pendaftaran')}}">Berkas</a></li>
        <li><a href="{{ url('data-lamaran')}}">Rekrutmen</a></li>
        <?php if(Auth::user() == ''){ ?>
            <li><a href="<?= url('login')?>">Login</a></li>
          <?php }else{ ?>
            <li class="drop-down"><a href="#">{{ Auth::user()->name}}</a>
              <ul>
                <li><a href="<?= url('profile')?>">Profile</a></li>
                <li><a href="<?= url('logout')?>">Logout</a></li>
              </ul>
            </li>
          <?php }?>
    </ul>
    </nav><!-- .nav-menu -->

</div>
</header><!-- End Header -->