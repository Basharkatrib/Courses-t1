// window.Echo.channel('notifications')
//     .listen('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', (event) => {
//         console.log(`New course added: ${event.course_name}`);
//         // إظهار الإشعار لبضع ثوانٍ
//         showTemporaryNotification(`New Course: ${event.course_name}`);
//     });

// function showTemporaryNotification(message) {
//     const notification = document.createElement('div');
//     notification.textContent = message;
//     notification.style.position = 'fixed';
//     notification.style.top = '20px';
//     notification.style.right = '20px';
//     notification.style.backgroundColor = '#4caf50';
//     notification.style.color = '#fff';
//     notification.style.padding = '10px 20px';
//     notification.style.borderRadius = '5px';
//     notification.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';
//     document.body.appendChild(notification);

//     setTimeout(() => {
//         notification.remove();
//     }, 5000); // الإشعار يظهر لمدة 5 ثوانٍ
// }




var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
  });




  function executeRating(stars) {
    const starClassActive = "rating__star fas fa-star";
    const starClassInactive = "rating__star far fa-star";
    const starsLength = stars.length;
    let i;
    stars.map((star) => {
      star.onclick = () => {
        i = stars.indexOf(star);
        if (star.className === starClassInactive) {
          for (i; i >= 0; --i) stars[i].className = starClassActive;
        } else {
          for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
        }
      };
    });
  }
  
  // Get all cards and apply the rating functionality to each card
  const allCards = document.getElementsByClassName("cards");
  for (let card of allCards) {
    const ratingStars = card.getElementsByClassName("rating__star");
    executeRating([...ratingStars]);
  }









  const links = document.querySelectorAll('.link');

  links.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default link behavior
          links.forEach(l => {
              l.classList.remove('border-highlight'); // Remove border from all links
          });
          this.classList.add('border-highlight'); // Add border to the clicked link
      });
  });
















//login

  var modal = document.getElementById("loginModal");
    var openModalButton = document.getElementById("openModalButton");
    var closeButton = document.getElementById("closeButton");

    openModalButton.onclick = function() {
        modal.style.display = "flex";
    }

    closeButton.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }




//signup

    var modal2 = document.getElementById("loginModal2");
    var openModalButton2 = document.getElementById("openModalButton2");
    var closeButton2 = document.getElementById("closeButton2");

    openModalButton2.onclick = function() {
        modal2.style.display = "flex";
    }

    closeButton2.onclick = function() {
        modal2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal2.style.display = "none";
        }
    }




    function toggleDropdown() {
      document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
      if (!event.target.matches('.main-image img')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          for (var i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
              }
          }
      }
  }


























