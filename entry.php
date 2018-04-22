<?php ?>
<form>
	<div class="form__field-holder form__first-name"> 
		<label for="firstName">First Name</label>
		<input type="text" name="firstName" id="firstName" required>
	</div>
	<div class="form__field-holder form__last-name">
		<label for="lastName">Last Name</label>
		<input type="text" name="lastName" id="lastName" required>
	</div>
	<div class="form__field-holder form__email">
		<label for="email"> Your Email</label>
		<input type="email" name="email" id="email" required>
	</div>
	<div class="form__field-holder form__confirm-email">
		<label for="confirmEmail">Confirm Email</label>
		<input type="email" name="confirmEmail" id="confirmEmail" required>
	</div>
	<div class="form__field-holder form__phone-number">
		<label for="phoneNumber">Phone Number (optional)</label>
		<input type="text" name="phoneNumber" id="phoneNumber" >
	</div>
	<div class="form__field-holder form__first-code">
		<label for="firstCode">Enter Code 1</label>
		<input type="text" name="firstCode" id="firstCode" >
	</div>
	<div class="form__field-holder form__second-code">
		<label for="secondCode">Enter Code 2</label>
		<input type="text" name="secondCode" id="secondCode" >
	</div>
	<div class="form__field-holder form__third-code">
		<label for="thirdCode">Enter Code 3</label>
		<input type="text" name="thirdCode" id="thirdCode" >
	</div>
	<div class="form__field-holder form__age-check">
		<label for="ageCheck">I am 18 years or older....</label>
		<input type="checkbox" name="ageCheck" id="ageCheck" required>
	</div>
	<div class="form__field-holder form__email-opt-in">
		<label for="emailOptIn">I would like to recieve emails....</label>
		<input type="checkbox" name="emailOptIn" id="emailOptIn" >
	</div>
	<div class="form__field-holder form__sweep-opt-in">
		<label for="sweepOptIn">I acknowledge that I will be entered into the sweepstakes....</label>
		<input type="checkbox" name="sweepOptIn" id="sweepOptIn" required>
	</div>
	<div class="form__field-holder ">
		<div class="g-recaptcha" data-sitekey="6LfoTjQUAAAAABe0lHjTIYld5wFnYq8__Tv9jjge"></div>
	</div>
	<div class="form__field-holder ">
		<input type="submit" name="submit" id="submit" >
	</div>
</form>
<div class="response"></div>

