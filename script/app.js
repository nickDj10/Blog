// Rotate Card

var posts = document.getElementsByClassName("posts")[0];

posts.addEventListener("click", rotateCard);

function rotateCard(event) {
   var clicked = event.target;
   console.log(clicked);

   if (clicked.classList.contains("type__two")) {
      var parent = clicked.parentNode.parentNode.parentNode.parentNode;
      parent.firstElementChild.classList.toggle("front-rotate");
      parent.lastElementChild.classList.toggle("back-rotate");
   }
}

// Navigation

var myNav = document.getElementById("mynav");
var linkNav = document.querySelectorAll(".link-nav");

window.onscroll = function () {
   if (document.documentElement.scrollTop > 50) {
      myNav.classList.add("nav-colored");
      for (var i = 0; i < linkNav.length; i++) {
         linkNav[i].classList.add("link-nav__scroll");
      }
   } else {
      myNav.classList.remove("nav-colored");
      for (var i = 0; i < linkNav.length; i++) {
         linkNav[i].classList.remove("link-nav__scroll");
      }
   }
};

// Modal

var modal = document.getElementById("myModal");
var btn = document.getElementById("myButton");
var cls = document.getElementsByClassName("close")[0];

if (btn != null) {
   btn.onclick = function () {
      modal.style.display = "block";
   };
}

cls.onclick = function () {
   modal.style.display = "none";
};

// LogIn / SignUp

document
   .getElementsByClassName("message")[0]
   .addEventListener("click", myFunction);

document
   .getElementsByClassName("message_two")[0]
   .addEventListener("click", myFunction_two);

var div_one = document.getElementsByClassName("login")[0];
var div_two = document.getElementsByClassName("signup")[0];

function myFunction() {
   div_one.classList.add("first");
   div_two.classList.add("second");
}

function myFunction_two() {
   div_one.classList.remove("first");
   div_two.classList.remove("second");
}

// Display Comment Section

var plus = document.getElementsByClassName("fa-circle-plus")[0];
var comment_section = document.getElementsByClassName("comment-form")[0];

plus.addEventListener("click", showComment);

function showComment() {
   comment_section.classList.toggle("display");
}
