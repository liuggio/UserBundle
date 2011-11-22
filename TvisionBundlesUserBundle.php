<?php

namespace Tvision\Bundles\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TvisionBundlesUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
