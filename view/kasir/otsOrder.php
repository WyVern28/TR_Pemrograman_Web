<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'kasir') {
    header('Location: ../login.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit();
}

$currentDateTime = date('d-m-y');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTS Order - Hotel</title>
    <link rel="stylesheet" href="../../asset/css/kasir.css">
</head>
<body>
    <sidebar>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Hotel Kasir</h3>
        </div>

        <div class="sidebar-nav">
            <p>NAVIGASI</p>
            <ul class="sidebar-menu">
                <li><a href="kasirPage.php">DASHBOARD</a></li>
                <li><a href="OnlineOrder.php">ONLINE ORDER</a></li>
                <li><a href="otsOrder.php" class="active">OTS ORDER</a></li>
                <li><a href="occupancy.php">OCCUPANCY</a></li>
                <li><a href="kasirPage.php?logout=true">Logout</a></li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <p>Logged in as:</p>
            <span><?php echo $_SESSION['username']; ?></span>
        </div>
    </div>
    </sidebar>
    <div class="main-content">
        <h1>OTS Order</h1>
        <div class="section-title">BUAT BOOKING BARU (WALK-IN)</div>

        <div class="info-box">
            <p>ID KASIR: KSR001</p>
            <p>NAMA KASIR: <?php echo $_SESSION['username']; ?></p>
            <p>TANGGAL: <?php echo date('d/m/Y'); ?></p>
        </div>

        <!-- Form Booking Baru -->
        <div class="form-container">
            <h3>Data Tamu</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-input" placeholder="Masukkan nama tamu">
                </div>
                <div class="form-group">
                    <label>No. KTP</label>
                    <input type="text" class="form-input" placeholder="Masukkan no KTP">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-input" placeholder="Masukkan no telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-input" placeholder="Masukkan alamat">
                </div>
            </div>

            <h3>Data Booking</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <select class="form-input">
                        <option value="">Pilih Tipe Kamar</option>
                        <option value="standard">Standard - Rp 300.000/malam</option>
                        <option value="deluxe">Deluxe - Rp 500.000/malam</option>
                        <option value="suite">Suite - Rp 800.000/malam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No. Kamar</label>
                    <select class="form-input">
                        <option value="">Pilih No Kamar</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Check-in</label>
                    <input type="date" class="form-input" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label>Tanggal Check-out</label>
                    <input type="date" class="form-input">
                </div>
            </div>

            <h3>Pembayaran</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label>Jumlah Malam</label>
                    <input type="number" class="form-input" value="1" min="1">
                </div>
                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="text" class="form-input" value="Rp 0" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Diskon</label>
                    <input type="text" class="form-input" placeholder="Masukkan kode diskon (optional)">
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-input">
                        <option value="">Pilih Metode</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="card">Kartu Debit/Kredit</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <button class="btn-action">PROSES BOOKING</button>
                <button class="btn-action secondary">RESET</button>
            </div>
        </div>

        <!-- Daftar OTS Order Hari Ini -->
        <div class="section-title" style="margin-top: 30px;">DAFTAR OTS ORDER HARI INI</div>
        <div class="filter-container">
            <button class="btn-filter">FILTER</button>
            <button class="btn-filter">SEARCH</button>
        </div>
        <table class="order-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID BOOKING</th>
                    <th>NAMA TAMU</th>
                    <th>NO KAMAR</th>
                    <th>CHECK-IN</th>
                    <th>CHECK-OUT</th>
                    <th>TOTAL</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="status-occupied">PAID</span></td>
                    <td>
                        <button class="btn-edit">EDIT</button>
                        <button class="btn-delete">DELETE</button>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="status-available">PENDING</span></td>
                    <td>
                        <button class="btn-edit">EDIT</button>
                        <button class="btn-delete">DELETE</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <footer>
            Copyright &copy; Hotel <?php echo date('Y'); ?>
        </footer>
    </div>
</body>
</html>
