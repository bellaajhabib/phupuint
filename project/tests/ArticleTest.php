<?php

use PHPUnit\Framework\TestCase;
use App\Article;

class ArticleTest extends TestCase
{
    protected $article;

    public function testTitleIsEmptyByDefault()
    {
        $service = Mockery::mock(Article::class);

        $service->shouldReceive('getSlug')
            ->once()
            ->andReturn("aa_WXXX_xsxs_sxsxsx_2222");
        $op = new Article();
        $op->setTitle("aa WXXX xsxs sxsxsx 2222");

        $this->assertEquals($op->getSlug(), $service->getSlug());
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $article = new Article();
        $article->title = 'Habib go forward';
        $this->assertEquals($article->getSlug(), "Habib_go_forward");
    }

    public function titleProvider()
    {
        return [
                0 =>  ["An example article", "An_example_article"],
                1 =>["An    example    \n    article", "An_example_article"],
                2 =>["Read!    This! Now!", "Read_This_Now"],
        ];
    }

    /**
     * @dataProvider  titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;
        $this->assertEquals($this->article->getSlug(), $slug);
    }

    protected function setUp(): void
    {
        $this->article = new Article;
    }
}

