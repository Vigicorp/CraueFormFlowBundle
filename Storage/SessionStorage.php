<?php

namespace Craue\FormFlowBundle\Storage;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Stores data in the session.
 *
 * @author Toni Uebernickel <tuebernickel@gmail.com>
 * @copyright 2011-2020 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class SessionStorage implements StorageInterface {

	/**
	 * @var RequestStack
	 */
	protected $requestStack;

	public function __construct(RequestStack $requestStack) {
		$this->requestStack = $requestStack;
	}

	/**
	 * {@inheritDoc}
	 */
	public function set($key, $value) {
		$this->requestStack->getSession()->set($key, $value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function get($key, $default = null) {
		return $this->requestStack->getSession()->get($key, $default);
	}

	/**
	 * {@inheritDoc}
	 */
	public function has($key) {
		return $this->requestStack->getSession()->has($key);
	}

	/**
	 * {@inheritDoc}
	 */
	public function remove($key) {
		$this->requestStack->getSession()->remove($key);
	}

}
