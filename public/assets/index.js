// jQuery(function ($) {
//   $(".sidebar-dropdown > a").click(function () {
//     $(".sidebar-submenu").slideUp(200);
//     if (
//       $(this)
//         .parent()
//         .hasClass("active")
//     ) {
//       $(".sidebar-dropdown").removeClass("active");
//       $(this)
//         .parent()
//         .removeClass("active");
//     } else {
//       $(".sidebar-dropdown").removeClass("active");
//       $(this)
//         .next(".sidebar-submenu")
//         .slideDown(200);
//       $(this)
//         .parent()
//         .addClass("active");
//     }
//   });
//   for (i = 0; i < coll.length; i++) {
//     coll[i].addEventListener("click", function () {
//       this.classList.toggle("active");
//       var content = this.nextElementSibling;
//       if (content.style.maxHeight) {
//         content.style.maxHeight = null;
//       } else {
//         content.style.maxHeight = content.scrollHeight + "px";
//       }
//     });
//   }

//   // var acc = document.getElementsByClassName("accordion");
//   // var i;

//   // for (i = 0; i < acc.length; i++) {
//   //   acc[i].addEventListener("click", function () {
//   //     this.classList.toggle("active");
//   //     var panel = this.nextElementSibling;
//   //     if (panel.style.display === "block") {
//   //       panel.style.display = "none";
//   //     } else {
//   //       panel.style.display = "block";
//   //     }
//   //   });
//   // }


// });