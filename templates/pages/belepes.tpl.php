<h2>Bejelentkezés</h2>
<form method="post" action="belep">
<div class="form-row"><label for="felhasznalo">Felhasználónév</label><input id="felhasznalo" name="felhasznalo" required></div>
<div class="form-row"><label for="jelszo">Jelszó</label><input id="jelszo" name="jelszo" type="password" required></div>
<button type="submit">Belépés</button>
</form>
<h3>Regisztráció</h3>
<form method="post" action="regisztral">
<div class="form-row"><label>Vezetéknév</label><input name="vezeteknev" required></div>
<div class="form-row"><label>Utónév</label><input name="utonev" required></div>
<div class="form-row"><label>Felhasználónév</label><input name="felhasznalo" maxlength="12" required></div>
<div class="form-row"><label>Jelszó</label><input name="jelszo" type="password" required></div>
<button type="submit">Regisztrálok</button>
</form>