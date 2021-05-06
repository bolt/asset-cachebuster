<?php

declare(strict_types=1);

namespace BoltCachebuster;

use Symfony\Component\Asset\Packages;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Twig extends AbstractExtension
{
    /** @var Packages */
    private $assetManager;

    /** @var string */
    private $secret;

    public function __construct(Packages $assetManager, string $secret)
    {
        $this->assetManager = $assetManager;
        $this->secret = $secret;
    }

    /**
     * Register Twig functions.
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('asset', [$this, 'getAsset']),
            new TwigFunction('versioned_asset', [$this, 'getAsset']),
        ];
    }

    public function getAsset(string $path, string $packageName = null): string
    {
        return $this->assetManager->getUrl($path, $packageName) . '?v=' . $this->getVersion();
    }

    private function getVersion(): string
    {
        return mb_substr(hash('sha256', $this->secret), 0, 5);
    }
}
