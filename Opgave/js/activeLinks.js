const activeLinks = () =>{
    const pageTitle = document.title;
    const editOfTitle = pageTitle.replace(" | FancyClothes.dk", "");
    const allNavLinks = document.querySelectorAll(".navbar nav a");
    allNavLinks.forEach(link => {
        if(link.innerText.toLowerCase() == editOfTitle.toLowerCase()) {
            link.parentElement.classList.add("active");
        }
    });

}
activeLinks();