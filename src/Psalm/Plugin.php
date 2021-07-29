<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt\Psalm;

use loophp\fpt\Psalm\EventHandler\ComposeSimple\AfterExpressionAnalysisProvider;
use Psalm\Plugin\EventHandler\MethodReturnTypeProviderInterface;
use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;
use SimpleXMLElement;

use function str_replace;

final class Plugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $registration, ?SimpleXMLElement $config = null): void
    {
        foreach ($this->getHooks() as $hook) {
            /** @psalm-suppress UnresolvableInclude */
            $file = __DIR__ . '/' . str_replace([__NAMESPACE__, '\\'], ['', '/'], $hook) . '.php';

            require_once $file;

            $registration->registerHooksFromClass($hook);
        }
    }

    /**
     * @return iterable<class-string<MethodReturnTypeProviderInterface>>
     */
    private function getHooks(): iterable
    {
        yield AfterExpressionAnalysisProvider::class;
    }
}
