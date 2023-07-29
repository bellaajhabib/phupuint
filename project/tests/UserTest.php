<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
 public function testReturnsFullName(){
     $user = new User();
     $user->first_name = "Teresa";
     $user->surname = "Green";
     $this->assertEquals('Teresa Green', $user->getFullName());
 }

 public function testFullNameIsEmptyByDefault(){
     $user = new User;
     $this->assetEquals('',$user->getFullName());
 }
 public function testNotificationIsSent(){
     $user = new User();
 }
}