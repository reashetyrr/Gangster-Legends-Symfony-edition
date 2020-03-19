<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AssetExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('base64', [$this, 'doSomething']),
        ];
    }

    public function doSomething($image_path)
    {
        $type = pathinfo($image_path, PATHINFO_EXTENSION);
        $data = file_get_contents($image_path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}
