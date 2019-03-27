<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.03.2019
 * Time: 13:21
 */

namespace App\Models;

use App\Providers\Storage;

class RenderConfig
{
    public $textSize = 14;
    public $text = 'placeholder';
    public $width = 300;
    public $height = 300;
    public $background = '#00000';
    public $textColor = '#ffffff';


    /**
     * @param int $textSize
     * @return RenderConfig
     */
    final public function setTextSize(int $textSize): RenderConfig
    {
        $this->textSize = $textSize;
        return $this;
    }

    /**
     * @param string $text
     * @return RenderConfig
     */
    final public function setText(string $text): RenderConfig
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param int $width
     * @return RenderConfig
     */
    final public function setWidth(int $width): RenderConfig
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int $height
     * @return RenderConfig
     */
    final public function setHeight(int $height): RenderConfig
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string $background
     * @return RenderConfig
     */
    final public function setBackground(string $background): RenderConfig
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @param string $textColor
     * @return RenderConfig
     */
    final public function setTextColor(string $textColor): RenderConfig
    {
        $this->textColor = $textColor;
        return $this;
    }

    final public function getFileName(): string {
        return md5(serialize($this)).'.jpg';
    }
}