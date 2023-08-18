<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloWorld\Communication\Plugin\MessageBroker;

use Generated\Shared\Transfer\GreetUserTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\MessageBrokerExtension\Dependency\Plugin\MessageHandlerPluginInterface;

/**
 * @method \Pyz\Zed\HelloWorld\Business\HelloWorldFacadeInterface getFacade()
 * @method \Pyz\Zed\HelloWorld\HelloWorldConfig getConfig()
 */
class GreetUserMessageHandlerPlugin extends AbstractPlugin implements MessageHandlerPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\GreetUserTransfer $greetUserTransfer
     *
     * @return void
     */
    public function onGreetUser(GreetUserTransfer $greetUserTransfer): void
    {
        $this->getFacade()->handleGreetUser($greetUserTransfer);
    }

    /**
     * Return an array where the key is the class name to be handled and the value is the callable that handles the message.
     *
     * @return array<string, callable>
     */
    public function handles(): iterable
    {
        yield GreetUserTransfer::class => [$this, 'onGreetUser'];
    }
}
