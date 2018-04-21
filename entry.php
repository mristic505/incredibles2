<?php ?>
<form>
	<p> First Name
		<input type="text" name="firstName" id="firstName" required>
	</p>
	<p> Last Name
		<input type="text" name="lastName" id="lastName" required>
	</p>
	<p> Your Email
		<input type="email" name="email" id="email" required>
	</p>
	<p> Confirm Email
		<input type="tel" name="confirmEmail" id="confirmEmail" required>
	</p>
	<p> Phone Number (optional)
		<input type="text" name="phoneNumber" id="phoneNumber" >
	</p>
	<p> Enter Code 1
		<input type="text" name="firstCode" id="firstCode" >
	</p>
	<p> Enter Code 2
		<input type="text" name="secondCode" id="secondCode" >
	</p>
	<p> Enter Code 3
		<input type="text" name="thirdCode" id="thirdCode" >
	</p>
	<p> I am 18 years or older....
		<input type="checkbox" name="ageCheck" id="ageCheck" required>
	</p>
	<p>I would like to recieve emails....
		<input type="checkbox" name="emailOptIn" id="emailOptIn" >
	</p>
	<p>I acknowledge that I will be entered into the sweepstakes....
		<input type="checkbox" name="sweepOptIn" id="sweepOptIn" required>
	</p>
	<p>
		Capcha is needed......
	</p>
	<p>
		<input type="submit" name="submit" id="submit" >
	</p>
</form>