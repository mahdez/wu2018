<?php

use PHPUnit\Framework\TestCase;

final class AITest extends TestCase
{
    public function testGender_Male(): void
    {
        $result = AI::getGender('ครับ');
        $expected_result = 'Male';
        $this->assertEquals($expected_result, $result);
    }
    
    public function testGender_Female(): void
    {
        $result = AI::getGender('ค่ะ');
        $expected_result = 'Female';
        $this->assertEquals($expected_result, $result);
    }

    public function testPositive(): void
    {
        $result = AI::getSentiment('ดี');
        $expected_result = 'Positive';
        $this->assertEquals($expected_result, $result);
    }

    public function testNeutral(): void
    {
        $result = AI::getSentiment('คุณ');
        $expected_result = 'Neutral';
        $this->assertEquals($expected_result, $result);
    }
    
    public function testNegative(): void
    {
        $result = AI::getSentiment('ไม่');
        $expected_result = 'Negative';
        $this->assertEquals($expected_result, $result);
    }

    // public function testRude(): void
    // {
    //     $result = AI::getRudeWords('เลว');
    //     $expected_result = '';
    //     $this->assertEquals($expected_result, $result);
    // }
    
}
