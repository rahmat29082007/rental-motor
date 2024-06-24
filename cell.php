<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Shell</h1>
        <label for="liter">Liter :</label>
        <input type="number" name="liter" id="liter" min="0" max="1000000" required>
        <br>
            <label for="jenis">jenis :</label>
            <select type="name" name="jenis" id="jenis">
                <option value="S Super">Shell Super</option>
                <option value="S V-Power">Shell V-Power</option>
                <option value="S V-Power Diesel">Shell V-Power Diesel</option>
                <option value="S V-Power Nitro">Shell V-Power Nitro</option>
             </select>
            <br>
        <button type="submit" name="beli">Beli</button>
    </form>
    <?php
    //panggil file nya
    
    //baru dibuka, langsung set harganya
    $logic = new pembelian();
    $logic->setHarga(10000,15000,18000,20000);
    //kalau udah piks beli
    if(isset($_POST['beli'])) {
        $logic->jenisYangDipilih = $_POST['jenis'];
        $logic->totalLiter = $_POST['liter'];
        $logic->totalHarga();
        $logic->cetakBukti();
    }  
    ?>
</body>
</html>

<?php
    class DataBahanBakar{
        private $HargaSSuper;
        private $HargaSVPower;
        private $HargaSVPowerDiesel;
        private $HargaSVPowerNitro;
        public $jenisYangDipilih;
        public $totalLiter;
        protected $totalPembayaran;

        public function setHarga ($valSSuper,$valSVPower,$valSVPowerDiesel,$valSVPowerNitro){
            $this->HargaSSuper = $valSSuper;
            $this->HargaSVPower = $valSVPower;
            $this->HargaSVPowerDiesel = $valSVPowerDiesel;
            $this->HargaSVPowerNitro = $valSVPowerNitro;
        }

        public function getHarga(){
            $semuaDataSolar["S Super"] = $this->HargaSSuper;
            $semuaDataSolar["S V-Power"] = $this->HargaSVPower;
            $semuaDataSolar["S V-Power Diesel"] = $this->HargaSVPowerDiesel;
            $semuaDataSolar["S V-Power Nitro"] = $this->HargaSVPowerNitro;
            return $semuaDataSolar;
        }
    }

    class pembelian extends DataBahanBakar{
        public function totalHarga(){
            $this->totalPembayaran = $this->getHarga()[$this->jenisYangDipilih] * $this->totalLiter;
        }

        public function cetakBukti(){
            echo "------------------------------------------------";
            echo "<br>";
            echo "Jenis Bahan Bakar : " . $this->jenisYangDipilih;
            echo "<br>";
            echo "Total Liter : " . $this->totalLiter;
            echo "<br>";
            echo "Harga Bayar : RP. " . number_format($this->totalPembayaran, 0,',','.');
            echo "<br>";
            echo "------------------------------------------------";
        }
    }
?>