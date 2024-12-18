// Pada halaman user login

// Fungsi untuk membuka atau menutup dropdown
function toggleDropdown() {
    var dropdown = document.getElementById("dropdown-menu");
    dropdown.classList.toggle("hidden");
}

// Menutup dropdown jika pengguna mengklik di luar menu
window.addEventListener("click", function (event) {
    var dropdown = document.getElementById("dropdown-menu");
    var button = document.querySelector('button[onclick="toggleDropdown()"]');

    // Cek apakah klik berada di luar dropdown dan tombolnya
    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.add("hidden");
    }
});
// =================================================================

// JavaScript untuk otomatis membuat slug saat mengetikkan nama produk
document.getElementById("name").addEventListener("input", function () {
    var name = this.value;
    var slug = name
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, "-") // Ganti spasi dan karakter non-alfanumerik dengan -
        .replace(/^-+|-+$/g, ""); // Hapus tanda hubung di awal dan akhir

    document.getElementById("slug").value = slug; // Update nilai slug di input
});

// ===== Admin Sidebar/Navbar =====

// === Dropdown Profile ===

// Fungsi untuk membuka atau menutup dropdown
function toggleDropdown() {
    var dropdown = document.getElementById("dropdown-menu");
    dropdown.classList.toggle("hidden");
}

// Menutup dropdown jika pengguna mengklik di luar menu
window.addEventListener("click", function (event) {
    var dropdown = document.getElementById("dropdown-menu");
    var button = document.querySelector('button[onclick="toggleDropdown()"]');
    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.add("hidden");
    }
});
// === End Dropdown Profile ===

// === Alert Logout ===

// Fungsi konfirmasi logout menggunakan SweetAlert
function confirmLogout(event) {
    event.preventDefault(); // Mencegah aksi default (navigasi)

    // Menampilkan SweetAlert konfirmasi
    Swal.fire({
        title: "Are you sure?",
        text: "You will be logged out!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#30D659FF",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log out!",
        cancelButtonText: "No, cancel!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user mengonfirmasi, submit form logout
            document.getElementById("logout-form").submit();
        }
    });
}

// === End Alert Logout ===
