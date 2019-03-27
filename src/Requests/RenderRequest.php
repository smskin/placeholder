<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.03.2019
 * Time: 13:23
 */

namespace App\Requests;

use App\Models\RenderConfig;
use App\Providers\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Imagick\Font;

class RenderRequest
{
    final public function execute(): void
    {
        $config = $this->prepareConfig();
        $path = Storage::path($config->getFileName());
        if (!Storage::exists($path)){
            $this->renderImage($config,$path);
        }

        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' .Storage::url($config->getFileName()));
    }

    private function prepareConfig(): RenderConfig
    {
        $config = new RenderConfig();
        $txtSize = (int) input('txtsize');
        if ($txtSize){
            $config->setTextSize($txtSize);
        }

        $txt = trim(input('txt'));
        if ($txt){
            $config->setText($txt);
        }

        $w = (int) input('w');
        $h = (int) input('h');

        if ($w){
            $config->setWidth($w);
        } elseif($h){
            $config->setWidth($h);
        }

        if ($h){
            $config->setHeight($h);
        } elseif($w){
            $config->setHeight($w);
        }

        $bgColor = trim(input('bgcolor'));
        if ($bgColor){
            $config->setBackground('#'.$bgColor);
        }

        $txtColor = trim(input('txtcolor'));
        if ($txtColor){
            $config->setTextColor('#'.$txtColor);
        }

        return $config;
    }

    private function renderImage(RenderConfig $config, string $path): void
    {
        $manager = new ImageManager(array('driver' => 'imagick'));
        $manager
            ->canvas($config->width, $config->height, $config->background)
            ->text($config->text,$config->width / 2,$config->height / 2, function(Font $font) use ($config) {
                $font->file(__ROOT_DIR__.'/assets/arial.ttf');
                $font->size($config->textSize);
                $font->color($config->textColor);
                $font->align('center');
                $font->valign('center');
            })
            ->save($path,90);
    }
}