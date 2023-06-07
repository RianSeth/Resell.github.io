<!-- ===== Parallax Container Start ===== -->
<section class="parallax">
    <div class="title">
        <h2>Welcome to<br><span>Resell</span></h2>
        <a href="index.php?p=result-produk">Goto Shop</a>
    </div>
    <!--<img src="../image/parallax/tree-left.png" id="tree-left">
    <img src="../image/parallax/tree-right.png" id="tree-right">
    <img src="../image/parallax/gate-left.png" id="gate-left">
    <img src="../image/parallax/gate-right.png" id="gate-right">
    <img src="../image/parallax/grass.png" id="grass">-->
</section>
<!-- ===== Parallax Container End ===== -->



<!-- ===== Kilas Produk ===== -->
<div class="box-carousel-produk">

    <!-- ===== Kategori ===== -->

    <section class="list-kategori-produk">
        <span>
            Pilihlah Kategori yang Menarik Minat Anda
        </span>
        <form action="index.php?p=result-produk" method="post">
        <div class="kategori-box2">
            <?php
            $q_kategori_produk = mysqli_query($db, "SELECT DISTINCT kategori FROM tbproduk");
            $daftar_kategori = array();
            
            while ($r_kategori_produk = mysqli_fetch_array($q_kategori_produk)) {
                $daftar_kategori[] = $r_kategori_produk['kategori'];
            }

            // Hapus duplikasi kategori
            $daftar_kategori_unik = array_unique($daftar_kategori);


            // Menampilkan input text dengan kategori
            foreach ($daftar_kategori_unik as $kategori) {
                echo '<input type="submit" name="pencarian" class="btn-kategori-box" value="' . $kategori . '">';
            }
            ?>
        </div>
        </form>
    </section>


    <div class="wrapper1">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel1">
            <?php
            $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk");
            while($r_tampil_produk = mysqli_fetch_array($q_tampil_produk)) {
                $idGambar = "1" . $r_tampil_produk['id_produk'];
                $q_tampil_gambar = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar'");
                $r_tampil_gambar = mysqli_fetch_array($q_tampil_gambar);
                ?>

            <a href="index.php?p=hasil-produk&id=<?php echo $r_tampil_produk['id_produk'] ?>" style="color: #000">
                <li class="card1">
                    <div class="img"><img src="./image/produk/<?php echo $r_tampil_gambar['nama_gambar'] ?>" alt="img" draggable="false"></div>
                    <h2><?php echo $r_tampil_produk['nama_produk']; ?></h2>
                    <span>Rp. <?php echo $r_tampil_produk['harga']; ?>,00</span>
                </li>
            </a>

                <?php
            }
            ?>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</div>
<script>
    const wrapper = document.querySelector(".wrapper1");
    const carousel = document.querySelector(".carousel1");
    const firstCardWidth = carousel.querySelector(".card1").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper1 i");
    const carouselChildrens = [...carousel.children];

    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });

    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }

    const dragging = (e) => {
        if(!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }

    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if(carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }

        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
        clearTimeout(timeoutId);
        if(!wrapper.matches(":hover")) autoPlay();
    }

    const autoPlay = () => {
        if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();

    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
</script>

<!-- ===== Panduan Toko ===== -->
<section class="panduan-beli">
    <span>
        Panduan Pembelian
    </span>
    <div class="info-panduan1">
        <span>
            Kami akan mengarahkan Anda langsung ke platform e-commerce terpercaya untuk menyelesaikan pembelian.
        </span>
        <div class="icon-panduan1">
            <i class='bx bx-store-alt'></i>
            <i class='bx bx-check-shield'></i>
            <i class='bx bx-check'></i>
        </div>
    </div>
    <div class="garis-batas"></div>
    <div class="info-panduan2">
        <div class="icon-panduan2">
            <i class='bx bx-link'></i>
            <i class='bx bx-dollar'></i>
            <i class='bx bx-store-alt'></i>
        </div>
        <span>
            Klik pada produk yang Anda minati untuk melihat informasi lebih lanjut dan melakukan pembelian melalui platform e-commerce yang dipercaya.
        </span>
    </div>
    <div class="garis-batas"></div>
    <div class="info-platform">
        Segera dapatkan penawaran spesial hanya di <span>Toko Kami</span> dengan mengklik link di bawah ini.
        <div class="link-market-shop">
            <a href="http://" target="_blank">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><path d="m27.0426 12.9416c-3.4291-2.897-16.85-2.2467-16.85-2.2467l-.4726 32.6506s17.8545.133 23.353 0 9.3414-4.5081 9.4005-7.8781 0-24.1813 0-24.1813c-6.858-.8277-11.9426-.1773-15.4309 1.6555z"/><circle cx="19.5311" cy="24.1719" r="6.9765"/><path d="m32.0431 29.33a6.2715 6.2715 0 1 0 -2.3-1.7859"/><path d="m10.193 10.695-4.494 3.252-.199 25.422 4.22 3.977"/><path d="m33.6953 11.0948a7.7961 7.7961 0 0 0 -15.3186-.2988"/><path d="m34.3962 19.662a2.3593 2.3593 0 0 1 -3.8777 2.59 4.1944 4.1944 0 1 0 3.8777-2.59z"/><path d="m20.5239 20.0074a2.4242 2.4242 0 0 1 -4.2509 2.2107 4.31 4.31 0 1 0 4.2509-2.2107z"/><path d="m24.3614 31.4175c0-2.8162 2.0309-3.9612 4.721-3.9612 2.3945 0 3.7543 3.2517 3.7543 3.2517a18.1787 18.1787 0 0 1 -7.4495 1.4485 9.9041 9.9041 0 0 0 5.3211 2.5423s-.8278.6208-3.6657.6208c-2.3058.0004-2.6812-2.4536-2.6812-3.9021z"/><path d="m30.317 31.5687a10.3937 10.3937 0 0 1 -.2583 3.0083"/></g></svg>
            </a>
            <a href="http://" target="_blank">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><path d="m33.0549 43.5h-18.11a4 4 0 0 1 -3.9731-3.5367l-2.5874-22.1907h31.2312l-2.5876 22.1907a4 4 0 0 1 -3.9731 3.5367z"/><path d="m13.3519 17.7726v-2.6126a10.66 10.66 0 0 1 21.3192 0v2.613"/><path d="m19.5288 36.9825c1.1539.8654 2.3077 1.1538 4.6154 1.1538h1.1539a3.75 3.75 0 0 0 0-7.5h-2.5962a3.75 3.75 0 0 1 0-7.5h1.1539c2.5961 0 3.75.2885 4.6154 1.1539"/></g></svg>
            </a>
        </div>
    </div>
</section>

<!-- ===== Kategori ===== -->

<!-- ===== Slider Start ===== -->
<!-- <section class="slider-content">
    <div class="slider-title">
        <h3 class="text-center section-subheading">Produk</h3>
        <h1 class="text-center section-heading">Langganan</h1>
    </div> -->
    

    <!-- Slider main container -->
    <!-- <div class="swiper tranding-slider"> -->
        <!-- Additional required wrapper -->
        <!-- <div class="swiper-wrapper"> -->
        
        <!-- Slides -->
        <!-- <div class="swiper-slide tranding-slide">
            <div class="tranding-slide-img">
                <img src="../image/Slider/food-1.jpg" alt="Tranding">
            </div>
            <div class="tranding-slide-content">
                <h1 class="food-price">20$</h1>
                <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                        Sandwich
                    </h2>
                    <h3 class="food-rating">
                        <span>4.5</span>
                        <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="swiper-slide tranding-slide">
            <div class="tranding-slide-img">
                <img src="../image/Slider/food-2.jpg" alt="Tranding">
            </div>
            <div class="tranding-slide-content">
                <h1 class="food-price">20$</h1>
                <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                        Sandwich
                    </h2>
                    <h3 class="food-rating">
                        <span>4.5</span>
                        <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="swiper-slide tranding-slide">
            <div class="tranding-slide-img">
                <img src="../image/Slider/food-3.jpg" alt="Tranding">
            </div>
            <div class="tranding-slide-content">
                <h1 class="food-price">20$</h1>
                <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                        Sandwich
                    </h2>
                    <h3 class="food-rating">
                        <span>4.5</span>
                        <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="swiper-slide tranding-slide">
            <div class="tranding-slide-img">
                <img src="../image/Slider/food-4.jpg" alt="Tranding">
            </div>
            <div class="tranding-slide-content">
                <h1 class="food-price">20$</h1>
                <div class="tranding-slide-content-bottom">
                    <h2 class="food-name">
                        Sandwich
                    </h2>
                    <h3 class="food-rating">
                        <span>4.5</span>
                        <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                    </h3>
                </div>
            </div>
        </div> -->

        <!--
        <div class="swiper-slide"><img src="/image/Slider/food-2.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/image/Slider/food-3.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/image/Slider/food-4.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/image/Slider/food-1.jpg" alt=""></div>
        <div class="swiper-slide"><img src="/image/Slider/food-2.jpg" alt=""></div>
        </div>
        -->
        <!-- If we need pagination 
        <div class="swiper-pagination"></div>-->

    <!-- </div>

    <div class="tranding-slider-control">
        <div class="swiper-button-prev slider-arrow">
            <ion-icon name="arrow-back-outline"></ion-icon>
        </div>
        <div class="swiper-button-next slider-arrow">
            <ion-icon name="arrow-forward-outline"></ion-icon>
        </div>
        <div class="swiper-pagination"></div>
    </div> -->

    <!--
    <div class="pagination_">
        <!-- If we need navigation buttons 
        <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
        <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
    </div>
    -->

<!-- </section> -->
<!-- ===== Slider End ===== -->
<?php
if (isset($_SESSION)) {
    unset($_SESSION);
    session_destroy();
}
?>