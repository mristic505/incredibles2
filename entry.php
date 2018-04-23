<?php ?>
<div class="entry-page__container">
	<div class="entry-page__left-section">
		<img src="assets/imgs/jj-two-boxes-stacked.png">
	</div>
	<div class="entry-page__middle-section">
		<div class="entry-page__instruction-container">
			<h1 class="entry-page__instruction-title">Register and submit 3 product codes to receive a Fandango movie ticket.</h1>
			<h2>(Valid for Disney•Pixar’s Incredibles 2 or any other Disney movie. Up to $7.50 total value.)</h2>
			<p>ALL FIELDS REQUIRED UNLESS INDICATED</p>
		</div>
		<form>
			<div class="form__split-2-container">
				<div class="form__field-holder form__first-name"> 
					<label for="firstName">First Name</label>
					<input type="text" name="firstName" id="firstName" required>
				</div>
				<div class="form__field-holder form__last-name">
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName" id="lastName" required>
				</div>
			</div>	
			<div class="form__split-2-container">
				<div class="form__field-holder form__email">
					<label for="email">Your Email</label>
					<input type="email" name="email" id="email" required>
				</div>
				<div class="form__field-holder form__confirm-email">
					<label for="confirmEmail">Confirm Email</label>
					<input type="email" name="confirmEmail" id="confirmEmail" required>
				</div>	
			</div>
			<div class="form__field-holder form__phone-number">
				<label for="phoneNumber">Phone Number (optional)</label>
				<input type="text" name="phoneNumber" id="phoneNumber" >
			</div>
			<div class="form__codes-container">
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
			</div>
			<div class="form__checkbox-container">
				<div class="form__field-holder form__age-check">
					<input type="checkbox" name="ageCheck" id="ageCheck" required>
					<label for="ageCheck">I am 18 years or older. I’ve read and agree to the <a href="#">Official Rules</a> of the promotion.</label>
				</div>
				<div class="form__field-holder form__email-opt-in">
					<input type="checkbox" name="emailOptIn" id="emailOptIn" value="1" checked="">
					<label for="emailOptIn">I would like to receive offers and information from Juicy Juice®. (optional)</label>
				</div>
				<div class="form__field-holder form__sweep-opt-in">
					<input type="checkbox" name="sweepOptIn" id="sweepOptIn" required>
					<label for="sweepOptIn">I acknowledge that I will be entered into the Incredible Family Adventure Sweepstakes.</label>
				</div>
			</div>
			<div class="popup__details-container">
				<a href="#">Click here for sweeps details.</a>
			</div>
			<div class="form__field-holder ">
				<div class="g-recaptcha" data-sitekey="6LcP2FQUAAAAAKR6_Fl0U6uw640gCz_0-fHNX-Sk"></div>
			</div>
			<div class="form__field-holder ">
				<input type="submit" name="submit" id="submit" >
			</div>
		</form>
	</div>
	<div class="entry-page__right-section">
		<img src="assets/imgs/jack-jack-orange-jj-bottle.png">
	</div>
	<div class="response"></div>
</div>