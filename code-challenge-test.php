<?php

/**
 * RESTful Code challenge. Create a simple payment gateway class that implements this
 * interface. The only thing we're looking for here is your ability to comprehend API
 * documentation and the quality of the resulting code. The only API method you need
 * to make is for a plain-jane charge. No preauth, postauth, refunds, void, etc. need
 * to be implemented. Just keep it simple and to the point.
 * ---
 * 1. You can choose between the following gateways:
 *     a) Stripe      - https://stripe.com/docs/api#create_charge
 *        Secret Key  - sk_test_lBzwJ4lQzQvEPZwgl3s59Mal
 *
 *     b) Authorize.Net       - http://developer.authorize.net/api/reference/#payment-transactions-charge-a-credit-card
 *        API Login ID        - 925hDnUuTCZ
 *        API Transaction Key - 848V7x2Aq4BgFn9F 
 * ---
 * 2. You cannot use SDKs (this is to test your ability to comprehend API documentation).
 * ---
 * 3. You cannot use third party libraries. Everything must be from scratch. You can use
 *    cURL and other native PHP libraries as needed.
 * ---
 * 4. Create a simple "test script" that will do a test charge when ran, like so:
 *
 * $gw = new FooBarGateway('sk_test_lBzwJ4lQzQvEPZwgl3s59Mal');
 * $gw->setFirstName('Bob')
 *    ->setLastName('Smith')
 *    ->setAddress1('123 Test Street')
 *    ->setAddress2('Suite #4')
 *    ->setCity('Morristown')
 *    ->setProvince('TN')
 *    ->setPostal('37814')
 *    ->setCountry('US')
 *    ->setCardNumber('4007000000027)
 *    ->setExpirationDate('10', '2019')
 *    ->setCvv('123');
 * 
 * if ($gw->charge('49.99', 'USD')) {
 *     echo "Charge successful! Transaction ID: " . $gw->getTransactionId(); 
 * } else {
 *	   echo "Charge failed. Errors: " . print_r($gw->getErrors(), TRUE); 
 * }
 * ---
 */



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






interface BasicPaymentGateway
{
	/**
	 * @param   string  First name on card.
	 * @return  object  Chainable instance of self.
	 */
	public function setFirstName($name);
	
	/**
	 * @param   string  Last name on card.
	 * @return  object  Chainable instance of self.
	 */
	public function setLastName($name);

	/**
	 * @param   string  Billing address, line 1.
	 * @return  object  Chainable instance of self.
	 */	
	public function setAddress1($address);
	
	/**
	 * @param   string  Billing address, line 2.
	 * @return  object  Chainable instance of self.
	 */
	public function setAddress2($address);
	
	/**
	 * @param   string  Billing city.
	 * @return  object  Chainable instance of self.
	 */
	public function setCity($city);
	
	/**
	 * @param   string  Billing state/province.
	 * @return  object  Chainable instance of self.
	 */
	public function setProvince($province);

	/**
	 * @param   string  Billing zip/postal code.
	 * @return  object  Chainable instance of self.
	 */	
	public function setPostal($postal);
	
	/**
	 * @param   string  Billing country.
	 * @return  object  Chainable instance of self.
	 */
	public function setCountry($country);
	
	/**
	 * @param   string  Card number.
	 * @return  object  Chainable instance of self.
	 */
	public function setCardNumber($number);
	
	/**
	 * @param   string  Card expiration month in MM format.
	 * @param   string  Card expiration year in YYYY format.
	 * @return  object  Chainable instance of self.
	 */
	public function setExpirationDate($month, $year);
	
	/**
	 * @param   string  Card security code (CVV, CVV2, etc.).
	 * @return  object  Chainable instance of self.
	 */
	public function setCvv($cvv);
	
	/**
	 * @param   string  '0.00' format.
	 * @param   string  [optional] Currency. Default = USD.
	 * @return  bool    TRUE if charge successful, FALSE otherwise.
	 */
	public function charge($amount, $currency = 'USD');
	
	/**
	 * @return  array  Empty if no errors found.
	 */
	public function getErrors();
	
	/**
	 * @return  string  Transaction ID of the last successful API operation.
	 */
	public function getTransactionId();
}




/* 

I need to create a class that uses all the methods detailed in the interface.

Then I need to create inputs for variables used in the example above that will test my code.

Then I need to learn how to use the Stripe Key, and create a Charge Object for the values that have been inputted.

However, I think I understand now. In the example given above, an object named $gw is created. 
This object contains values set in every function in the interface except for charge, getErrors, and getTransactionId.

The given example uses 'FooBarGateway' as the name of the class, and takes the Stripe Key as an input. 
They then use the arrow operator to set the values for most of the methods. It seems the methods are 'chainable' 
and that I have to use them in this way.

Then, an if statement calls the charge method (which returns a boolean value), and outputs the transaction id if successful, and an error if not.

*/


class PaymentGateway implements BasicPaymentGateway{

	public function __construct($key){

		$this->key = $key;

		return $this;

	}

	public function setFirstName($name){
	/**
	 * @param   string  First name on card.
	 * @return  object  Chainable instance of self.
	 */

		$this->firstName = $name;

		return $this;
	}
	

	public function setLastName($name){
	/**
	 * @param   string  Last name on card.
	 * @return  object  Chainable instance of self.
	 */

		$this->lastName = $name;

		return $this;

	}

	public function setAddress1($address){
	/**
	 * @param   string  Billing address, line 1.
	 * @return  object  Chainable instance of self.
	 */	
		
		$this->address1 = $address;

		return $this;
		
	}

	public function setAddress2($address){
	/**
	 * @param   string  Billing address, line 2.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->address2 = $address;

		return $this;
		
	}

	public function setCity($city){
	/**
	 * @param   string  Billing city.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->city = $city;

		return $this;
		
	}
	
	public function setProvince($province){
	/**
	 * @param   string  Billing state/province.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->province = $province;

		return $this;
		
	}

	public function setPostal($postal){
	/**
	 * @param   string  Billing zip/postal code.
	 * @return  object  Chainable instance of self.
	 */	
		
		$this->postal = $postal;

		return $this;
		
	}
	
	public function setCountry($country){
	/**
	 * @param   string  Billing country.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->country = $country;

		return $this;
		
	}
	
	public function setCardNumber($number){
	/**
	 * @param   string  Card number.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->cardNumber = $number;

		return $this;
		
	}

	public function setExpirationDate($month, $year){
	/**
	 * @param   string  Card expiration month in MM format.
	 * @param   string  Card expiration year in YYYY format.
	 * @return  object  Chainable instance of self.
	 */
		
		$this->expMonth = $month;
		$this->expYear = $year;

		return $this;
		
	}
	
	public function setCvv($cvv){
	/**
	 * @param   string  Card security code (CVV, CVV2, etc.).
	 * @return  object  Chainable instance of self.
	 */
		
		$this->cvv = $cvv;

		return $this;
		
	}
	
	public function charge($amount, $currency = 'usd'){
	/**
	 * @param   string  '0.00' format.
	 * @param   string  [optional] Currency. Default = USD.
	 * @return  bool    TRUE if charge successful, FALSE otherwise.
	 */

		$this->amount = $amount * 100;
		$this->currency = $currency;

		echo $this->amount;
		echo $this->currency;
		echo $this->key;
		
		\Stripe\Stripe::setApiKey($this->key);
		
		try {

			\Stripe\Charge::create([
				"amount" => $this->amount,
				"currency" => $this->currency
			]);

		} catch (\Stripe\Error\Card $e) {
			print('Status is:' . $e->getHttpStatus() . "\n");
		}

	}

	public function getErrors(){
	/**
	 * @return  array  Empty if no errors found.
	 */
		
		
	}
	
	public function getTransactionId(){

	/**
	 * @return  string  Transaction ID of the last successful API operation.
	 */
		
		
	}

}






$gw = new PaymentGateway('sk_test_TwWFzzaUcKaBnMZzUS9xovde');

$gw->setFirstName('Bob')
   ->setLastName('Smith')
   ->setAddress1('123 Test Street')
   ->setAddress2('Suite #4')
   ->setCity('Morristown')
   ->setProvince('TN')
   ->setPostal('37814')
   ->setCountry('US')
   ->setCardNumber('4007000000027')
   ->setExpirationDate('10', '2019')
   ->setCvv('123');

echo $gw->firstName . '<br>';
echo $gw->lastName . '<br>';
echo $gw->address1 . '<br>';
echo $gw->address2 . '<br>';
echo $gw->city . '<br>';
echo $gw->province . '<br>';
echo $gw->postal . '<br>';
echo $gw->country . '<br>';
echo $gw->cardNumber . '<br>';
echo $gw->expMonth . '<br>';
echo $gw->expYear . '<br>';
echo $gw->cvv . '<br>';


$gw->charge(49.99, 'usd');
