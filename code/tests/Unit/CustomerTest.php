<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Domain\DataTransferObjects\CustomerDto;
use Domain\Enums\CustomerEnum;

class CustomerTest extends TestCase
{
    use RefreshDatabase, withMigration;

    public function setUp(): void
    {
        parent::setUp();

        // Set up the test data for all tests
        $customer = new CustomerDto();
        $customer->title = 'Mr';
        $customer->firstName = 'John';
        $customer->lastName = 'Smith';
        $customer->email = 'john.smith@gmail.com';
        $customer->phone = '01234 567 890';
        $customer->address = '123 Fake Street';
        $customer->city = 'London';
        $customer->postcode = 'SW1A 1AA';
        $customer->country = 'United Kingdom';
        $customer->pronouns = CustomerEnum::CUSTOMER_PRONOUNS['he/him'];
        $customer->gender = CustomerEnum::CUSTOMER_GENDER['male'];
        $customer->notes = 'This is a test note';
        $customer->status = CustomerEnum::CUSTOMER_STATUS['enabled'];
    }

    /**
     * A customer can be created
     *
     * @return void
     */
    public function test_that_a_customer_can_be_created()
    {
        // Arrange
        $customer = $this->customer;

        // There should be no customers in the database
        $this->assertCount(0, Customer::where('email', $customer->email)->get());

        if($customer->save()) {
            $this->assertTrue(true, 'Customer created successfully');
        } else {
            $this->assertTrue(false, 'Customer not created');
        }

        // There should be 1 customer record in the database
        $this->assertCount(1, Customer::where('email', $customer->email)->get());
    }
}
