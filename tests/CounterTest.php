<?php 

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Counter;

class CounterTest extends TestCase{

    protected $encodedObject = '[{"age":50,"key":"f"},{"age":40,"key":"m"},{"age":60,"key":"f"},{"age":55,"key":"m"}]';

    /** @test */
    public function is_it_validate_received_string()
    {
        
        $result = Counter::validate($this->encodedObject);
        $this->assertEquals(1, $result);

    }

    /** @test */
    public function is_it_count_ages_more_than_fifty()
    {

        $result = Counter::age($this->encodedObject);
        $this->assertEquals(3, $result);

    }

    /** @test */
    public function is_it_count_females()
    {

        $result = Counter::females($this->encodedObject);
        $this->assertEquals(2, $result);

    }

    /** @test */
    public function is_it_count_males()
    {
        
        $result = Counter::males($this->encodedObject);
        $this->assertEquals(2, $result);

    }

}