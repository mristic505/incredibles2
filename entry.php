<?php ?>
<form>
	<p class="form__error-text"> First Name
		<input type="text" name="firstName" id="firstName" required>
	</p>
	<p class="form__error-text"> Last Name
		<input type="text" name="lastName" id="lastName" required>
	</p>
	<p class="form__error-text"> Your Email
		<input type="email" name="email" id="email" required>
	</p>
	<p class="form__error-text"> Confirm Email
		<input type="email" name="confirmEmail" id="confirmEmail" required>
	</p>
	<p class="form__error-text"> Phone Number (optional)
		<input type="text" name="phoneNumber" id="phoneNumber" >
	</p>
	<p class="form__error-text"> Enter Code 1
		<input type="text" name="firstCode" id="firstCode" >
	</p>
	<p class="form__error-text"> Enter Code 2
		<input type="text" name="secondCode" id="secondCode" >
	</p>
	<p class="form__error-text"> Enter Code 3
		<input type="text" name="thirdCode" id="thirdCode" >
	</p>
	<p class="form__error-text"> I am 18 years or older....
		<input type="checkbox" name="ageCheck" id="ageCheck" required>
	</p>
	<p class="form__error-text">I would like to recieve emails....
		<input type="checkbox" name="emailOptIn" id="emailOptIn" >
	</p>
	<p class="form__error-text">I acknowledge that I will be entered into the sweepstakes....
		<input type="checkbox" name="sweepOptIn" id="sweepOptIn" required>
	</p>
	<p class="form__error-text">
		<div class="g-recaptcha" data-sitekey="6LcP2FQUAAAAAKR6_Fl0U6uw640gCz_0-fHNX-Sk"></div>
	</p>
	<p class="form__error-text">
		<input type="submit" name="submit" id="submit" >
	</p>
</form>