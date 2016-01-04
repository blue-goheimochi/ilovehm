<?php


class InstagramTest extends TestCase
{
    public function testCallTagsMediaRecentAPI()
    {
        $instagram = new App\Instagram();
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり');
        $content = json_decode($data, 1);
        $this->assertArrayHasKey('pagination', $content);
        $this->assertArrayHasKey('data', $content);

        // use cache
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり');
        $content = json_decode($data, 1);
        $this->assertArrayHasKey('pagination', $content);
        $this->assertArrayHasKey('data', $content);

        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10);
        $content = json_decode($data, 1);
        $this->assertCount(10, $content['data']);

        $min_id      = $content['pagination']['min_tag_id'];
        $max_tag_id2 = $min_id;

        // use cache
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10);
        $content = json_decode($data, 1);
        $this->assertCount(10, $content['data']);

        $max_tag_id = $content['pagination']['next_max_tag_id'];

        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, $max_tag_id);
        $content = json_decode($data, 1);
        $this->assertSame($max_tag_id, $content['pagination']['min_tag_id']);

        // use cache
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, $max_tag_id);
        $content = json_decode($data, 1);
        $this->assertSame($max_tag_id, $content['pagination']['min_tag_id']);

        $min_tag_id  = $content['pagination']['next_min_id'];
        $min_tag_id2 = $min_tag_id;

        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, false, $min_tag_id);
        $content = json_decode($data, 1);
        $this->assertSame($min_id, $content['pagination']['min_tag_id']);

        // use cache
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, false, $min_tag_id);
        $content = json_decode($data, 1);
        $this->assertSame($min_id, $content['pagination']['min_tag_id']);

        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, $max_tag_id2, $min_tag_id2);
        $content = json_decode($data, 1);
        $this->assertSame($max_tag_id2, $content['pagination']['min_tag_id']);

        // use cache
        $data = $instagram->callTagsMediaRecentAPI('浜松まつり', 10, $max_tag_id2, $min_tag_id2);
        $content = json_decode($data, 1);
        $this->assertSame($max_tag_id2, $content['pagination']['min_tag_id']);
    }
}
