<?php

namespace Craue\FormFlowBundle\Event;

use Craue\FormFlowBundle\Form\FormFlowInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Is called once if revalidating previous steps failed.
 *
 * @author Christian Raue <christian.raue@gmail.com>
 * @copyright 2011-2019 Christian Raue
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */
class PreviousStepInvalidEvent extends FormFlowEvent {

	/**
	 * @var int
	 */
	protected $invalidStepNumber;

	/**
	 * @var FormInterface
	 */
	protected $currentStepForm;

	/**
	 * @var FormInterface
	 */
	protected $invalidStepForm;

	/**
	 * @param FormFlowInterface $flow
	 * @param FormInterface $currentStepForm
	 * @param FormInterface $invalidStepForm
	 * @param int $invalidStepNumber
	 */
	public function __construct(FormFlowInterface $flow, FormInterface $currentStepForm, FormInterface $invalidStepForm, $invalidStepNumber) {
		$this->flow = $flow;
		$this->currentStepForm = $currentStepForm;
		$this->invalidStepForm = $invalidStepForm;
		$this->invalidStepNumber = $invalidStepNumber;
	}

	/**
	 * @return FormInterface
	 */
	public function getCurrentStepForm() {
		return $this->currentStepForm;
	}

	/**
	 * @return FormInterface
	 */
	public function getInvalidStepForm() {
		return $this->invalidStepForm;
	}

	/**
	 * @return int
	 */
	public function getInvalidStepNumber() {
		return $this->invalidStepNumber;
	}

}
