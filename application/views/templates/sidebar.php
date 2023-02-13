  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed font-color" href="<?= base_url('admin/index')?>">
          <i class="bi bi-grid"></i>
          <span class="font-color">Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed font-color" data-bs-target="#components-nav" href="<?=base_url('admin/kategory')?>">
          <i class="bi bi-menu-button-wide font-color"></i><span class="font-color">Kategori</span><i class="bi ms-auto"></i>
        </a>      
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="<?=base_url('admin/pengeluaran')?>">
          <i class="bi bi-journal-text"></i><span class="font-color">Transaksi</span><i class="bi ms-auto"></i>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" href="<?=base_url('admin/karyawan')?>">
          <i class="bi bi-layout-text-window-reverse"></i><span class="font-color">Karyawan</span><i class="bi ms-auto"></i>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" href="<?=base_url('admin/laporan')?>">
          <i class="bi bi-journal-text"></i><span class="font-color">Cetak Laporan</span><i class="bi ms-auto"></i>
        </a>
      </li><!-- End Tables Nav -->


    <!-- End Charts Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

<div class="pagetitle">
  <h1><?= $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('admin/index')?>">Home</a></li>
      <li class="breadcrumb-item active"><?= $title ?></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
