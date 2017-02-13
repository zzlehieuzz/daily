<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Bundle\QrCodeBundle\Twig\Extension;

use Endroid\QrCode\Factory\QrCodeFactory;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Routing\RouterInterface;
use Twig_Extension;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Twig_SimpleFunction;

class QrCodeExtension extends Twig_Extension implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('qrcode_url', array($this, 'qrcodeUrlFunction')),
            new Twig_SimpleFunction('qrcode_data_uri', array($this, 'qrcodeDataUriFunction')),
        );
    }

    /**
     * Creates the QR code URL corresponding to the given message.
     *
     * @param string $text
     * @param array  $options
     *
     * @return string
     */
    public function qrcodeUrlFunction($text, array $options = array())
    {
        $params = $options;
        $params['text'] = $text;

        return $this->getRouter()->generate('endroid_qrcode', $params);
    }

    /**
     * Creates the QR code data corresponding to the given message.
     *
     * @param string $text
     * @param array  $options
     *
     * @return string
     */
    public function qrcodeDataUriFunction($text, array $options = array())
    {
        $qrCode = $this->getQrCodeFactory()->createQrCode($options);
        $qrCode->setText($text);

        return $qrCode->getDataUri();
    }

    /**
     * Returns the router.
     *
     * @return RouterInterface
     */
    protected function getRouter()
    {
        return $this->container->get('router');
    }

    /**
     * Returns the QR code factory.
     *
     * @return QrCodeFactory
     */
    protected function getQrCodeFactory()
    {
        return $this->container->get('endroid_qrcode.factory');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'endroid_qrcode';
    }
}
