<?php

class FunctionTest extends \PHPUnit\Framework\TestCase
{
    public function testSetName()
    {
        $customer1 = new User();
        $customer1->setName("John");

        $this->assertEquals("John", $customer1->getName());
    }

    public function testSetEmail()
    {
        $customer1 = new User();
        $customer1->setEmail("John@gmail.com");

        $this->assertEquals("John@gmail.com", $customer1->getEmail());
    }

    public function testSetPassword()
    {
        $customer1 = new User();
        $customer1->setPassword("password");

        $this->assertEquals("password", $customer1->getPassword());
    }

    public function testSetRole()
    {
        $customer1 = new User();
        $customer1->setRole("customer");

        $this->assertEquals("customer", $customer1->getRole());
    }
}

