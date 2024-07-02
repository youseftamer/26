const navitems = document.querySelector(".nav__items");
const opennavbtn = document.querySelector("#open__nav-btn");
const closenavbtn = document.querySelector("#close__nav-btn");
const opennav = () => {
  navitems.style.display = "flex";
  opennavbtn.style.display = "none";
  closenavbtn.style.display = "inline-block";
};
const closenav = () => {
  navitems.style.display = "none";
  opennavbtn.style.display = "inline-block";
  closenavbtn.style.display = "none";
};
opennavbtn.addEventListener("click", opennav);
closenavbtn.addEventListener("click", closenav);
function updateUploadButton(input) {
  const label = document.getElementById("uploadLabel");
  if (input.files.length > 0) {
    label.textContent = input.files[0].name;
  } else {
    label.textContent = "Upload File";
  }
}

const sidebar = document.querySelector("aside");
const showsidebarbtn = document.querySelector("#show__sidebar-btn");
const hidesidebarbtn = document.querySelector("#hide__sidebar-btn");
const showsidebar = () => {
  sidebar.style.left = '0';
  showsidebarbtn.style.display = 'none'
  hidesidebarbtn.style.display = 'inline-block'
}
const hidesidebar = () => {
  sidebar.style.left = '-100%';
  showsidebarbtn.style.display = 'inline-block'
  hidesidebarbtn.style.display = 'none'
}


showsidebarbtn.addEventListener('click', showsidebar)
hidesidebarbtn.addEventListener('click', hidesidebar)
