<?php


class ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->assertEquals(200, $this->call('GET', '/')->getStatusCode());
    }
    public function testAbout()
    {
        $this->assertEquals(200, $this->call('GET', '/about')->getStatusCode());
    }

    public function testInstragramController()
    {
        $response = $this->call('GET', '/instagram/tagsmediarecent');
        $content = json_decode($response->getContent(), 1);
        $this->assertArrayHasKey('pagination', $content);
        $this->assertArrayHasKey('data', $content);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->call('POST', '/instagram/tagsmediarecent');
        $this->assertEquals(500, $response->getStatusCode());

        $response = $this->call('GET', '/instagram/tagsmediarecent?count=10');
        $content = json_decode($response->getContent(), 1);
        $this->assertCount(10, $content['data']);
        $this->assertEquals(200, $response->getStatusCode());

        $min_id = $content['pagination']['min_tag_id'];
        $max_tag_id = $content['pagination']['next_max_tag_id'];

        $response = $this->call('GET', '/instagram/tagsmediarecent?count=10&max_tag_id=' . $max_tag_id);
        $content = json_decode($response->getContent(), 1);
        $this->assertSame($max_tag_id, $content['pagination']['min_tag_id']);
        $this->assertEquals(200, $response->getStatusCode());

        $min_tag_id = $content['pagination']['next_min_id'];

        $response = $this->call('GET', '/instagram/tagsmediarecent?count=10&min_tag_id=' . $min_tag_id);
        $content = json_decode($response->getContent(), 1);
        $this->assertSame($min_id, $content['pagination']['min_tag_id']);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
