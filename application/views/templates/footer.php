<footer>
  <div class="row">
    <div class="col-md-6">
      <h4>Siap untuk masak?</h4>
      <p>Sign up untuk mendapatkan email mingguan</p>
      <form class="form-inline footer_button">
        <input type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter your email">
        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
      </form>
      <h6 class="mt-4">Ikuti akun sosial media kami</h6>
      <div>
        <a href="#"><i class="fab fa-instagram" style="font-size: 30px; margin-right: 10px;"></i></a>
        <a href="#"><i class="fab fa-facebook" style="font-size: 30px; margin-right: 10px;"></i></a>
        <a href="#"><i class="fab fa-youtube" style="font-size: 30px;"></i></a>
      </div>
    </div>

    <div class="col-md-3">
      <ul class="list-unstyled">
        <li><a href="<?= site_url('resep') ?>">RESEP</a></li>
        <li><a href="<?= site_url('kelas') ?>">KELAS</a></li>
        <li><a href="<?= site_url('member') ?>">MEMBER</a></li>

      </ul>
    </div>

    <div class="col-md-3">
      <ul class="list-unstyled">
        <li><a href="<?= site_url('tentang') ?>">About Us</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Advertise</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</footer>

<script>
// Fungsi untuk menangani klik pada bintang
document.querySelectorAll('.stars input').forEach((star) => {
  star.addEventListener('click', function() {
    var rating = this.value; // Ambil nilai rating dari input yang dipilih

    // Kirim rating ke server menggunakan AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo site_url('resep/submit_rating/' . $resep->id); ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status == 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'success') {
          // Tampilkan pesan sukses (misalnya, notifikasi)
          alert(response.message);
          // Update tampilan rating jika diperlukan (misalnya, update jumlah rata-rata)
        } else {
          // Tampilkan pesan error jika rating tidak valid
          alert(response.message);
        }
      } else {
        alert('Terjadi kesalahan saat mengirim rating');
      }
    };

    // Kirimkan rating ke server
    xhr.send('rating=' + rating);
  });
});
</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="<?= base_url(); ?>assets/user/js/bootstrap.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script>
$('.alert').alert().delay(3000).slideUp('slow');
</script>

</body>

</html>