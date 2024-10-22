document.addEventListener('DOMContentLoaded', () => {
    const hoverElement = document.querySelector('.car-vhcl-menu');
    const targetElement = document.querySelector('.nav-snmn');
    const hoverElement2 = document.querySelector('.for-sale-menu');
    const targetElement2 = document.querySelector('.nav-snmn2');
    const hoverElement3 = document.querySelector('.property21');
    const targetElement3 = document.querySelector('.nav-snmn3');
    const hoverElement4 = document.querySelector('.jobs21');
    const targetElement4 = document.querySelector('.nav-snmn4');
    const hoverElement5 = document.querySelector('.Services21');
    const targetElement5 = document.querySelector('.nav-snmn5');
    const hoverElement6 = document.querySelector('.Community21');
    const targetElement6 = document.querySelector('.nav-snmn6');
    const hoverElement7 = document.querySelector('.Pets21');
    const targetElement7 = document.querySelector('.nav-snmn7');
  
    if (hoverElement && targetElement) { 
      hoverElement.addEventListener('mouseenter', () => {
        targetElement.style.display = 'flex';
      });
  
      hoverElement.addEventListener('mouseleave', () => {
        targetElement.style.display = 'none';
      });
    } 
    if (hoverElement2 && targetElement2) { 
      hoverElement2.addEventListener('mouseenter', () => {
        targetElement2.style.display = 'flex';
      });
  
      hoverElement2.addEventListener('mouseleave', () => {
        targetElement2.style.display = 'none';
      });
    } 
    if (hoverElement3 && targetElement3) { 
      hoverElement3.addEventListener('mouseenter', () => {
        targetElement3.style.display = 'flex';
      });
  
      hoverElement3.addEventListener('mouseleave', () => {
        targetElement3.style.display = 'none';
      });
    } 
    if (hoverElement4 && targetElement4) { 
      hoverElement4.addEventListener('mouseenter', () => {
        targetElement4.style.display = 'flex';
      });
  
      hoverElement4.addEventListener('mouseleave', () => {
        targetElement4.style.display = 'none';
      });
    } 
    if (hoverElement5 && targetElement5) { 
      hoverElement5.addEventListener('mouseenter', () => {
        targetElement5.style.display = 'flex';
      });
  
      hoverElement5.addEventListener('mouseleave', () => {
        targetElement5.style.display = 'none';
      });
    } 
    if (hoverElement6 && targetElement6) { 
      hoverElement6.addEventListener('mouseenter', () => {
        targetElement6.style.display = 'flex';
      });
  
      hoverElement6.addEventListener('mouseleave', () => {
        targetElement6.style.display = 'none';
      });
    } 
    if (hoverElement7 && targetElement7) { 
      hoverElement7.addEventListener('mouseenter', () => {
        targetElement7.style.display = 'flex';
      });
  
      hoverElement7.addEventListener('mouseleave', () => {
        targetElement7.style.display = 'none';
      });
    } 
  
  
  
  
  
  
  
  
  
  
  
  
  
    let crsEnd = document.querySelector(".crs-end")
    let remenuIn = document.querySelector(".remenu-sub")
    let carVhc = document.querySelector(".car-vhcl-menu-res")
  
    crsEnd.addEventListener('click', () => {
      remenuIn.style.display = 'none';
     
    })
      
     
      carVhc.addEventListener('click', () => {
      remenuIn.style.display = 'block';
    
    })
      
  });