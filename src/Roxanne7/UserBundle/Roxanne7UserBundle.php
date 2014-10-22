<?php

namespace Roxanne7\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Roxanne7UserBundle extends Bundle
{
		public function getParent()
		{
			return 'FOSUserBundle';
		}
}
