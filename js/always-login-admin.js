  $(document).ready(function() {
    // Cek status login saat halaman dimuat
    checkLoginStatus();

    // Tangani peristiwa saat pengguna menavigasi kembali menggunakan tombol "Go back" di browser
    window.onpopstate = function(event) {
      event.preventDefault();
      checkLoginStatus();
    };

    // Fungsi untuk memeriksa status login pengguna
    function checkLoginStatus() {
      // Lakukan AJAX request untuk memeriksa status login pada backend
      $.ajax({
        url: "../pages/admin/cek_login.php", // Ganti dengan URL yang sesuai untuk memeriksa status login pada backend
        method: "GET",
        success: function(response) {
          // Jika pengguna sudah login, arahkan ke halaman dashboard
          if (response === "logged_in") {
            window.location.href = "../../index.php?p=index-data&&user=$nameadmin"; // Ganti dengan URL halaman dashboard yang sesuai
          }
          // Jika pengguna belum login, tampilkan login card
          else {
            showLoginCard();
          }
        }
      });
    }

    // Fungsi untuk memuat login card menggunakan AJAX
  function loadLoginCard() {
    $.get("../pages/admin/login.php", function(response) {
      // Tambahkan logika untuk menampilkan login card sesuai dengan kebutuhan Anda
      // Misalnya, dengan mengubah tampilan HTML atau memunculkan elemen yang sesuai
      $("#loginContainer").html(response);
      showLoginCard();
    });
  }

    
  });
  