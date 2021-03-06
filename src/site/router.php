<?php
defined('_JEXEC') or die;

/**
 * @param    array    A named array
 *
 * @return    array
 */
function SwaBuildRoute(&$query)
{
	$segments = array();

	if (isset($query['task']))
	{
		$segments[] = implode('/', explode('.', $query['task']));
		unset($query['task']);
	}

	if (isset($query['view']))
	{
		$segments[] = $query['view'];
		unset($query['view']);
	}

	if (isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}

	return $segments;
}

/**
 * @param    array    A named array
 * @param    array
 *
 * Formats:
 *
 * index.php?/swa/task/id/Itemid
 *
 * index.php?/swa/id/Itemid
 */
function SwaParseRoute($segments)
{
	$vars = array();

	// View is always the first element of the array
	$vars['view'] = array_shift($segments);

	while (!empty($segments))
	{
		$segment = array_pop($segments);

		if (is_numeric($segment))
		{
			$vars['id'] = $segment;
		}
		else
		{
			$vars['task'] = $vars['view'] . '.' . $segment;
		}
	}

	return $vars;
}
