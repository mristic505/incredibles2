<?php ?>
<div class="entry-page__container green-bg-gradient">
	<div class="entry-page__left-section">
		<img src="assets/imgs/jj-two-boxes-stacked.png">
	</div>
	<div class="entry-page__middle-section">
		<div class="entry-page__instruction-container">
			<h1 class="entry-page__instruction-title">Register and submit 3 product codes to receive a Fandango movie ticket.</h1>
			<h2 class="entry-page__instruction-subtext">(Valid for Disney•Pixar’s Incredibles 2 or any other Disney movie. Up to $7.50 total value.)</h2>
			<p class="entry-page__form-instruction">ALL FIELDS REQUIRED UNLESS INDICATED</p>
		</div>
		<form>
			<div class="form__split-2-container">
				<div class="form__field-holder form__first-name"> 
					<label for="firstName">FIRST NAME</label>
					<input type="text" name="firstName" id="firstName" required>
				</div>
				<div class="form__field-holder form__last-name">
					<label for="lastName">LAST NAME</label>
					<input type="text" name="lastName" id="lastName" required>
				</div>
			</div>	
			<div class="form__split-2-container">
				<div class="form__field-holder form__email">
					<label for="email">YOUR EMAIL</label>
					<input type="email" name="email" id="email" required>
				</div>
				<div class="form__field-holder form__confirm-email">
					<label for="confirmEmail">CONFIRM EMAIL</label>
					<input type="email" name="confirmEmail" id="confirmEmail" required>
				</div>	
			</div>
			<div class="form__field-holder form__phone-number">
				<label for="phoneNumber">PHONE NUMBER (optional)</label>
				<input type="text" name="phoneNumber" id="phoneNumber" >
			</div>
			<div class="form__codes-container">
				<div class="form__field-holder form__first-code">
					<label for="firstCode">ENTER CODE 1</label>
					<input type="text" name="firstCode" id="firstCode" >
				</div>
				<div class="form__field-holder form__second-code">
					<label for="secondCode">ENTER CODE 2</label>
					<input type="text" name="secondCode" id="secondCode" >
				</div>
				<div class="form__field-holder form__third-code">
					<label for="thirdCode">ENTER CODE 3</label>
					<input type="text" name="thirdCode" id="thirdCode" >
				</div>
			</div>
			<div class="faq_where-is-code-container">
				<p class="faq__code-text" id="faq__code-modal">Where's my code?</p>
			</div>
			<div class="form__checkbox-container">
				<div class="form__field-holder no-b-margin form__age-check">
					<input type="checkbox" name="ageCheck" id="ageCheck" required>
					<label for="ageCheck">I am 18 years or older. I’ve read and agree to the <a class="official-rules-link" href="?page=rules">Official Rules</a> of the promotion.</label>
				</div>
				<div class="form__field-holder no-b-margin form__email-opt-in">
					<input type="checkbox" name="emailOptIn" id="emailOptIn" value="1" checked="">
					<label for="emailOptIn">I would like to receive offers and information from Juicy Juice®. (optional)</label>
				</div>
				<div class="form__field-holder no-b-margin form__sweep-opt-in">
					<input type="checkbox" name="sweepOptIn" id="sweepOptIn" required>
					<label for="sweepOptIn">I acknowledge that I will be entered into the Incredible Family Adventure Sweepstakes.</label>
				</div>
			</div>
			<div class="popup__details-container">
				<p id="adventureModal">Click here for sweeps details.</a>
			</div>
			<div class="form__field-holder form__captcha ">
				<div class="g-recaptcha" data-sitekey="6LcP2FQUAAAAAKR6_Fl0U6uw640gCz_0-fHNX-Sk"></div>
			</div>
			<div class="form__field-holder ">
				<input type="submit" name="submit" id="submit" value="" >
			</div>
		</form>
	</div>
	<div class="entry-page__right-section">
		<img src="assets/imgs/jack-jack-orange-jj-bottle.png">
	</div>
	<div class="response"></div>
</div>

<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="codeModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content green-bg-gradient">
    <span class="close">&times;</span>
	<img class="codeModalTitle" srcset="assets/imgs/how-to-find-your-code-txt.png">
	<p class="codeModalText">Check under the labels of specially-marked Disney/Pixar® Incredibles 2 Juicy Juice® packages to locate your code.</p>
	<img class="code-image-examples" src="assets/imgs/code-popup-hero.png">
  </div>

</div><!-- The Modal -->
<div id="adventureModalpopup" class="modal">

  <!-- Modal content -->
  <div class="modal-content green-bg-gradient">
    <span class="close2">&times;</span>
	<img class="adv-title-img" src="assets/imgs/modal-family-adv-title.png">
	<p class="adventureText">With every movie ticket reward, you’ll be entered for a chance win $10,000 towards a trip of your choice. Where you go on your incredible family adventure is totally up to you!</p>
	<img src="assets/imgs/popup-adventure-logos.png">
  </div>

</div>