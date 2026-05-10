document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('contactForm');
  if(form){form.addEventListener('submit', function(e){
    const nev=form.nev.value.trim(), email=form.email.value.trim(), msg=form.uzenet.value.trim();
    const ok=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    if(!nev || !ok || msg.length<10){e.preventDefault(); alert('Hibás adat: név kötelező, e-mail formátum szükséges, üzenet legalább 10 karakter.');}
  });}
});
