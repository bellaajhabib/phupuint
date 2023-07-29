<?php
use PHPUnit\Framework\TestCase;
use App\Article;
class ArticleTest extends TestCase
{
    protected Article $article;

    protected function setUp():void
    {
        $this->article = new Article();
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(),"");
    }

    public function testSlugHasSpacesRepalceIsEmptyWithNoTitle()
    {
        $this->article->title= "An example article";

        $this->assertSame($this->article->getSlug(),"An_example_article");
    }

       public function testSlugHasWhitesSpacesRepalceIsEmptyWithNoTitle()
    {
        $this->article->title= " An    \n example      article ";

        $this->assertSame($this->article->getSlug(),"An_example_article");
    }

        public function testSlugDoesNotHaveNoAnyNoWordsTitle()
    {
        $this->article->title= " An    \n example ! ?article ";

        $this->assertSame($this->article->getSlug(),"An_example_article");
    }

     public function titleProvider()
    {
        return [
             ["An example article", "An_example_article"],
            'Slug Has Whitespace Replaced By Single Underscore'
                                    => ["An    example    \n    article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore'
                                    => [" An example article ", "An_example_article"],
            'Slug Does Not Have Any Non Word Characters'
                                    => ["Read! This! Now!", "Read_This_Now"]
        ];
    }

    /**
     * @dataProvider titleProvider
     */
       public function testSlug($title, $slug)
    {

        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}