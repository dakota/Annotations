<?php

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
class RouteAnnotation extends Yampee_Annotations_Definition_Abstract
{
	/**
	 * @var string
	 */
	public $pattern;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var array
	 */
	public $defaults;

	/**
	 * @var array
	 */
	public $requirements;

	/**
	 * Return the annotation name: here, we will use the annotation as @Route()
	 *
	 * @return string
	 */
	public function getAnnotationName()
	{
		return 'Route';
	}

	/**
	 * Return the list of authorized targets. You can use:
	 *      self::TARGET_CLASS, self::TARGET_PROPERTY,
	 *      self::TARGET_METHOD, self::TARGET_FUNCTION
	 *
	 * An empty array will allow any target.
	 *
	 * @return array
	 */
	public function getTargets()
	{
		return array(self::TARGET_CLASS, self::TARGET_METHOD);
	}

	/**
	 * Return the attributes rules. We will see more details about that in another chapter.
	 *
	 * @return Yampee_Annotations_Definition_Node
	 */
	public function getAttributesRules()
	{
		$rootNode = new Yampee_Annotations_Definition_Node('root');

		$rootNode
			->anonymousAttr(0, 'pattern', true)
			->stringAttr('name', false)
			->arrayAttr('defaults', false)
				->catchAll()
			->end()
			->arrayAttr('requirements', false)
				->catchAll()
			->end();

		return $rootNode;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return array
	 */
	public function getDefaults()
	{
		return $this->defaults;
	}

	/**
	 * @return string
	 */
	public function getPattern()
	{
		return $this->pattern;
	}

	/**
	 * @return array
	 */
	public function getRequirements()
	{
		return $this->requirements;
	}
}