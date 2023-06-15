document.getElementById('submitBarang').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman form secara langsung

    // Logika validasi form di sini
    // Contoh validasi sederhana
    var nama_pengirim = document.getElementById('nama_pengirim').value;
    var nama_penerima = document.getElementById('nama_penerima').value;
    var nama_barang = document.getElementById('nama_barang').value;
    var jenis_barang = document.getElementById('jenis_barang').value;
    var mudah_pecah = document.querySelector('input[name="mudah_pecah"]:checked').value;
    var berat = document.getElementById('berat').value;

    console.log(nama_pengirim)
    console.log(mudah_pecah)

    var data = {
        nama_pengirim: nama_pengirim,
        nama_penerima: nama_penerima,
        nama_barang: nama_barang,
        jenis_barang: jenis_barang,
        mudah_pecah: mudah_pecah,
        berat_barang: berat
    }

    // fetch('https://omanfathurrahmannur.pythonanywhere.com/barang', {
    fetch('http://127.0.0.1:8080/barang', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));

    // Jika semua validasi lulus, kirim form secara manual
    // this.submit();
});