
// Preloader
window.addEventListener('load',()=>{
  const p=document.querySelector('.preloader'); if(p){ setTimeout(()=>p.classList.add('hide'),350); }
});

// Mobile nav toggle
document.addEventListener('click', (e)=>{
  const btn = e.target.closest('[data-nav-toggle]');
  if(btn){
    document.querySelector('.links').classList.toggle('open');
  }
});

// Counter animation
function animateCounter(el){
  const target = parseInt(el.dataset.to || '0',10);
  const duration = 1600;
  const start = 0;
  const t0 = performance.now();
  function tick(t){
    const p = Math.min(1,(t - t0)/duration);
    el.textContent = Math.floor(start + (target - start)*p) + '+';
    if(p<1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}
document.querySelectorAll('[data-to]').forEach(animateCounter);

// Testimonials slider (auto)
const track = document.querySelector('.testimonials .track');
if(track){
  let i = 0;
  setInterval(()=>{
    i = (i + 1) % track.children.length;
    track.style.transform = `translateX(${-i * (track.children[0].offsetWidth+12)}px)`;
  }, 3000);
}
