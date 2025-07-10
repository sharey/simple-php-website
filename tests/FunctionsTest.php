<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/config.php';

class FunctionsTest extends TestCase
{
    public function testConfigReturnsCorrectValues()
    {
        $this->assertEquals('Simple PHP Website', config('name'));
        $this->assertEquals('', config('site_url'));
        $this->assertEquals(false, config('pretty_uri'));
        $this->assertEquals('template', config('template_path'));
        $this->assertEquals('content', config('content_path'));
        $this->assertEquals('v3.1', config('version'));
        $this->assertIsArray(config('nav_menu'));
    }

    public function testPageTitleDefault()
    {
        unset($_GET['page']);
        ob_start();
        page_title();
        $output = ob_get_clean();
        $this->assertEquals('Home', $output);
    }

    public function testPageTitleWithPage()
    {
        $_GET['page'] = 'about-us';
        ob_start();
        page_title();
        $output = ob_get_clean();
        $this->assertEquals('About Us', $output);
    }

    public function testSiteName()
    {
        ob_start();
        site_name();
        $output = ob_get_clean();
        $this->assertEquals('Simple PHP Website', $output);
    }

    public function testSiteVersion()
    {
        ob_start();
        site_version();
        $output = ob_get_clean();
        $this->assertEquals('v3.1', $output);
    }
}
