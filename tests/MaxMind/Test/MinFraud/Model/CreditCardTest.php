<?php

namespace MaxMind\Test\MinFraud\Model;

use MaxMind\MinFraud\Model\CreditCard;

class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    public function testCreditCard()
    {
        $array = [
            'issuer' => [
                'name' => 'Bank',
                'matches_provided_name' => false,
                'phone_number' => '123-321-3213',
                'matches_provided_phone_number' => true,
            ],
            'brand' => 'Visa',
            'country' => 'US',
            'is_issued_in_billing_address_country' => false,
            'is_prepaid' => true,
            'type' => 'credit'
        ];
        $cc = new CreditCard($array);

        $this->assertEquals(
            $array['issuer']['name'],
            $cc->issuer->name,
            'issuer name'
        );

        $this->assertEquals(
            $array['issuer']['matches_provided_name'],
            $cc->issuer->matchesProvidedName,
            'issuer name matches'
        );

        $this->assertEquals(
            $array['issuer']['phone_number'],
            $cc->issuer->phoneNumber,
            'issuer phone number'
        );

        $this->assertEquals(
            $array['issuer']['matches_provided_phone_number'],
            $cc->issuer->matchesProvidedPhoneNumber,
            'issuer phone number matches'
        );

        $this->assertEquals(
            $array['brand'],
            $cc->brand,
            'brand'
        );

        $this->assertEquals(
            $array['country'],
            $cc->country,
            'country'
        );

        $this->assertEquals(
            $array['is_issued_in_billing_address_country'],
            $cc->isIssuedInBillingAddressCountry,
            'isIssuedInBillingAddressCountry'
        );

        $this->assertEquals(
            $array['is_prepaid'],
            $cc->isPrepaid,
            'isPrepaid'
        );

        $this->assertEquals(
            $array['type'],
            $cc->type,
            'type'
        );

        $this->assertEquals(
            $array,
            $cc->jsonSerialize(),
            'correctly implements JsonSerializable'
        );
    }
}
