<?php
    include("sambungan.php");
    include("keselamatan.php");
?>

<link rel="stylesheet" href="amenu.css">

<nav>
    <header>
        <img class="logo" src="imej/logo.png">
        <img class="kelab" src="imej/namakedai.png">
    </header>

    <ul>
        <li>
            <a href="#"><b>JURUJUAL</b></a>
            <ul>
                <li><a href="pekerja_insert.php">Tambah</a></li>
                <li><a href="pekerja_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>PELANGGAN</b></a>
            <ul>
                <li><a href="pelanggan_insert.php">Tambah</a></li>
                <li><a href="pelanggan_senarai.php">Senarai</a></li>
                <li><a href="pelanggan_carian.php">Carian</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>MAKANAN</b></a>
            <ul>
                <li><a href="makanan_insert.php">Tambah</a></li>
                <li><a href="makanan_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="laporan.php"><b>LAPORAN</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="import.php"><b>IMPORT</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="logout.php"><b>LOGOUT</b></a>
        </li>
    </ul>
</nav>
