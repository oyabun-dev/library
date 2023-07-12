const navItems = document.querySelectorAll('.nav-item');
const navItemsArray = Array.from(navItems);

navItemsArray.forEach((item) => {
    item.addEventListener('click', (e) => {
        item.classList.remove('active');
        item.children[0].classList.remove('btn', 'btn-active');
        e.target.classList.add('active');
        console.log(item);
        console.log(e.target);
    });
});


const fileInput = document.getElementById("book-cover");
const image = document.getElementById("cover-img");

  fileInput.addEventListener("change", function(event) {
    const selectedFile = event.target.files[0];
    const filePath = URL.createObjectURL(selectedFile);
    image.src = filePath;
  });