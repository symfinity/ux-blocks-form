<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksForm\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('Form', template: '@UxBlocksForm/components/Form.html.twig')]
final class Form
{
    public string $method = 'post';

    public string $action = '';

    public bool $novalidate = false;

    public ?string $title = null;
}
