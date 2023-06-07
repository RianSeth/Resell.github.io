// Loading screen
// Menambahkan kelas 'loading' saat animasi loading dimulai
document.body.classList.add('loading');

// Menghapus kelas 'loading' setelah animasi loading selesai
document.addEventListener('DOMContentLoaded', function() {
  // Setelah animasi selesai, hapus kelas 'loading'
  setTimeout(function() {
    document.body.classList.remove('loading');
  }, 4500); // Delay dalam milidetik (3000 ms = 3 detik)

});

// // slider content
// const swiper = new Swiper('.swiper', {
//     effect: 'coverflow',
//     grabCursor: true,
//     centeredSlides: true,
//     loop: true,
//     speed: 400,
//     spaceBetween: 10,
//     slidesPerView:3,
//     autoplay: {
//         delay: 4000,
//     },
//     coverflowEffect: {
//         rotate: 0,
//         stretch: 0,
//         depth: 100,
//         modifier: 2.5,
//       },
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true
//     },
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//       },
//   });

//   button active
  document.querySelectorAll(".navigation a").forEach((link) => {
    if (link.href === window.location.href) {
        link.classList.add("active");
        link.setAttribute("aria-current", "page");
    }
});

// search-box open close js code
let navbar2 = document.querySelector(".navbar2");
let searchBox = document.querySelector(".search-box .bx-search");
// let searchBoxCancel = document.querySelector(".search-box .bx-x");

searchBox.addEventListener("click", ()=>{
  navbar2.classList.toggle("showInput");
  if(navbar2.classList.contains("showInput")){
    searchBox.classList.replace("bx-search" ,"bx-x");
  }else {
    searchBox.classList.replace("bx-x" ,"bx-search");
  }
});

// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar2 .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}


// sidebar submenu open close js code
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
if(htmlcssArrow){
  htmlcssArrow.onclick = function() {
    navLinks.classList.toggle("show1");
   }
}

let moreArrow = document.querySelector(".more-arrow");
if (moreArrow) {
  moreArrow.onclick = function() {
    navLinks.classList.toggle("show2");
   }  
}

let jsArrow = document.querySelector(".js-arrow");
if (jsArrow) {
  jsArrow.onclick = function() {
    navLinks.classList.toggle("show3");
   } 
}

// login card
$(document).ready(function() {
    var adminLink = $("a[data-page='index-data']");
    var loginContainer = $("#loginContainer");
    var overlay = $("#overlay");
  
    adminLink.on("click", function(event) {
      event.preventDefault();
  
      // Load login.php and display it in loginContainer
      $.get("pages/admin/login.php", function(response) {
        loginContainer.html(response);
        showLoginCard();
      });
    });
  
    overlay.on("click", function() {
      hideLoginCard();
    });
  
    function showLoginCard() {
      loginContainer.addClass("show");
      overlay.addClass("show");
    }
  
    function hideLoginCard() {
      loginContainer.removeClass("show");
      overlay.removeClass("show");
    }
  });

  const admins = document.querySelector(".admin");
  const darkLight = document.querySelector("#darkLight");
  const sidebar = document.querySelector(".sidebar");
  const submenuItems = document.querySelectorAll(".submenu_item");
  const sidebarOpen = document.querySelector("#sidebarOpen");
  const sidebarClose = document.querySelector(".collapse_sidebar");
  const sidebarExpand = document.querySelector(".expand_sidebar");
  if (sidebarOpen) {
    sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));
  }

  if (sidebarClose) {
    sidebarClose.addEventListener("click", () => {
      sidebar.classList.add("close", "hoverable");
    }); 
  }

  if (sidebarExpand) {
    sidebarExpand.addEventListener("click", () => {
      sidebar.classList.remove("close", "hoverable");
    });
  }
  
  if (sidebar) {
    sidebar.addEventListener("mouseenter", () => {
      if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.remove("close");
      }
    });

    sidebar.addEventListener("mouseleave", () => {
      if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.add("close");
      }
    });
  }
  
  if (darkLight) {
    darkLight.addEventListener("click", () => {
      admins.classList.toggle("light");
      if (admins.classList.contains("light")) {
        document.setI;
        darkLight.classList.replace("bx-moon", "bx-sun");
      } else {
        darkLight.classList.replace("bx-sun", "bx-moon");
      }
    });
  }
  
  if (submenuItems) {
    submenuItems.forEach((item, index) => {
      item.addEventListener("click", () => {
        item.classList.toggle("show_submenu");
        submenuItems.forEach((item2, index2) => {
          if (index !== index2) {
            item2.classList.remove("show_submenu");
          }
        });
      });
    });

    if (window.innerWidth < 768) {
      sidebar.classList.add("close");
    } else {
      sidebar.classList.remove("close");
    }
  }

  // Dropdown user admin
  const selectBox1 = document.querySelector('.select-box1');
  const selectOption1 = document.querySelector('.select-option1');
  const soValue1 = document.querySelector('#soValue1');
  const optionSearch1 = document.querySelector('#optionSearch1');
  const options1 = document.querySelector('.list-option');
  const optionsList1 = document.querySelectorAll('.list-option li');

  selectOption1.addEventListener('click', function(){
    selectBox1.classList.toggle('active');
  });

  optionsList1.forEach(function(optionsList1Single){
    optionsList1Single.addEventListener('click',function(){
      text = this.textContent;
      soValue1.value = text;
      selectBox1.classList.remove('active');
    });
  });

  optionSearch1.addEventListener('keyup', function(){
    var filter, li, i, textValue;
    filter = optionSearch1.value.toUpperCase();
    li = options1.getElementsByTagName('li');
    for(i = 0; i < li.length; i++){
      liCount = li[i];
      textValue = liCount.textContent || liCount.innerText;
      if (textValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = '';
      }else {
        li[i].style.display = 'none';
      }
    }
  })

  /*let text = document.getElementById('text');
let treeLeft = document.getElementById('tree-left');
let treeRight = document.getElementById('tree-right');
let gateLeft = document.getElementById('gate-left');
let gateRight = document.getElementById('gate-right');

window.addEventListener('scroll', () => {
    let value = window.scrollY;

    text.style.marginTop = value * 2.5 + 'px';
    treeLeft.style.left = value * -1.5 + 'px';
    treeRight.style.left = value * 1.5 + 'px';
    gateLeft.style.left = value * 0.5 + 'px';
    gateRight.style.left = value * -0.5 + 'px';
});*/